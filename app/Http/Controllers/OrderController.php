<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $orders = Order::query()
            ->where('full_name', operator: 'like', value: '%' . $search . '%')
            ->paginate(5)
            ->appends('order', $search);
        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order_details = OrderDetail::query()->where('order_id', $id)->paginate(5);
        return view('admin.orders.order_detail', [
            'order_details' => $order_details,
        ]);
    }

    public function verify(Order $order)
    {
        $order_details = OrderDetail::query()->get()->where('order_id', $order->id);


        foreach ($order_details as $order_detail) {
            $book = Book::find($order_detail->product_id);
            if ($book->quantity < $order_detail->amount) {
                return redirect()->route('orders.index');
            }
        }

        foreach ($order_details as $order_detail) {
            $book = Book::find($order_detail->product_id);
            $book->update(['quantity' => $book->quantity - $order_detail->amount]);
        }

        $order->update(['status' => '1']);

        // USE WHEN NEED
        // Order::pushOrder($order->id);

        return redirect()->route('orders.index');
    }

    public function redo(Order $order)
    {
        $order_details = OrderDetail::query()->get()->where('order_id', $order->id);

        foreach ($order_details as $order_detail) {
            $book = Book::find($order_detail->product_id);
            $book->update(['quantity' => $book->quantity + $order_detail->amount]);
        }

        $order->update(['status' => '0']);
        return redirect()->route('orders.index');
    }

    public function store(Request $request)
    {
        if (
            is_null($request['full_name']) ||
            is_null($request['company']) ||
            is_null($request['city']) ||
            is_null($request['district']) ||
            is_null($request['ward']) ||
            is_null($request['phone_number'])
        ) {
            $response['success'] = 'failed';
        } else {
            $cart = Cart::content();
            $order_id = Order::create($request->except('_token'))->id;

            foreach ($cart as $book) {
                $order_detail = [
                    'order_id' => $order_id,
                    'product_id' => $book->id,
                    'amount' => $book->qty,
                ];
                OrderDetail::create($order_detail);
            }
            Cart::destroy();
            $response['success'] = 'success';
        }
        return $response;
    }

    public function destroy(Order $order)
    {
        if ($order->status == '1') {
            $order_details = OrderDetail::query()->get()->where('order_id', $order->id);

            foreach ($order_details as $order_detail) {
                $book = Book::find($order_detail->product_id);
                $book->update(['quantity' => $book->quantity + $order_detail->amount]);
            }
        }


        OrderDetail::where('order_id', $order->id)->delete();
        $order->delete();
        return redirect()->back();
    }
}
