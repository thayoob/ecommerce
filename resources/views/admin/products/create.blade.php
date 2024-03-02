@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Add Products
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotags-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotags-tab-pane" type="button" role="tab"
                                    aria-controls="seotags-tab-pane" aria-selected="false">SEO Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="true">Product Image</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab"
                                    aria-controls="color-tab-pane" aria-selected="true">Product Color</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Home tab -->
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Product Name -->
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                <!-- Product slug -->
                                <div class="mb-3">
                                    <label for="">Product slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                                </div>
                                <!-- Brand -->
                                <div class="mb-3">
                                    <label for="">Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Small Description -->
                                <div class="mb-3">
                                    <label for="">Small Description (500 Words)</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{ old('small_description') }}</textarea>
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <!-- SEO tags tab -->
                            <div class="tab-pane border p-3 fade" id="seotags-tab-pane" role="tabpanel"
                                aria-labelledby="seotags-tab" tabindex="0">
                                <!-- Meta Title -->
                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ old('meta_title') }}">
                                </div>
                                <!-- Meta Description -->
                                <div class="mb-3">
                                    <label for="">Meta Description (500 Words)</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ old('meta_description') }}</textarea>
                                </div>
                                <!-- Meta Keyword -->
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ old('meta_keyword') }}</textarea>
                                </div>
                            </div>
                            <!-- Details tab -->
                            <div class="tab-pane border p-3 fade" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="Details-tab" tabindex="0">
                                <!-- Original Price -->
                                <div class="mb-3">
                                    <label for="">Original Price</label>
                                    <input type="text" name="original_price" class="form-control"
                                        value="{{ old('original_price') }}">
                                </div>
                                <!-- Selling Price -->
                                <div class="mb-3">
                                    <label for="">Selling Price</label>
                                    <input type="text" name="selling_price" class="form-control"
                                        value="{{ old('selling_price') }}">
                                </div>
                                <!-- Quantity -->
                                <div class="mb-3">
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" class="form-control"
                                        value="{{ old('quantity') }}">
                                </div>
                                <!-- Trending -->
                                <div class="mb-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name="trending" style="width: 50px; height:50px;">
                                </div>
                                <!-- Featured -->
                                <div class="mb-3">
                                    <label for="">Featured</label>
                                    <input type="checkbox" name="featured" style="width: 50px; height:50px;">
                                </div>
                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" style="width: 50px; height:50px;">
                                </div>
                            </div>
                            <!-- Image tab -->
                            <div class="tab-pane border p-3 fade" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <!-- Upload Product Images -->
                                <div class="mb-3">
                                    <label for="">Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                            </div>
                            <!-- Color tab -->
                            <div class="tab-pane border p-3 fade" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <!-- Select Color -->
                                <div class="mb-3">
                                    <label for="">Select Color</label>
                                    <hr>
                                    <div class="row">
                                        @forelse ($colors as $color)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input type="checkbox" value="{{ $color->id }}"
                                                        name="colors[{{ $color->id }}]">
                                                    {{ $color->name }}
                                                    <br>
                                                    Quantity: <input type="number"
                                                        name="colorquantity[{{ $color->id }}]"
                                                        style="width:70px; border: 1px solid;"
                                                        value="{{ old('colorquantity.' . $color->id) }}">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h1>No color found</h1>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
