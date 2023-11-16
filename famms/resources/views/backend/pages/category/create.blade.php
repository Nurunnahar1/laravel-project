@extends('backend.layout.app')
@section('title') Category Create @endsection
@section('content')
 
    <div class="row">
        <h1>Category Create Form</h1>

        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('category.list') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Categories</a>
            </div>
        </div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class=" mb-3">
                            <label for="title" class="form-label">Category Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid  @enderror"
                                placeholder="enter category title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_image" class="form-label">Category Image</label>
                            <input type="file" name="category_image" class="form-control dropify" id="category_image">
                            @error('category_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                            @enderror
                        </div>

                        <div class="mb-3 form-check form-switch ">
                            <input type="checkbox" class="form-check-input" name="is_active" role="switch" id="activeStatus" checked>
                            <label for="activeStatus" class="form-check-label">Active or Inactive</label>
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


