<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>  @yield('title')</title>
    @include('backend.components.inc.style')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.components.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('backend.components.header')
            <div class="main-panel">
                <div class="content-wrapper">
                   @yield('content')

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('backend.components.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('backend.components.inc.script')
</body>

</html>
