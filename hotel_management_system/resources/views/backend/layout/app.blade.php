<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">


    <title>Admin Panel</title>

    @include('backend.components.style')
    @include('backend.components.script')


</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('backend.components.navbar')
            @include('backend.components.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title')</h1>
                    </div>
                    @yield('content')
                </section>
            </div>

        </div>
    </div>

    @include('backend.components.footer_script')

</body>

</html>
