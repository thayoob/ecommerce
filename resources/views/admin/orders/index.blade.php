@extends('layouts.admin')
@section('title', 'orders')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        My Orders
                        {{-- <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a> --}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Traking No</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Ordered Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $orderItem)
                                    <tr>
                                        <td>{{ $orderItem->id }}</td>
                                        <td>{{ $orderItem->tracking_no }}</td>
                                        <td>{{ $orderItem->fullname }}</td>
                                        <td>{{ $orderItem->payment_mode }}</td>
                                        <td>{{ $orderItem->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $orderItem->status_message }}</td>
                                        <td><a href="{{ url('admin/orders/' . $orderItem->id) }}"
                                                class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Orders available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
