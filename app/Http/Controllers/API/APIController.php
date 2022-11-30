<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class APIController extends Controller
{
    public function pushOrder($id){
        $getResults = Order::pushOrder($id);
        return response()->json(['status' =>$getResults()]);
    }
}
