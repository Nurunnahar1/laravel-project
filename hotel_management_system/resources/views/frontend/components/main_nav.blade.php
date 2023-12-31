<div class="main-nav">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('frontend/uploads/logo.png') }}" alt="">
            </a>
            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void;" class="nav-link dropdown-toggle">Room & Suite</a>

                        <ul class="dropdown-menu">
                            @foreach ($global_room_data as $item)
                              <li class="nav-item">
                                <a href="{{ route('room.details',$item->id) }}" class="nav-link">{{ $item->name }}</a>
                            </li>
                            @endforeach
                        </ul>


                    </li>
                    <li class="nav-item">
                        <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="{{ route('photo.gallery') }}" class="nav-link">Photo Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('video.gallery') }}" class="nav-link">Video Gallery</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
