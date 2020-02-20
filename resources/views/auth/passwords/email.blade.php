@extends('layouts.app')

@section('content')
<div class="top-logo">
    <a href="/"><img  src="../assets/images/logo-icon-white.png" alt=""></a>
</div>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-color:black;">
    <div class="auth-box">
        <div class="login-form">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="logo">
                <!-- <span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium mb-3">Sign In to Admin</h5> -->
            </div>
            <div class="auth-line">
                <hr>
                <span>Reset password:</span>
            </div>
            <!-- Form -->
            <div class="row auth-box-main">
                <div class="col-12">
                    <form class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img
                                        src="../assets/images/icons/ti-user.png" alt=""></span>
                            </div>
                            <input
                                class="form-control form-control-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                type="email" placeholder="Email" name="email" value="{{ old('email') }}" required
                                autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>                        
                        <div class="form-group text-center">
                            <div class="col-xs-12 pb-3 justify-content-center d-flex">
                                <button class="btn btn-block btn-lg btn-info font-roboto btn-border" type="submit">
                                Send Password Reset Link
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-12">
                <a href="{{ route('login') }}" id="" class="text-white float-left offset-1-1"> Sign In</a>
                <a href="{{ route('register') }}" id="" class="text-white float-right"> Create new account</a>
            </div>
        </div>
        <div id="recoverform">
            <div class="logo">
                <span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>
                <h5 class="font-medium mb-3">Recover Password</h5>
                <span>Enter your Email and instructions will be sent to you!</span>
            </div>
            <div class="row mt-3">
                <!-- Form -->
                <form class="col-12"
                    action="https://www.wrappixel.com/demos/admin-templates/xtreme-admin/html/ltr/index.html">
                    <!-- email -->
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control form-control-lg" type="email" required="" placeholder="Username">
                        </div>
                    </div>
                    <!-- pwd -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper scss in scafholding.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper scss in scafholding.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right Sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right Sidebar -->
<!-- ============================================================== -->
@endsection