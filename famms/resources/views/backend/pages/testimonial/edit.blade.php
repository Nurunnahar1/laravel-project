@extends('backend.layout.app')
@section('title') Category Create @endsection

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="row">
        <h1>Product Update Form</h1>

        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('product.list') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to products</a>
            </div>
        </div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.update', ['slug' => $product->slug]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12 mb-3">
                            <label for="category_id" class="form-label">Select Category</label>
                             <select name="category_id" class="form-select" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        @if ($product->category_id == $category->id)
                                        selected
                                        @endif
                                        {{ $category->title }}</option>
                                @endforeach
                             </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control  " id="name" value="{{ $product->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" name="product_price" min="0" class="form-control @error('product_price') is-invalid   @enderror" id="product_price" value="{{ $product->product_price }}">
                            @error('product_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="product_code" class="form-label">Product Code</label>
                            <input type="text" name="product_code" class="form-control @error('product_code') is-invalid   @enderror" id="product_code" placeholder="enter a unique product code" value="{{ $product->product_code }}">
                            @error('product_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="product_stock" class="form-label">Initial Stock</label>
                            <input type="number" name="product_stock" min="1" class="form-control @error('product_stock') is-invalid   @enderror" id="product_stock" value="{{ $product->product_stock }}">
                            @error('product_stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="alert_quantity" class="form-label">Alert Quantity</label>
                            <input type="number" name="alert_quantity" min="1" class="form-control @error('alert_quantity') is-invalid   @enderror" id="alert_quantity" value="{{ $product->alert_quantity }}">
                            @error('alert_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-12 mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="short_description" cols="30" rows="5">{{ $product->short_description }}</textarea>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-12 mb-3">
                            <label for="long_description" class="form-label">Long Description</label>
                            <textarea name="long_description" class="form-control @error('long_description') is-invalid @enderror" id="long_description" cols="30" rows="5">{{ $product->long_description }}</textarea>
                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-12 mb-3">
                            <label for="additional_info" class="form-label">Additionaal info</label>
                            <textarea name="additional_info" class="form-control @error('additional_info') is-invalid @enderror" id="additional_info" cols="30" rows="5">{{ $product->additional_info }}</textarea>
                            @error('additional_info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input type="file" name="product_image" data-default-file="{{ asset('uploads/product') }}/{{ $product->product_image }}" class="form-control dropify " id="product_image" >
                            @error('product_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                        </div>

                        {{-- product multiple Image Section --}}
                        <div class="col-12 mb-3">
                            <label for="product_image" class="form-label">Product Multiple Image</label>
                            <input type="file" name="product_multiple_image[]" multiple class="form-control   " id="product_multiple_image" >
                            @error('product_multiple_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                        </div>

                        <div class="col-6 mb-3 form-check  form-switch ">
                            <input type="checkbox" class="form-check-input" name="is_active" role="switch" id="is_active" checked>
                            <label for="is_active" class="form-check-label">Active or Inactive</label>
                            @error('is_active')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror
                        </div>


                        <div class="mt-5">
                            <button type="submit" class="btn btn-success ">Store</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $(document).ready(function () {

        $('.dropify').dropify();
    });
</script>
@endpush


