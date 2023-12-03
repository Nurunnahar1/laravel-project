@extends('backend.layout.app')
@section('title') Testimonial Create @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('testimonial.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Testimonial</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Image </label>
                                    <input type="file" class="form-control" name="photo">

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name </label>
                                    <textarea type="text" name="name" id="" class="form-control"  cols="30" rows="10"> </textarea>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Designation </label>
                                    <textarea type="text" name="designation" id="" class="form-control h_100"  cols="30" rows="10"> </textarea>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Comment</label>

                                    <input type="text" class="form-control" name=" comment" >
                                </div>
                                

                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Create</button>
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
