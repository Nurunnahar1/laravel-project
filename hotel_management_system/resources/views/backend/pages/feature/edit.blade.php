@extends('backend.layout.app')
@section('title') Feature Update @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('feature.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Feature</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('feature.update',$features->id) }}" method="post" >
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Icon  </label>
                                    <div><i class="{{ $features->icon  }} fz_40"></i></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Icon </label>
                                    <input type="text" class="form-control" name="icon" value="{{ $features->icon  }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Heading </label>
                                    <textarea type="text"  name="heading" id="" class="form-control"  cols="30" rows="10">{{ $features->heading  }} </textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Text </label>
                                    <textarea type="text" name="text" id="" class="form-control h_100"  cols="30" rows="10">{{ $features->heading  }} </textarea>
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



