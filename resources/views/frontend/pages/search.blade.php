@extends('layouts.app')
@section('title', 'Serach Products')
@section('content')
    <div class="py-5 ">
        <div class="container">
            <div class="row ">
                <div class="col-md-10 justify-content-center">
                    <h4>Search Results</h4>
                    <div class="underline mb-4"></div>
                </div>
                @forelse ($searchProducts as $productitem)
                    <div class="col-md-10">
                        <div class="product-card">
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <div class="product-card-img">
                                        <label class="stock bg-success">New</label>
                                        @if ($productitem->productImages->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $productitem->category->slug . '/' . $productitem->slug) }}">
                                                <img src="{{ asset($productitem->productImages->first()->image) }}"
                                                    alt="{{ $productitem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productitem->brand }}</p>
                                        <h5 class="product-name">
                                            <a
                                                href="{{ url('/collections/' . $productitem->category->slug . '/' . $productitem->slug) }}">
                                                {{ $productitem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">₹{{ $productitem->selling_price }}</span>
                                            <span class="original-price">₹{{ $productitem->original_price }}</span>
                                        </div>
                                        <p style="height:45px; overflow:hidden">
                                            <b>Description : </b>
                                            {{ $productitem->description }}
                                        </p>
                                        <a href="{{ url('/collections/' . $productitem->category->slug . '/' . $productitem->slug) }}"
                                            class="btn btn-primary">view</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-2 col-md-12">
                        <h4>No Products available</h4>
                    </div>
                @endforelse

                <div class="col-md-10">
                    {{ $searchProducts->appends(request()->input())->links() }}
                </div>

                <div class="text-center">
                    <a href="{{ url('collections') }}" class="btn btn-warning px-3">View More</a>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
