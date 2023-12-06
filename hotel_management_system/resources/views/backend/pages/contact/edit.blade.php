@extends('backend.layout.app')
@section('title') Edit Contact Us @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contact.update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Heading</label>
                                    <input  type="text" name="heading" id="" class="form-control" value="{{ $contact->heading }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Map iframe code </label>
                                    <textarea   name="map" id="" class="form-control h_100"  cols="30" rows="10">{{ $contact->map }}</textarea>
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








