@extends('layouts.basicLayout')

@section('content')

<div class="display--flex mt-2">
    <div class="logo-div">
        <img src="{{ asset('frontend/assets/img/logo/bariLogo.png') }}" class="img-fluid" alt="Baribuy Logo">
    </div>
    <div class="">
        <a href="{{ url('login') }}" class="link-to-logout mt-0 p-3"><small>Save and Exit</small></a>

    </div>
</div>
<div class="email-verification">
    <div class="right--box">
        <div class="wrapper-inner">

            <img src="" />
            <h1>A Verification Email Was Sent</h1>
            <p>
                Help us keep your account safe! We sent an email to <stong>test@gmail.com</stong> with a link to verify your account.
                The link expires in 24 hours.
            </p>
            <p>Didn’t receive an email? <a href="#">Resend email.</a></p>
        </div>

    </div>
    <div class="left--box">
        <div class="wrapper-inner">

            <img src="" />
            <h1>Questions?
                We're Here to Help</h1>
            <p>
                Curabitur porttitor lacinia augue, at facilisis est tristique at. Cras sodales suscipit lacus eu molestie. Aenean posuere elementum maximus.
            </p>
            <p> Vestibulum ante ipsum primis in <a href="#">faucibus orci</a> luctus et ultrices posuere cubilia curae;</p>
            <button class="btn-register">Register for a Free Member</button>
            <a href="register" class="skip-btn">Skip now </a>
        </div>
    </div>
</div>

<!-- /.social-auth-links -->
@if (Route::has('password.request'))
<!-- <p class="mb-1">
    <a class="btn btn-link" href="{{ route('password.request') }}">
        I forgot my password
    </a>
</p> -->
@endif
@endsection