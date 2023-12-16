@extends('customer.layout.app')
@section('customer_content')
    <div class="page-content">




        <div class="page-top">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Reset Password</h2>
                    </div>
                </div>
            </div>
        </div>
        @csrf
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <form action="{{ route('customer.reset.password') }}" method="POST">
                            @csrf
                            <div class="login-form">
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">

                                <div class="form-group mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password"
                                        class="form-control @error('retype_password') is-invalid @enderror"
                                        name="retype_password" placeholder="Confirm Password" required>

                                    @error('retype_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
