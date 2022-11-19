<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()){
            Order::create($request->except('_token'));
        }
    }
}
