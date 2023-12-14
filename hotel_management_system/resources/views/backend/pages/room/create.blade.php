@extends('backend.layout.app')
@section('title') Profile @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('room.page') }}" class="btn btn-primary"><i class="fas fa-backword"></i>Back to
                    Slide</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Featured Photo </label>
                                    <input type="file" class="form-control" name="featured_photo">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Name </label>
                                    {{-- <textarea type="text" name="name" id="" class="form-control"  cols="30" rows="10"> </textarea> --}}
                                    <input type="text" name="name" id="" class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Description </label>
                                    <textarea type="text" name="description" id="" class="form-control snote "  cols="30" rows="10"> </textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Price </label>
                                    <input type="number" class="form-control" name="price" >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Rooms </label>
                                    <input type="number" class="form-control" name="total_rooms" >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Room Size </label>
                                    <input type="text" class="form-control" name="room_size" >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Beds </label>
                                    <input type="number" class="form-control" name="total_beds" >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Bathrooms </label>
                                    <input type="number" class="form-control" name="total_bathrooms" >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Balconies </label>
                                    <input type="number" class="form-control" name="total_balconies" >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Total Guests </label>
                                    <input type="number" class="form-control" name="total_guests" >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Video Id </label>
                                    <input type="text" class="form-control" name="video_id" >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Amenities</label>
                                    @php $i=0;  @endphp
                                    @foreach ($amenities as $amenity)
                                    @php  $i++;  @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $amenity->id }}" id="defaultCheck{{ $i }}" name="arr_amenities[]">
                                            <label class="form-check-label" for="defaultCheck{{ $i }}"  >
                                            {{ $amenity->name }}
                                            </label>
                                        </div>

                                    @endforeach
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
