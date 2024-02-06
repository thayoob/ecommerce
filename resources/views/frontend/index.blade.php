@extends('layouts.app')
@section('title', 'Home page')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide">
        @foreach ($sliders as $key => $slider)
            <div class="carousel-inner">
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset("$slider->image") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {{ $slider->title }}
                            </h1>
                            <p>
                                {{ $slider->description }}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
@endsection
