@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Products
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                    aria-controls="color-tab-pane" aria-selected="true">Product Colors</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control-" id="">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'Selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Product slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Barnd</label>
                                    <select name="brand" class="form-control-" id="">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $brand->name == $product->brand ? 'Selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Small Description (500 Words)</label>
                                    <textarea name="small_description" value="{{ $product->name }}" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="seotags-tab-pane" role="tabpanel"
                                aria-labelledby="seotags-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Mata Title</label>
                                    <input type="text" value="{{ $product->meta_title }}" name="meta_title"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description (500 Words)</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="Details-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Original Price</label>
                                    <input type="text" name="original_price" value="{{ $product->original_price }}"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Selling Price</label>
                                    <input type="text" name="selling_price" value="{{ $product->selling_price }}"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" value="{{ $product->quantity }}"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name="trending"
                                        {{ $product->trending == '1' ? 'Checked' : '' }}
                                        style="width: 50px; height:50px;">
                                </div>
                                <div class="mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" {{ $product->status == '1' ? 'Checked' : '' }}
                                        style="width: 50px; height:50px;">
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                                <div>
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($image->image) }}"
                                                        style="width: 80px; height:80px ;" class="me-4 border"
                                                        alt="image" />
                                                    <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                        class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <h4>Add Product Color </h4>
                                    <label for="">Select Color</label>
                                    <hr>
                                    <div class="row">
                                        @forelse ($colors as $colorItem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input type="checkbox" value="{{ $colorItem->id }}"
                                                        name="colors[{{ $colorItem->id }}]">
                                                    {{ $colorItem->name }}
                                                    <br>
                                                    Quantity: <input type="number"
                                                        name="colorquantity[{{ $colorItem->id }}]"
                                                        style="width:70px; border: 1px sold;">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h1>No color found</h1>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $prodColor)
                                                <tr>
                                                    <td class="product-color-tr">
                                                        @if ($prodColor->color)
                                                            {{ $prodColor->color->name }}
                                                        @else
                                                            No Color Found
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px">
                                                            <input type="text" value="{{ $prodColor->quantity }}"
                                                                class="productColorQuantity form-control form-control-sm">
                                                            <button type="button" value="{{ $prodColor->id }}"
                                                                class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $prodColor->id }}"
                                                            class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.updateProductColorBtn', function() {
                var product_id = "{{ $product->id }}"
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.product-color-tr').find('.productColorQuantity').val();

                if (qty <= 0) {
                    alert('Quantity is required');
                    return false;
                }
                var data = {
                    'product_id': product_id,
                    'qty': qty
                }
                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message);
                    }
                });

            });
        });
    </script>
@endsection
