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
                <div class="row">
                    <div class="col-sm-6 col-lg-6">
                        <div class="jobseeker-item">
                            <div class="jobseeker-icon">
                                <i class="flaticon-job-search"></i>
                            </div>
                            <div class="jobseeker-inner">
                                <span>Candidate</span>
                                <h3>Login as a Candidate</h3>
                            </div>
                            <a href="{{ route('candidateLogin') }}">Get Started
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="jobseeker-item">
                            <div class="jobseeker-icon">
                                <i class="flaticon-job-search"></i>
                            </div>
                            <div class="jobseeker-inner">
                                <span>Agent</span>
                                <h3>Login as an Agent</h3>
                            </div>
                            <a href="{{ route('agentLogin') }}">Get Started
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="jobseeker-item">
                            <div class="jobseeker-icon">
                                <i class="flaticon-recruitment"></i>
                            </div>
                            <div class="jobseeker-inner">
                                <span>Employer</span>
                                <h3>Login as a Employer</h3>
                            </div>
                            <a href="{{ route('employerLogin') }}">Get Started
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
