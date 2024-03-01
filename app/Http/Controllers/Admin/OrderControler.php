<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderControler extends Controller
{
    public function index()
    {
        $todayData = Carbon::now(); //'2024-03-01'; 
        $orders = Order::whereDate('created_at', $todayData)->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            return view('admin.orders.view', compact('order'));
        } else {
            return redirect('admin/orders')->with('message', 'Order id not found');
        }
    }
}
