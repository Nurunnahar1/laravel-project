<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Famms - Fashion HTML Template</title>
    @include('frontend.components.inc.style')
</head>

<body>
    <div class="hero_area">
    @include('frontend.components.header')
    @include('frontend.components.slider')
    </div>
    @include('frontend.components.why_shop_with_us')
    @include('frontend.components.arrival')
    @include('frontend.components.subscribe')
    @include('frontend.components.clients')
    @include('frontend.components.footer')
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    @include('frontend.components.inc.script')
</body>

</html>
