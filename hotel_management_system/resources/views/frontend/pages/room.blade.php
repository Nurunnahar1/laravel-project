@extends('frontend.layout.app')
@section('content')
    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Rooms</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    `<div class="home-rooms">
                        <div class="container">
                            <div class="row">
                                @foreach ($room_data as $item)
                                {{-- {{ $loop->iteration }} --}}
                                    <div class="col-md-3">
                                        <div class="inner">
                                            <div class="photo">
                                                <img src="{{ asset('uploads/room/' . $item->featured_photo) }}"
                                                    alt="">
                                            </div>
                                            <div class="text">
                                                <h2><a href="{{ route('room.details', $item->id) }}">{{ $item->name }}</a>
                                                </h2>
                                                <div class="price">
                                                    ${{ $item->price }}/night
                                                </div>
                                                <div class="button">
                                                    <a href="{{ route('room.details', $item->id) }}"
                                                        class="btn btn-primary">See Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="com-md-12">
                                {{ $room_data->links() }}
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
