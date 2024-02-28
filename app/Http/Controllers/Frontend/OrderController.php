<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.orders.index', compact('orders'));
    }
    public function show($order_id)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $order_id)->first();
        if ($order) {
            return view('frontend.orders.view', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No orders Found');
        }
    }
}
