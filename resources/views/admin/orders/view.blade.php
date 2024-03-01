@extends('layouts.admin')
@section('title', 'My Order Details')
@section('content')
    <div class="row">
        <div class="col-md-12">
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
        </div>
    </div>
@endsection
