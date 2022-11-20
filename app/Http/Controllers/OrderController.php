<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cart = Cart::content();
        $order_id = Order::create($request->except('_token'))->id;

        foreach ($cart as $book){
            $order_detail = [
                'order_id' => $order_id,
                'product_id' => $book->id,
                'amount' => $book->qty,
            ];
            OrderDetail::create($order_detail);
        }
        Cart::destroy();
    }
}
