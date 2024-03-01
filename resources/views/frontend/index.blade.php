@extends('layouts.app')
@section('title', 'Home page')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->description }}</p>
                            <div>
                                <a href="#" class="btn btn-slider">Get Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome To Lara Ecom</h4>
                    <div class="underline mx-auto"></div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores obcaecati mollitia ut quam
                        consequatur adipisci, consequuntur voluptate doloremque quia ipsam numquam amet aperiam eveniet
                        maiores ipsa assumenda soluta esse ducimus.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Tranding Products</h4>
                    <div class="underline mb-4"></div>
                </div>

                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trading-product">

                            @foreach ($trendingProducts as $productitem)
                                <div class="item">
                                    <div class="product-card">
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

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products available for</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $('.trading-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>

@endsection
