@extends('layouts.app')

@section('css')
    <style type="text/css">
        body {
            background-color: #4e54c8;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        }

        .login-title {
            font-size: 40px;
            margin-top: 5px;
            line-height: 50px;
            color: #ffffff;
            font-weight: 600;
        }

        .login-title small {
            font-size: 30px;
            font-weight: 300;
        }

        .form-control.rounded {
            border-radius: 25px !important;
        }

        .btn-success, .gradient-success {
            background-color: #12c150;
            background-image: -webkit-linear-gradient(to top, #a8e063, #12c150);
            background-image: linear-gradient(to bottom, #a8e063, #12c150);
            background-repeat: no-repeat;
            background-size: cover;
            box-shadow: 0px 3px 15px #12c150;
            -ms-box-shadow: 0px 3px 15px #12c150;
            -moz-box-shadow: 0px 3px 15px #12c150;
            -webkit-box-shadow: 0px 3px 15px #12c150;
            color: #ffffff;
            border: 0;
            width: 100%;
            border-radius: 25px !important;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <h1 class="login-title"> <small> Welcome to,</small><br>SMOJI</h1>
            <h5 class="text-white"> Sign in</h5>
           
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row justify-content-center">

                    <div class="col-md-6">
                        <input id="email" type="email" class="text-center form-control @error('email') is-invalid @enderror rounded" name="email" value="{{ old('email') }}" required placeholder="Email Address">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">

                    <div class="col-md-6">
                        <input id="password" type="password" class="text-center form-control @error('password') is-invalid @enderror rounded" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">
                            {{ __('Sign in') }}
                        </button>
                    </div>
                </div>
            </form>

            <p class="mt-4"> <a class="text-white" href="/register"> Sign Up</a></p>
        </div>
    </div>
</div>
@endsection
