<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $request['user_id'] = session()->get('id');
        Address::create($request->except('_token'));
        return redirect()->route('account.index');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Book  $book
//     * @return \Illuminate\Http\Response
//     */

//    public function edit(Book $book)
//    {
//        $publishers = Publisher::query()->get();
//        return view('books.edit', [
//            'book' => $book,
//            'publishers' => $publishers,
//        ]);
//    }
//
    public function update(Request $request, $id)
    {
        $address = Address::query()->where('id', $id)->first();
        $address->update($request->except('_token', 'method'));
        return redirect()->route('account.index');
    }


    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('account.index');
    }
}
