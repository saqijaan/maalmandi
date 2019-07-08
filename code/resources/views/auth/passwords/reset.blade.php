@extends('layouts.app')

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <span class="login100-form-logo">
        <i class="zmdi zmdi-landscape"></i>
    </span>

    <span class="login100-form-title p-b-34 p-t-27">
        Create New Password
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Enter username">
        <input id="email" type="email" placeholder="Email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{$email ??  old('email') }}" required autocomplete="email" autofocus>
        
        <span class="focus-input100" data-placeholder="&#xf207;"></span>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input id="password" type="password" placeholder="Password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="wrap-input100 validate-input" data-validate="Enter password">
            
            <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Reset Password
        </button>
    </div>



@endsection
