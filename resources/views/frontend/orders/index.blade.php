@extends('layouts.app')
@section('title', 'orders')
@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-borderd table-striped">
                                <thead>
                                    <th>Order ID</th>
                                    <th>Traking No</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Ordered Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
