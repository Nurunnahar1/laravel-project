@extends('backend.layout.app')
@section('title') Edit Photo @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('photo.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Gallery</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('photo.update',$photos->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Image </label>
                                     <img src="{{ asset('uploads/photo_gallery/'.$photos->photo) }}" alt="" class="w_200">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">New Image </label>
                                     <input type="file" name="photo">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Caption </label>
                                    <textarea type="text" name="caption" id="" class="form-control"  cols="30" rows="10">{{ $photos->caption }}</textarea>
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
