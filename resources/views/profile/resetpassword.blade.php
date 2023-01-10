@extends('layouts.authLayout')

@section('content')
<div class="text-center">
    <a href="{{ url('/') }}" class="login-logo"> <img src="{{ asset('frontend/assets/img/logo/bariLogo.png') }}" class="img-fluid" alt="Baribuy Logo"></a>

</div>
<p class="login-box-msg">Change Password</p>
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
            <input class="input__field @error('password') is-invalid @enderror" id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="" autofocus placeholder="Password" />
            <span class="input__label">Password</span>
        </label>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
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
            <span class="input__label">Reset Password</span>
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
            <button type="submit" class="btn btn-primary btn-block btn-submit-custom">Update password</button>
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