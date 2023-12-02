
<div class="slider">
    <div class="slide-carousel owl-carousel">
        @foreach ($slides as $slide)


            <div class="item" style="background-image:url({{ asset('uploads/slide/'.$slide->photo) }});">
                <div class="bg"></div>
                <div class="text">
                    <h2>{{ $slide->heading }}</h2>
                    <p>{{ $slide->text }} </p>
                    <div class="button">
                        <a href="{{ $slide->button_url }}">{{ $slide->button_text }}</a>
                    </div>
                </div>
            </div>

        @endforeach


    </div>
</div>
