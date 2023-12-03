
<div class="testimonial" style="background-image: url(uploads/slide2.jpg)">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Our Happy Clients</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    @foreach ($testimonials as $testimonial)

                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/testimonial/'.$testimonial->photo) }}" alt="">
                        </div>
                        <div class="text">
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{{ $testimonial->designation }}</p>
                        </div>
                        <div class="description">
                            <p> {{ $testimonial->comment }}</p>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
