<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $author = $request->get('author');

//        if ($author == null) {
//            return view('user.home.index', [
//            ]);
//        }
//        var_dump($author);

        $books = Book::query()
            ->where('title', operator: 'like', value: '%'.$search.'%')
            ->where('author', operator: 'like', value: '%'.$author.'%')
            ->paginate(30)
            ->appends('q', $search)
            ->appends('author', $author);
        return view('user.home.index', [
            'books' => $books,
        ]);
    }

//
//    public function create()
//    {
//        return view('books.create');
//    }
//
//    public function store(Request $request)
//    {
////        $book = new Book();
////        $book->fill($request->except('_token'));
////        $book->save();
//
//        Book::create($request->except('_token'));
//
//        return redirect()->route('books.index');
//    }
//
////    /**
////     * Display the specified resource.
////     *
////     * @param  \App\Models\Book  $book
////     * @return \Illuminate\Http\Response
////     */
    public function show($id)
    {
        $book = Book::query()->find($id);
        return view('user.home.product', [
            'book' => $book,
        ]);
    }
//
//    public function edit(Book $book)
//    {
//        return view('books.edit', [
//            'book' => $book,
//        ]);
//    }
//
//    public function update(Request $request, Book $book)
//    {
//        $book->update($request->except('_token', 'method'));
//    }
//
//
//    public function destroy(Book $book)
//    {
//        $book->delete();
//        return redirect()->route('books.index');
//    }
}
