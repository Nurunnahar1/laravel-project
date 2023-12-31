@extends('backend.layout.app')
@section('title') Edit Video @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('video.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Gallery</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('video.update',$videos->id) }}" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Video </label>

                                    <div class="iframe-container">
                                        <iframe   width="560" height="315" src="https://www.youtube.com/embed/{{ $videos->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                                     {{-- <img src="{{ $videos->video_id) }}" alt="" class="w_200"> --}}
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">New Video </label>
                                     <input type="text" name="video_id">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Caption </label>
                                    <textarea type="text" name="caption" id="" class="form-control"  cols="30" rows="10">{{ $videos->caption }}</textarea>
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





