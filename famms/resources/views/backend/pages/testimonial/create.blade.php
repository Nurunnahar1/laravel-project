@extends('backend.layout.app')
@section('title') Testimonial Create @endsection

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="row">
        <h1>Testimonial Create Form</h1>

        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('testimonial.list') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to products</a>
            </div>
        </div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                        @csrf



                        <div class="col-12 mb-3">
                            <label for="client_name" class="form-label">Client Name</label>
                            <input type="text" name="client_name" class="form-control  " id="client_name">
                            @error('client_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="client_designation" class="form-label">Product Price</label>
                            <input type="number" name="client_designation" min="0" class="form-control @error('client_designation') is-invalid   @enderror" id="client_designation">
                            @error('client_designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="client_message" class="form-label">Product Code</label>
                            <input type="text" name="client_message" class="form-control @error('client_message') is-invalid   @enderror" id="client_message" placeholder="enter a unique product code">
                            @error('client_message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="client_image" class="form-label">Client Image</label>
                            <input type="file" name="client_image" class="form-control dropify"     id="client_image">
                            @error('client_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                            @enderror
                        </div>

                        <div class="mb-3 form-check form-switch">

                            <input type="checkbox" name="is_active" class="form-check-input"    id="activeStatus" checked>
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

@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>
<script>
    $('.dropify').dropify();
</script>
@endpush


