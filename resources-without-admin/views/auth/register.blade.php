@extends('layouts.app')

@section('content')

<div class="page-content h-100">
    <div class="background theme-header"><img src="img/city2.jpg" alt=""></div>
    <div class="row mx-0 h-100 justify-content-center">
        <div class="col-10 col-md-6 col-lg-4 my-3 mx-auto text-center align-self-center">
            <img src="{{ asset('images/logo.png') }}" alt="" class="login-logo">
            <h1 class="login-title"><small>Welcome to,</small><br>Smoji</h1>
            <br>
            <h5 class="text-white mb-4">Sign up</h5>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row justify-content-center">
                    <div class="col-md-12">
                        <input id="fname" type="text" class="text-center form-control rounded @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required placeholder="First Name">

                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-12">
                        <input id="lname" type="text" class="text-center form-control rounded @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required placeholder="Last Name">

                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">

                    <div class="col-md-12">
                        <input id="email" type="email" class="text-center form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">

                    <div class="col-md-12">
                        <input id="password" type="password" class="text-center form-control rounded @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">

                    <div class="col-md-12">
                        <input id="referralcode" type="text" class="text-center form-control rounded @error('referalcode') is-invalid @enderror" name="referralcode"  autocomplete="off" placeholder="Referral Code">
                    </div>
                </div>

                <div class="form-group row mb-0 justify-content-center">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-success rounded border-0 z-3">
                            {{ __('Create Account') }}
                        </button>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <div class="row no-gutters">
                <div class="col-6 text-left"><a href="#" class="text-white mt-3">Forgot Password?</a></div>
                <div class="col-6 text-right"><a href="/login" class="text-white text-center mt-3">Sign in</a></div>
            </div>                        
        </div>
    </div>
    <br>
</div>
@endsection