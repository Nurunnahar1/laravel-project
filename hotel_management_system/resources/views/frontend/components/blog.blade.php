<div class="blog-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Blog</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)


                        <div class="col-md-4">
                            <div class="inner">
                                <div class="photo">
                                    <img src="{{ asset('uploads/post/'.$post->photo) }}" alt="">
                                </div>
                                <div class="text">
                                    <h2><a href="{{ route('single.blog',$post->id) }}">{{ $post->heading }}</a></h2>
                                    <div class="short-des">
                                        <p>{{ $post->short_Content }}</p>
                                    </div>
                                    <div class="button">
                                        <a href="{{ route('single.blog',$post->id) }}" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

            @endforeach
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 m-auto ">
        {{ $posts->links() }}
    </div>
</div>

 
