@extends('layouts.master')
@section('title')
    Agent Login
@endsection

@section('content')
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-text">
                        <h2>Agent Log In</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Agent Log In</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-area pt-100">
        <div class="container">
            <h2>Login Your Account</h2>

            <form method="POST" action="{{ route('agentLogin') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control"
                        placeholder="Username, Phone Number or Email" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                <div class="login-sign-in">
                    <a href="#">Forgot Password?</a>
                    <ul>
                        <li>Don’t have an account ?</li>
                        <li>
                            <a href="{{ route('agentRegister') }}">Sign Up Here</a>
                        </li>
                    </ul>
                    <div class="text-center">
                        <button type="submit" class="btn login-btn">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="login-social">
            <a href="https://www.facebook.com/" target="_blank">
                <i class="icofont-facebook"></i>
                Login With Facebook
            </a>
            <a class="login-google" href="https://mail.google.com/" target="_blank">
                <i class="icofont-google-plus"></i>
                Login With Google
            </a>
        </div>
    </div>
    </div>
@endsection
