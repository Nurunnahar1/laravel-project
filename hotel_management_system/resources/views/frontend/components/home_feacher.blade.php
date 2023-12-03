<div class="home-feature">
    <div class="container">
        <div class="row">
            @foreach ($features as $feature)

                <div class="col-md-3">
                    <div class="inner">
                        <div class="icon"><i class="{{ $feature->icon }}"></i></div>
                        <div class="text">
                            <h2>{{ $feature->heading }}</h2>
                            <p> {{ $feature->text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
