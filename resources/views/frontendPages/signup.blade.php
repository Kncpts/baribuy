


@extends('layouts.authLayout')

@section('content')
<div class="text-center">
    <a href="{{ url('/') }}" class="login-logo"> <img src="{{ asset('frontend/assets/img/logo/bariLogo.png') }}" class="img-fluid" alt="Baribuy Logo"></a>

</div>
<p class="login-box-msg">Easily invest in rental homes.</p>
<form method="POST" action="{{ route('basic-info') }}">
    @csrf

    <div class="input-group mb-2">
        <label class="input">
            <input class="input__field @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" />
            <span class="input__label">Email</span>
        </label>

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="input-group mb-2">
        <label class="input">
            <input id="password" type="password" class="input__field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" />
            <span class="input__label">Password</span>
        </label>
        <!-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"> -->
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-block btn-submit-custom">Signup</button>
        </div>
        <div class="col-lg-12">
          <small class="d-block text-center mt-3"> Already have a account? </small> 
          <a class="btn btn-link btn-sign-up" href="{{ route('login')}}">Login</a>
        </div>
    </div>
</form>
<!-- /.social-auth-links -->
@if (Route::has('password.request'))
<!-- <p class="mb-1">
    <a class="btn btn-link" href="{{ route('password.request') }}">
        I forgot my password
    </a>
</p> -->
@endif
@endsection