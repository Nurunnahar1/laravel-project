@extends('backend.layout.app')
@section('title') Edit About Us @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('faq.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    About Us</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('about.update') }}" method="post">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">


                                <div class="mb-4">
                                    <label class="form-label">Heading</label>
                                    <input  type="text" name="heading" id="" class="form-control" value="{{ $about->heading }}">

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Content</label>
                                    <textarea type="text" name="content" id="" class="form-control snote"  cols="30" rows="10">{{ $about->content }}</textarea>
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
