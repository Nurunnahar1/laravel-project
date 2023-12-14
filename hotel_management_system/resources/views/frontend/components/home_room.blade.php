`<div class="home-rooms">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Rooms and Suites</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($room_data as $item)
                <div class="col-md-3">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('uploads/room/'.$item->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="">{{ $item->name }}</a></h2>
                        <div class="price">
                            ${{ $item->price }}/night
                        </div>
                        <div class="button">
                            <a href="room-detail.html" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="big-button">
                    <a href="" class="btn btn-primary">See All Rooms</a>
                </div>
            </div>
        </div>
    </div>
</div>
