@extends('layouts.frontend.app')

@section('content')

<section id="investment_section_requirment">
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fa-solid fa-sack-dollar text-warning"></i> Investment </h2>
                        <small class="text-muted">A verification email has been sent to abctest@gmail.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col">
                        <div class="inner-a-tag">
                            <a href="/account">
                                <i class="fa-solid fa-circle-info"></i>
                                <br>
                                Verify your email address
                                <br>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner-a-tag">
                            <a href="#">
                                <i class="fa-solid fa-circle-info"></i>
                                <br>
                                Create an investment account
                                <br>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner-a-tag">
                            <a href="#"><i class="fa-solid fa-circle-info"></i>
                                <br>
                                Identity verification
                                <br>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner-a-tag">
                            <a href="#"><i class="fa-solid fa-circle-info"></i>
                                <br>
                                Link and verify your bank account
                                <br>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="accountInfo">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Account Info</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Second Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                    </div>
                    <div class="mb-3 text-end">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    function openSidebar() {
        var element = document.getElementById("rightSidebar");
        element.classList.add("mystyle");
    }

    function closeSidebar() {
        var element = document.getElementById("rightSidebar");
        element.classList.remove("mystyle");
    }
</script>