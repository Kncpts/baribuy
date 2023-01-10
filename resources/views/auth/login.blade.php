@extends('layouts.authLayout')

@section('content')
<div class="text-center">
    <a href="{{ url('/') }}" class="login-logo"> <img src="{{ asset('frontend/assets/img/logo/bariLogo.png') }}" class="img-fluid" alt="Baribuy Logo"></a>

</div>
<p class="login-box-msg">Welcome</p>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- <div class="card card--inverted">
        <h2> <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-coffee" href="#icon-coffee" />
            </svg>Inverted</h2>
      

        <div class="button-group">
            <button>Send</button>
            <button type="reset">Reset</button>
        </div>
    </div> -->


    <div class="input-group mb-2">
        <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email"> -->

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
        <div class="col-6">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="remember" style="position: relative; top: -1px">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <div class="col-6">
            <p class="mb-1 text-right">
                <a class="btn btn-link font-small" href="{{ route('password.request') }}">
                    Forgot my password ??
                </a>
            </p>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-block btn-submit-custom">Sign In</button>
        </div>
        <div class="col-lg-12">
          <small class="d-block text-center mt-3">  Don't have Account </small> 
          <a class="btn btn-link btn-sign-up" href="{{ route('signup')}}">Singup</a>
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