<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="active"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu" style="display: block;">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

            <li class=""><a class="nav-link" href="{{ route('slide.page') }}"><i class="fas fa-hand-point-right"></i> <span>Slide</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('feature.page') }}"><i class="fas fa-hand-point-right"></i> <span>Feature</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('testimonial.page') }}"><i class="fas fa-hand-point-right"></i> <span>Testimonials</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('post.page') }}"><i class="fas fa-hand-point-right"></i> <span>Post</span></a></li>

     

        </ul>
    </aside>
</div>
