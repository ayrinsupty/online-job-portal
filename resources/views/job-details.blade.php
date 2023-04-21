@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')
    <div class="banner-area banner-area-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="banner-text">
                        <h1>Search Here For <span>Better</span> Job</h1>
                        <p>Jobs, Employment & Future Career Opportunities</p>
                        <div class="banner-form-area">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Job Title">
                                            <label>
                                                <i class="icofont-search-1"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <i class="icofont-location-pin"></i>
                                            </label>
                                            <input type="text" class="form-control" placeholder="City or State">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn banner-form-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="banner-img">
                        <img src="{{ asset('frontend/assets/img/home-3/banner.png') }}" alt="Banner">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="create-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="create-item">
                        <h2>Create your profile to find thousands Jobs, Build your Career & Employment!</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="create-item">
                        <div class="create-btn">
                            <a href="{{ route('dashboard') }}">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="category-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>Choose Your Desire Category</h2>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-sm-3 col-lg-3 category-border">
                        <div class="category-item category-two">
                            {{--                        <i class="flaticon-layers"></i>--}}
                            <a href="#">{{ $category->name }}</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{--    <div class="account-area account-area-two">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row account-wrap">--}}
    {{--                <div class="col-sm-6 col-lg-4">--}}
    {{--                    <div class="account-item">--}}
    {{--                        <i class="flaticon-approved"></i>--}}
    {{--                        <span>Register Your Account</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-6 col-lg-4">--}}
    {{--                    <div class="account-item">--}}
    {{--                        <i class="flaticon-cv"></i>--}}
    {{--                        <span>Upload Your Resume</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">--}}
    {{--                    <div class="account-item account-last">--}}
    {{--                        <i class="flaticon-customer-service"></i>--}}
    {{--                        <span>Apply for Dream Job</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="banner-btn">--}}
    {{--                <a href="create-account.html">Create Your Profile</a>--}}
    {{--                <a href="submit-resume.html">Upload Your CV</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <section class="job-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>{{ $jobDetails->title }}</h2>
            </div>

            <div id="container">
                <div style="color: black;" class="row">
                    <div class="col-md-12">
                        <ol>
                            <li><strong>Category : </strong>{{ $jobDetails->category->name }}</li>
                            <li><strong>Salary : </strong>{{ $jobDetails->salary }}</li>
                            <li><strong>Job Type : </strong>{{ $jobDetails->type }}</li>
                            <li><strong>Application last Date : </strong>{{ $jobDetails->application_last_date }}</li>
                        </ol>
                        <p><strong>{{ $jobDetails->short_description }}</strong></p>
                        <hr>
                        <h4>Description</h4>
                        <p>{{ $jobDetails->description }}</p>
                        <hr>
                        @php
                            $userId = null;
                        @endphp
                        @foreach($jobDetails->applicant as $application)
                            @if($application->user_id == auth()->id())
                                @php
                           $userId = auth()->id();
                            break;
                                @endphp
                            @endif
                                @endforeach
@if($userId)
                        @else
                                <a href="{{ route('apply',$jobDetails->id) }}">Apply</a>
@endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
