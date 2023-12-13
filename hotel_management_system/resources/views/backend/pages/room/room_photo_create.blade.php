@extends('backend.layout.app')
@section('title') Room Gallery - {{ $room_data->name }} @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('room.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Previous</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('roomPhotoGallery.store',$room_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Room Photo </label>
                                    <input type="file" class="form-control" name="photo">
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

<section class="section">

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($room_photos as $key => $row)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <th><img src="{{ asset('uploads/roomPhoto') }}/{{ $row->photo }}"
                                                alt="" class="img-fluid rounded  w_200 "></th>

                                        <td class="flex">

                                            <a href="{{ route('roomPhotoGallery.delete',$row->id) }} " class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>


                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
