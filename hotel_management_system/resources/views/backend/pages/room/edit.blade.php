@extends('backend.layout.app')
@section('title') Edit Room @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('room.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Room</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('room.update',$room_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Image </label>
                                     <img src="{{ asset('uploads/room/'.$room_data->featured_photo) }}" alt="" class="w_200">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">New Image </label>
                                     <input type="file" name="featured_photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name </label>
                                    <input type="text" class="form-control" name=" name" value="{{ $room_data->name }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Description </label>
                                    <textarea type="text" name="description" id="" class="form-control snote"  cols="30" rows="10">{{ $room_data->description }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Price </label>
                                    <textarea type="text" name="price" id="" class="form-control h_100"  cols="30" rows="10">{{ $room_data->price }} </textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total rooms </label>
                                    <input type="text" class="form-control" name=" total_rooms" value="{{ $room_data->total_rooms }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Amenities</label>
                                    @php $i=0;  @endphp
                                    @foreach ($amenities as $amenity)

                                        @if (in_array($amenity->id,$existing_amenities))
                                            @php  $check_type = 'checked';  @endphp
                                        @else
                                            @php $check_type = '';  @endphp
                                        @endif

                                        @php  $i++;  @endphp
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $amenity->id }}" id="defaultCheck{{ $i }}" name="arr_amenities[]" {{ $check_type }}>
                                                <label class="form-check-label" for="defaultCheck{{ $i }}"  >
                                                {{ $amenity->name }}
                                                </label>
                                            </div>

                                    @endforeach
                                </div>





                                <div class="mb-4">
                                    <label class="form-label">Room size </label>
                                    <input type="text" class="form-control" name="room_size" value="{{ $room_data->room_size }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total beds</label>
                                    <input type="text" class="form-control" name="total_beds" value="{{ $room_data->total_beds }}">
                                </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total bathrooms</label>
                                    <input type="text" class="form-control" name="total_bathrooms" value="{{ $room_data->total_bathrooms }}">
                                </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total balconies</label>
                                    <input type="text" class="form-control" name="total_balconies" value="{{ $room_data->total_balconies }}">
                                </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total guests</label>
                                    <input type="text" class="form-control" name="total_guests" value="{{ $room_data->total_beds }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Video Preview</label>
                                    <div class="iframe-container1">
                                        <iframe
                                            src="https://www.youtube.com/embed/{{ $room_data->video_id }}"
                                            width="400" height="315" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;
                                        picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video id</label>
                                    <input type="text" class="form-control" name="video_id" value="{{ $room_data->video_id }}">
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
