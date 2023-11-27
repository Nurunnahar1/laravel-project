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

            <section class="section">

                <div class="container container-login">
                    <div class="row">
                        <div
                            class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary border-box">
                                <div class="card-header card-header-auth">
                                    <h4 class="text-center">Admin Panel Login</h4>
                                </div>
                                {{-- @if (session()->get('error'))
                                    <div><p></p></div>
                                @endif --}}

                                @if (Session::has('error'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('error') }}


                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                                    </div>
                                @endif
                                <div class="card-body card-body-auth">
                                    <form method="POST" action="{{ route('admin.login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Email Address" value=" " autofocus>
                                            @error('email')
                                                {{-- <div class="alert alert-danger ">{{ $message }}</div> --}}
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid   @enderror" name="password" placeholder="Password">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Login
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <a href="{{ route('forget.password.page') }}">
                                                    Forget Password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>



        </div>
    </div>

    @include('admin.components.inc.footer_script')

</body>

</html>
