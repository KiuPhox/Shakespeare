<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $search = $request->get('u');

        $users = User::query()
            ->where('name', operator: 'like', value: '%'.$search.'%')
            ->paginate(5)
            ->appends('u', $search);
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function account(){
        if (session()->has('name')){
            $id = session()->get('id');
            $addresses = Address::query()->get()->where('user_id', '=', $id);
            $account = User::query()->find($id);

            return view('user.home.account', [
                'account' => $account,
                'addresses' => $addresses
            ]);
        }
        return redirect()->route('home.index');
    }

    public function saveAddress(Request $request){
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {

        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        //$book->update($request->except('_token', 'method'));
        //        return redirect()->route('books.index');
        $user->update($request->except('_token', 'method'));
        dd($request->all());
        //return redirect()->route('users.index');

    }


    public function destroy(User $user)
    {
        PasswordReset::where('user_id', $user->id)->delete();

        $user->delete();
        return redirect()->route('users.index');
    }
}
