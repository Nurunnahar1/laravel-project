@extends('backend.layout.app')
@section('title') Profile @endsection
@section('content')
<div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('submit.sendEmail') }}" method="post"  >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div class="mb-4">
                                    <label class="form-label">Subject </label>

                                    <input type="text" class="form-control" name="subject">
                                </div> --}}
                                <div class="mb-4">
                                    <label class="form-label">Message </label>
                                    <textarea type="text" name="message" id="" class="form-control"  cols="30" rows="10"> </textarea>

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
