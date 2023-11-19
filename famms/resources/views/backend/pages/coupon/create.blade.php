@extends('backend.layout.app')
@section('title') Coupon Create @endsection

@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="row">
        <h1>Coupon Create Form</h1>

        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('coupon.list') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to Coupon</a>
            </div>
        </div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('coupon.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-6 mb-3">
                            <label for="coupon_name " class="form-label">Coupon name </label>
                            <input type="text" name="coupon_name" class="form-control @error('coupon_name ') is-invalid   @enderror" id="coupon_name ">
                            @error('coupon_name ')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="discount_amount " class="form-label">Discount amount</label>
                            <input type="number" name="discount_amount" min="0" class="form-control @error('discount_amount ') is-invalid   @enderror" id="discount_amount ">
                            @error('discount_amount ')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="minimum_purchese_amount" class="form-label">Minimum purchese amount</label>
                            <input type="text" name="minimum_purchese_amount" class="form-control @error('minimum_purchese_amount') is-invalid   @enderror" id="minimum_purchese_amount" placeholder="enter a unique product code">
                            @error('minimum_purchese_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="validity_till" class="form-label">Validity till</label>
                            <input type="date" name="validity_till" class="form-control @error('validity_till') is-invalid   @enderror" id="validity_till" placeholder="enter a unique product code">
                            @error('validity_till')
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


