@extends('layouts.app')

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    @csrf
   

    <span class="login100-form-title pt-3 pb-3">
        Log in
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Enter username">
        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <span class="focus-input100" data-placeholder="&#xf15a; Email"></span>
    </div>
    @error('email')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="wrap-input100 validate-input" data-validate="Enter password">
        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        <span class="focus-input100" data-placeholder="&#xf191; Password"></span>      
    </div>
    @error('password')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="contact100-form-checkbox">
        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
        <label class="label-checkbox100" for="ckb1">
            Remember me
        </label>
    </div>

    <div class="container-login100-form-btn">
        <div class="col-md-4">
            <button class="login100-form-btn">
                Login
            </button>
        </div>
        <div class="col-md-4">
            <a href="{{ url('/') }}" class="btn btn-lg btn-warning rounded">
                Back
            </a>
        </div>
    </div>

    <div class="text-center pt-3">
        <a class="txt1 mr-5" href="{{route('register')}}">
            Register New Account
        </a>
        <a class="txt1" href="{{route('password.request')}}">
            Forgot Password?
        </a>
    </div>
</form>
@endsection
