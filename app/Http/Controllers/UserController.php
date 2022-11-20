<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $search = $request->get('q');

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

    public function orders(){
        if (session()->has('id')){
            $orders = Order::query()->get()->where('user_id', session()->get('id'));
            return view('user.home.orders', [
                'orders' => $orders,
            ]);
        }
        return redirect()->route('home.index');
    }

    public function showOrderDetails($id){
        if (session()->has('id')){
            $order_details = OrderDetail::query()->get()->where('order_id', $id);
            return view('user.home.order_detail', [
                'order_details' => $order_details,
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
        if ($user->level === 0){
            return redirect()->back();
        }
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
        if ($user->level === 1){
            PasswordReset::where('user_id', $user->id)->delete();

            $orders = Order::query()->get()->where('user_id', $user->id);

            Address::where('user_id', $user->id)->delete();

            foreach ($orders as $order){
                OrderDetail::where('order_id', $order->id)->delete();
                $order->delete();
            }

            $user->delete();
        }
        return redirect()->route('users.index');
    }
}
