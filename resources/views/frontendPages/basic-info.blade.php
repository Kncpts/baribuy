@extends('layouts.basicLayout')

@section('content')

<div class="display--flex mt-2">
    <div class="logo-div">
        <img src="{{ asset('frontend/assets/img/logo/bariLogo.png') }}" class="img-fluid" alt="Baribuy Logo">
    </div>
    <div class="">
        <a href="{{ url('login') }}" class="link-to-logout mt-0 p-3">Logout</a>

    </div>
</div>
<div class="text-center">
    <div class="basic-info-header-section">
        <div>
            <span class="img-circle">
                <img src="{{ asset('img/beard.png')}}" class="img-fluid" />
            </span>
        </div>
        <div class="basic-info-main-text">
            <h1 class="mb-0">
                Welcome Home!
            </h1>
            <h4>
                Praesent imperdiet.
            </h4>
        </div>

    </div>
</div>
<div class="basic-info-body">

    <div class="form-div">
        <form  action="{{ route('emailverify') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control input__field @error('email') is-invalid @enderror" id="fname" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control input__field @error('email') is-invalid @enderror" id="fname" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <select class="form-control" aria-label="Default select example">
                            <option selected>Investment amount (in the next 12 months)</option>
                            <option value="1">100$-2000$</option>
                            <option value="1">2000$-5000$</option>
                            <option value="1">5000$-25000$</option>
                            <option value="1">25000$-100,000$</option>
                            <option value="1">100,000$+</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                        I have read and agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <button type="submit" class="btn btn-primary btn-block btn-submit-custom">Let's Start In</button>
                </div>
            </div>
        </form>
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