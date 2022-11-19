<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Book;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        $addresses = Address::query()->get()->where('user_id', '=', session()->get('id'));

        return view('user.home.cart',
            compact('carts', 'total', 'subtotal'),
            ['addresses' => $addresses, 'total' => $total]);
    }
    public function add($id){
        $book = Book::find($id);
        Cart::add([
            'id' => $book->id,
            'name' => $book->title,
            'qty' => 1,
            'weight' => $book->weight ?? 0,
            'price' =>$book->price,
            'options' =>[
                'image' =>$book->image,
                'author' => $book->author,
                'isbn' => $book->isbn,
            ],
        ]);
        return back();
    }

    public function decrease($rowId){
        Cart::update($rowId, Cart::get($rowId)->qty - 1);
        return back();
    }

    public function remove($rowId){
        Cart::remove($rowId);
        return back();
    }
}
