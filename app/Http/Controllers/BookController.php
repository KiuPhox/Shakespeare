<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $books = Book::query()
            ->where('title', operator: 'like', value: '%'.$search.'%')
            ->paginate(5)
            ->appends('q', $search);
        return view('books.index', [
            'books' => $books,
        ]);
    }


    public function create()
    {
        $publishers = Publisher::query()->get();
        return view('books.create', [
            'publishers' => $publishers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
//        $book = new Book();
//        $book->fill($request->except('_token'));
//        $book->save();
        Book::create($request->except('_token'));

        return redirect()->route('books.index');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Book  $book
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Book $book)
//    {
//        //
//    }

    public function edit(Book $book)
    {
        $publishers = Publisher::query()->get();
        return view('books.edit', [
            'book' => $book,
            'publishers' => $publishers,
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->except('_token', 'method'));
        return redirect()->route('books.index');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
