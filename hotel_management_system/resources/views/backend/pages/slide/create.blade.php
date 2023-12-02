@extends('backend.layout.app')
@section('title') Profile @endsection
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
                    <form action="{{ route('slide.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Image </label>

                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Heading </label>
                                    <textarea type="text" name="heading" id="" class="form-control"  cols="30" rows="10"> </textarea>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Text </label>
                                    <textarea type="text" name="text" id="" class="form-control h_100"  cols="30" rows="10"> </textarea>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button Text </label>

                                    <input type="text" class="form-control" name=" button_text" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button URL </label>

                                    <input type="text" class="form-control" name="button_url" >
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
