@extends('layouts.app')
@section('title', 'Thank You for Shopping')
@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center pt-3">
                    <div class="p-5 shadow bg-white">
                        <h2>Lara Ecom</h2>
                        <h4>Thank You for Shopping with Larva Ecom</h4>
                        <a href="{{ url('collection') }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection