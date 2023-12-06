@extends('backend.layout.master')
@section('page-title')
    Edit Subcaetegory
@endsection

@section('body')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-6">
                    <h1>Edit SubCategory</h1>
                    <div class="d-flex">
                        <a href="{{ route('sub-category.index') }}" class="btn btn-primary"><i class="fa-solid fa-angles-left"></i>
                            SubCategory list</a>
                    </div>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Customers List Start -->
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('sub-category.update', $sub_categories->slug) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12 mb-3">
                                <label for="category_id" class="form-label">Select Category</label>
                                 <select name="category_id" class="form-select" id="">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                    @endforeach
                                 </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SubCategory name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}" id="">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- category image	 --}}

                            <div class="mb-3">
                                <label class="form-label">SubCategory image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" class="form-control"
                                name="image" type="file" id="image">
                            </div>
                            @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3">
                                <img class="img-fluid" src="{{asset($category->image ?? 'no-image.jpg')}}" id="newImg" width="150">
                            </div>


                            <div class="mt-5">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Customers List End -->
    </div>


@endsection
