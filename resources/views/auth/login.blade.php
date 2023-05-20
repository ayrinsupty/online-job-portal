@extends('layouts.master')
@section('title')
    User Login
@endsection

@section('content')
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-text">
                        <h2>Log In</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Log In</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-area pt-100">
        <div class="container">
            <h2>Login Your Account</h2>
            <div class="login-wrap">
{{--                <div class="row">--}}
{{--                    <div class="col-sm-6 col-lg-6">--}}
{{--                        <div class="jobseeker-item">--}}
{{--                            <div class="jobseeker-icon">--}}
{{--                                <i class="flaticon-job-search"></i>--}}
{{--                            </div>--}}
{{--                            <div class="jobseeker-inner">--}}
{{--                                <span>Candidate</span>--}}
{{--                                <h3>Login as a Candidate</h3>--}}
{{--                            </div>--}}
{{--                            <a href="login.html">Get Started--}}
{{--                                <i class="icofont-arrow-right"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-lg-6">--}}
{{--                        <div class="jobseeker-item">--}}
{{--                            <div class="jobseeker-icon">--}}
{{--                                <i class="flaticon-recruitment"></i>--}}
{{--                            </div>--}}
{{--                            <div class="jobseeker-inner">--}}
{{--                                <span>Employer</span>--}}
{{--                                <h3>Login as a Employer</h3>--}}
{{--                            </div>--}}
{{--                            <a href="login.html">Get Started--}}
{{--                                <i class="icofont-arrow-right"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @elseif ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>

            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control"
                           placeholder="Username, Phone Number or Email"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>
                <div class="login-sign-in">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                    <ul>
                        <li>Don’t have an account ?</li>
                        <li>
                            <a href="{{ route('register') }}">Sign Up Here</a>
                        </li>
                    </ul>
                    <div class="text-center">
                        <button type="submit" class="btn login-btn">Sign In</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
