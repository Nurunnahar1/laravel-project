@extends('backend.layout.app')
@section('title')
    Room
@endsection
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
                                            <th>price</th>
                                            <th>amenities</th>
                                            <th>total_rooms</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php  $i=0; @endphp
                                        @foreach ($room as $key => $row)
                                            @php  $i++; @endphp
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $row->name }}</td>
                                                <th><img src="{{ asset('uploads/room') }}/{{ $row->featured_photo }}"
                                                        alt="" class="img-fluid rounded  w_200 "></th>


                                                <td>${{ $row->price }}</td>
                                                <td>{{ $row->amenities }}</td>
                                                <td>{{ $row->total_rooms }}</td>

                                                <td class="flex">

                                                    <button class="btn btn-warning" data-toggle="modal"
                                                        data-target="#exampleModal{{ $i }}">Detail</button>


                                                    <a href="{{ route('room.editPage', $row->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('room.destroy', $row->id) }}" class="btn btn-danger"
                                                        onClick="return confirm('Are you sure?');">Delete</a>

                                                </td>
                                            </tr>


                                            <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Room Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label class="form-label">
                                                                        Name</label></div>
                                                                <div class="col-md-8">{{ $row->name }}</div>
                                                            </div>
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">Description</label></div>
                                                                <div class="col-md-8">{{ $row->description }}</div>
                                                            </div>
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">price</label></div>
                                                                <div class="col-md-8">{{ $row->price }}</div>
                                                            </div>


                                                            {{-- <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">amenities</label></div>
                                                                <div class="col-md-8">
                                                                    @php
                                                                        $array = explode(",", $row->amenities);
                                                                        for ($i=0; $i<count($array) ; $i++) {
                                                                            $temp_row = \App\Models\Amenities::where('id',$array[$i])->first();
                                                                            echo $temp_row->name.'<br>';
                                                                        }
                                                                    @endphp
                                                                </div>

                                                            </div> --}}

                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label class="form-label">amenities</label></div>
                                                                <div class="col-md-8">
                                                                    @php
                                                                        $array = explode(",", $row->amenities);
                                                                        for ($i = 0; $i < count($array); $i++) {
                                                                            try {
                                                                                $temp_row = \App\Models\Amenities::findOrFail($array[$i]);
                                                                                echo $temp_row->name . '<br>';
                                                                            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                                                                                // Handle the case where the amenity with ID $array[$i] is not found
                                                                                echo "Amenity not found for ID: " . $array[$i] . '<br>';
                                                                            }
                                                                        }
                                                                    @endphp
                                                                </div>
                                                            </div>


                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">total_rooms</label></div>
                                                                <div class="col-md-8">{{ $row->total_rooms }}</div>
                                                            </div>
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">room_size</label></div>
                                                                <div class="col-md-8">{{ $row->room_size }}</div>
                                                            </div>
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">total_beds</label></div>
                                                                <div class="col-md-8">{{ $row->total_beds }}</div>
                                                            </div>
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">total_bathrooms</label></div>
                                                                <div class="col-md-8">{{ $row->total_bathrooms }}</div>
                                                            </div>
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">total_balconies</label></div>
                                                                <div class="col-md-8">{{ $row->total_balconies }}</div>
                                                            </div>
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">total_guests</label></div>
                                                                <div class="col-md-8">{{ $row->total_guests }}</div>
                                                            </div>
                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">total_guests</label></div>
                                                                <div class="col-md-8">{{ $row->total_guests }}</div>
                                                            </div>

                                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                                <div class="col-md-4"><label
                                                                        class="form-label">Video</label></div>
                                                                <div class="col-md-8">
                                                                    <div class="iframe-container1">
                                                                        <iframe
                                                                            src="https://www.youtube.com/embed/{{ $row->video_id }}"
                                                                            width="400" height="315" frameborder="0"
                                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;
                                                                        picture-in-picture"
                                                                            allowfullscreen></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
