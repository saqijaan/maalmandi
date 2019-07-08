@extends('layouts.app')

@section('content')
<form class="validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title pb-3">
            Register
        </span>
    
        <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <span class="focus-input100" data-placeholder="&#xf207; Username"></span>
        </div>
        @error('name')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="wrap-input100 validate-input" data-validate = "Enter Phone">
            <input id="phone" type="phone" class="input100 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
            <span class="focus-input100" data-placeholder="&#xf2b6; Phone"></span>
        </div>
        @error('phone')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="wrap-input100 validate-input" data-validate = "Enter Email">
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
        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input id="password-confirm" type="password" class="input100 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
            <span class="focus-input100" data-placeholder="&#xf191; Confirm Password"></span>
        </div>
        @error('password')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    
        <div class="container-login100-form-btn">
            <div class="col-md-4">
                <button class="login100-form-btn">
                    Register
                </button>
            </div>
            <div class="col-md-4">
                <a href="{{ url('/') }}" class="btn btn-lg btn-warning rounded">
                    Back
                </a>
            </div>
        </div>
    
        <div class="text-center pt-3">
        <a class="txt1" href="{{route('login')}}">
                Already haven an account? Login
            </a>
        </div>
    </form>
@endsection
