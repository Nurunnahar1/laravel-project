<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Hotel Website</title>
    @include('frontend.components.inc.style')
    @include('frontend.components.inc.script')
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">

    {{-- <script src="https://www.paypalobjects.com/api/checkout.js"></script> --}}
</head>

<body>

    @include('frontend.components.topbar')
    <div class="navbar-area" id="stickymenu">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="uploads/logo.png" alt="">
            </a>
        </div>
        <!-- Menu For Desktop Device -->
        @include('frontend.components.main_nav')
    </div>

    @yield('content')

    @include('frontend.components.footer')
    <script src="{{ asset('frontend/js/custom.js') }}"></script>


</body>

</html>
