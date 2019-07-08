@extends('layouts.app')

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <span class="login100-form-logo">
        <i class="zmdi zmdi-landscape"></i>
    </span>

    <span class="login100-form-title p-b-34 p-t-27">
        Reset Password
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Enter username">
        <input id="email" type="email" placeholder="Email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
        <span class="focus-input100" data-placeholder="&#xf207;"></span>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    

    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Send Password Reset Link
        </button>
    </div>

    
</form>
@endsection
