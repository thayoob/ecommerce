<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderControler extends Controller
{

    public function index(Request $request)
    {
        // $todayData = Carbon::now(); //'2024-03-01'; 
        // $orders = Order::whereDate('created_at', $todayData)->paginate(10);

        $todayDate = Carbon::today(); // Get today's date

        $orders = Order::when($request->date != null, function ($query) use ($request) {
            return $query->whereDate('created_at', $request->date);
        })
            ->when($request->status != null, function ($query) use ($request) {
                return $query->where('status_message', $request->status);
            })
            ->when($request->date == null, function ($query) use ($todayDate) {
                return $query->whereDate('created_at', $todayDate);
            })
            ->paginate(10);

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
    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orderId)->with('message', 'Order Status Upadted');
        } else {
            return redirect('admin/orders/' . $orderId)->with('message', 'Order id not found');
        }
    }
}
