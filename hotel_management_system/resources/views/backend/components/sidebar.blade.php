<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu" style="display: block;">
                    <li class="{{ Request::is('admin/about/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('about.editPage') }}"><i class="fas fa-angle-right"></i> About</a></li>
                    <li class=""><a class="nav-link" href="{{ route('term.editPage') }}"><i class="fas fa-angle-right"></i> Term & Condition</a></li>
                    <li class=""><a class="nav-link" href="{{ route('privacy.editPage') }}"><i class="fas fa-angle-right"></i>Privacy & Policy</a></li>
                    <li class=""><a class="nav-link" href="{{ route('contact.editPage') }}"><i class="fas fa-angle-right"></i>Contact</a></li>

                </ul>
            </li>

            <li class="{{ Request::is('admin/slide/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('slide.page') }}"><i class="fas fa-hand-point-right"></i> <span>Slide</span></a></li>

            <li class="{{ Request::is('admin/feature/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('feature.page') }}"><i class="fas fa-hand-point-right"></i> <span>Feature</span></a></li>

            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('testimonial.page') }}"><i class="fas fa-hand-point-right"></i> <span>Testimonials</span></a></li>

            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('post.page') }}"><i class="fas fa-hand-point-right"></i> <span>Post</span></a></li>
            <li class="{{ Request::is('admin/photo/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('photo.page') }}"><i class="fas fa-hand-point-right"></i> <span>Photo Gallery</span></a></li>
            <li class="{{ Request::is('admin/video/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('video.page') }}"><i class="fas fa-hand-point-right"></i> <span>Video Gallery</span></a></li>
            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('faq.page') }}"><i class="fas fa-hand-point-right"></i> <span>Faq</span></a></li>

            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu" style="display: block;">
                    <li class="{{ Request::is('admin/subscriber-show/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('subscriber.show') }}"><i class="fas fa-angle-right"></i> Subscriber</a></li>
                    <li class="{{ Request::is('admin/subscriber-send-email/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('subscriber.sendEmail') }}"><i class="fas fa-angle-right"></i> Send Email</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Hotel Section</span></a>
                <ul class="dropdown-menu" style="display: block;">
                    <li class="{{ Request::is('admin/amenities/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('amenities.page') }}"><i class="fas fa-angle-right"></i>Amenities</a></li>
                    <li class="{{ Request::is('admin/room/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('room.page') }}"><i class="fas fa-angle-right"></i>Room</a></li>
                </ul>
            </li>





        </ul>
    </aside>
</div>
