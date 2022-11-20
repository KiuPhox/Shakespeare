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
    public function index(Request $request)
    {
        $search = $request->get('order');

        $orders = Order::query()
            ->where('full_name', operator: 'like', value: '%'.$search.'%')
            ->paginate(5)
            ->appends('order', $search);
        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show($id){
            $order_details = OrderDetail::query()->where('order_id', $id)->paginate(5);
            return view('admin.orders.order_detail', [
                'order_details' => $order_details,
            ]);



    }



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

    public function destroy(Order $order)
    {
        OrderDetail::where('order_id', $order->id)->delete();
        $order->delete();
        return redirect()->route('orders.index');
    }
}
