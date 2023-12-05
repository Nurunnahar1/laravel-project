@extends('backend.layout.app')
@section('title') Faq @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('faq.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Faq</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('faq.store') }}" method="post"  >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Question</label>
                                    <input type="text" class="form-control" name="question">


                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Answer </label>
                                    <textarea type="text" name="answer" id="" class="form-control snote"  cols="30" rows="10"> </textarea>
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





