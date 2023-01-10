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
                            <a href="#">
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
                            <a href="/register">
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
                            <a href="/identityverify"><i class="fa-solid fa-circle-info"></i>
                                <br>
                                Identity verification
                                <br>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner-a-tag">
                            <a href="register"><i class="fa-solid fa-circle-info"></i>
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
            <div class="col-lg-12">
                <ul class="list-group list-group-numbered mb-5">
                    <li class="bordered-li d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">

                            Basic Account Info
                        </div>
                        <a href="/account-input" class="badge bg-primary rounded-1 p-1 text-light"><i class="fa-solid fa-chevron-right"></i></a>
                    </li>
                    <li class="bordered-li d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Investment Account
                            <span class="ms-2 text-danger">Needs Verification</span>
                        </div>
                        <a href="/emailverify" class="badge bg-primary rounded-1 p-1 text-light">Resend</a>
                    </li>
                    <li class="bordered-li d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Transactions
                        </div>
                        <a href="/resetpassword" class="badge bg-primary rounded-1 p-1 text-light">Change</a>

                    </li>
                    <li class="bordered-li d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Documents
                        </div>
                        <a href="/register" class="badge bg-primary rounded-1 p-1 text-light"><i class="fa-solid fa-chevron-right"></i></a>

                    </li>
                    <li class="bordered-li d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Support
                        </div>
                        <a href="/register" class="badge bg-primary rounded-1 p-1 text-light"><i class="fa-solid fa-chevron-right"></i></a>

                    </li>
                    <li class="bordered-li d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Help & FAQs
                        </div>
                        <a href="/register" class="badge bg-primary rounded-1 p-1 text-light"><i class="fa-solid fa-chevron-right"></i></a>

                    </li>
                    <li class="bordered-li d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            About
                        </div>
                        <a href="/register" class="badge bg-primary rounded-1 p-1 text-light"><i class="fa-solid fa-chevron-right"></i></a>

                    </li>
                    <li class="bordered-li d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Logout
                        </div>
                        <a href="/register" class="badge bg-primary rounded-1 p-1 text-light"><i class="fa-solid fa-chevron-right"></i></a>

                    </li>

                </ul>
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