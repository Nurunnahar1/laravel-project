<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">


    <title>Admin Panel</title>

    @include('admin.components.inc.style')
    @include('admin.components.inc.script')



</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            <div class="navbar-bg"></div>
            @include('admin.components.header')


            @include('admin.components.sidebar')


@yield('content')
        </div>
    </div>

    @include('admin.components.inc.footer_script')

</body>

</html>
