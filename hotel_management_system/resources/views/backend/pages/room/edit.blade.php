@extends('backend.layout.app')
@section('title') Edit Slide @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('slide.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Slide</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('slide.update',$slide_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Image </label>
                                     <img src="{{ asset('uploads/slide/'.$slide_data->photo) }}" alt="" class="w_200">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">New Image </label>
                                     <input type="file" name="photo">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Heading </label>
                                    <textarea type="text" name="heading" id="" class="form-control"  cols="30" rows="10">{{ $slide_data->heading }}</textarea>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Text </label>
                                    <textarea type="text" name="text" id="" class="form-control h_100"  cols="30" rows="10">{{ $slide_data->text }} </textarea>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button Text </label>

                                    <input type="text" class="form-control" name=" button_text" value="{{ $slide_data->button_text }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button URL </label>

                                    <input type="text" class="form-control" name="button_url" value="{{ $slide_data->button_url }}">
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
