@extends('customer.layout.app')
@section('customer_content')
   <div class="page-top">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Login</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="login-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Login</button>
                                <a href="forget-password.html" class="primary-color">Forget Password?</a>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('customer.signup') }}" class="primary-color">New User? Make Registration</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
