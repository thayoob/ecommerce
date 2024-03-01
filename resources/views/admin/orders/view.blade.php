@extends('layouts.admin')
@section('title', 'Admin Order Details')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        My Order Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order Id: {{ $order->id }}</h6>
                                <h6>Tracking Id/No: {{ $order->tracking_no }}</h6>
                                <h6>Order Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">Order Status Message:
                                    <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                                <h5>User Details</h5>
                                <hr>
                                <h6>Full Name: {{ $order->fullname }}</h6>
                                <h6>Email Id: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phone }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pin code: {{ $order->pincode }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h5>Order Items</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Id</th>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        @if ($item->product->productImages->isNotEmpty())
                                                            <img src="{{ asset($item->product->productImages[0]->image) }}"
                                                                style="width: 50px; height: 50px"
                                                                alt="{{ $item->product->name }}">
                                                        @else
                                                            <img src="" style="width: 50px; height: 50px"
                                                                alt="{{ $item->product->name }}">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item->product->name }}
                                                        @if ($item->productColor)
                                                            @if ($item->productColor->color)
                                                                <span style="color: rgb(54, 54, 38)">- Color:
                                                                    {{ $item->productColor->color->name }}</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>₹{{ $item->price }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td class="fw-bold">₹{{ $item->quantity * $item->price }}</td>
                                                </tr>
                                                @php
                                                    $totalPrice += $item->quantity * $item->price;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="5" class="fw-bold">Total Amount:</td>
                                                <td class="fw-bold">₹{{ $totalPrice }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="">Update Your Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Select Order Status</option>
                                        <option value="in progress"
                                            {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress
                                        </option>
                                        <option value="completed"
                                            {{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="pending"
                                            {{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="cancelled"
                                            {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                        <option value="out-for-delivery"
                                            {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out For
                                            Delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3">
                                Current Order status: <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
