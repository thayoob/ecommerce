@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Slider
                        <a href="{{ url('admin/sliders/') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('$slider->image') }}" style="height: 50px; width:50px;" alt="slider">
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : '' }}
                                style="width: 30px; height: 30px;">
                            Checked=Hidden,Unchecked=visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
