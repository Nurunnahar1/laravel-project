<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">


    <title>Admin Panel</title>

    @include('customer.components.style')
    @include('customer.components.script')


</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('customer.components.navbar')
            @include('customer.components.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Customer Dashboard</h1>
                    </div>
                    @yield('content')
                </section>
            </div>

        </div>
    </div>

    @include('customer.components.footer_script')

    @include('customer.components.toastr_msg')

</body>

</html>

