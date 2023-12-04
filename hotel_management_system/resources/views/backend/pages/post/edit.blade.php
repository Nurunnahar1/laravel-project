@extends('backend.layout.app')
@section('title') Post Update @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('post.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Post</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('post.update',$posts->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Image </label>
                                     <img src="{{ asset('uploads/post/'.$posts->photo) }}" alt="" class="w_200">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Image </label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Heading </label>
                                    <input type="text" class="form-control" name="heading" value="{{ $posts->heading }}">


                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Short Description </label>
                                    <textarea type="text" name="short_Content" id="" class="form-control h_100"  cols="30" rows="10"> {{ $posts->short_Content }}  </textarea>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Long Description </label>
                                    <textarea type="text" name="long_Content" id="" class="form-control snote"  cols="30" rows="10"> {{ $posts->long_Content }}  </textarea>

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
