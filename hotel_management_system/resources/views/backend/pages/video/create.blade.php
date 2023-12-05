@extends('backend.layout.app')
@section('title') Video @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('video.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Video</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('video.store') }}" method="post"  >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Video Id</label>
                                    <input type="text" class="form-control" name="video_id">

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Caption </label>
                                    <textarea type="text" name="caption" id="" class="form-control"  cols="30" rows="10"> </textarea>
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





