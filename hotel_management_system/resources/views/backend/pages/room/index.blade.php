@extends('backend.layout.app')
@section('title') Room @endsection
@section('content')


    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('room.createPage') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i>
                            Add New Room
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>name</th>
                                        <th>featured_photo</th>
                                        <th>description</th>
                                        <th>price</th>
                                        <th>amenities</th>
                                        <th>total_rooms</th>
                                        <th>room_sizes</th>
                                        <th>total_beds</th>
                                        <th>total_bathrooms</th>
                                        <th>total_balconies</th>
                                        <th>total_guests</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($room as $key => $row)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $row->name }}</td>
                                            <th><img src="{{ asset('uploads/room') }}/{{ $row->featured_photo }}"
                                                    alt="" class="img-fluid rounded  w_200 "></th>
                                            <td>{{ $row->description }}</td>

                                            <td>${{ $row->price }}</td>
                                            <td>{{ $row->amenities }}</td>
                                            <td>{{ $row->total_rooms }}</td>
                                            <td>{{ $row->room_size }}</td>
                                            <td>{{ $row->total_beds }}</td>
                                            <td>{{ $row->total_bathrooms }}</td>
                                            <td>{{ $row->total_balconies }}</td>
                                            <td>{{ $row->total_guests }}</td>
                                            <td class="flex">
                                                <a href="{{ route('room.editPage',$row->id) }}" class="btn btn-primary"  >Edit</a>
                                                <a href="{{ route('room.destroy',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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
