@extends('backend.layout.app')
@section('title') Edit Amenities @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('amenities.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Amenities</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('amenities.update',$amenities->id) }}" method="post">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">


                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input  type="text" name="name" id="" class="form-control" value="{{ $amenities->name }}">

                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
