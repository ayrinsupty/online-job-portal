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
                            <form action="{{ route('home') }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="search" class="form-control" placeholder="Job Title">
                                            <label>
                                                <i class="icofont-search-1"></i>
                                            </label>
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-lg-6">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label>--}}
                                    {{--                                                <i class="icofont-location-pin"></i>--}}
                                    {{--                                            </label>--}}
                                    {{--                                            <input type="text" class="form-control" placeholder="City or State">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
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
                        <a href="{{ route('home',['categoryId='.$category->id]) }}">{{ $category->name }}</a>
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
                <h2>Browse Jobs</h2>
            </div>
    {{--            <div class="sorting-menu">--}}
    {{--                <ul>--}}
    {{--                    <li class="filter active" data-filter="all">All</li>--}}
    {{--                    <li class="filter" data-filter=".web">New</li>--}}
    {{--                    <li class="filter" data-filter=".ui">Featured</li>--}}
    {{--                    <li class="filter" data-filter=".branding">Recent</li>--}}
    {{--                    <li class="filter" data-filter=".ux">Full Time</li>--}}
    {{--                    <li class="filter" data-filter=".wp">Part Time</li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
            <div id="container">
                <div class="row">
                    @foreach($jobs as $job)
                        <div class="col-lg-6 mix web ui">
                            <div class="job-item">
                                <img style="width: 80px;" src="{{ asset('images/' . $job->user->logo ?? "null") }}" alt="Job">
                                <div class="job-inner align-items-center">
                                    <div class="job-inner-left">
                                        <h3>
                                            <a href="">{{ $job->title }}</a>
                                        </h3>
{{--                                        <a class="company" href="company-details.html">Winbrans.com</a>--}}
                                        <ul>
                                            <li>
                                                <i class="icofont-money-bag"></i>
                                                {{ $job->salary ?? "Negotiable" }}
                                            </li>
                                            <li>
                                                <i class="icofont-location-pin"></i>
                                                {{ $job->short_description }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="job-inner-right">
                                        <ul>
                                            <li>
                                                <a href="{{ route('job.details',$job->id) }}">Apply</a>
                                            </li>
{{--                                            <li>--}}
{{--                                                <span>Full Time</span>--}}
{{--                                            </li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>


{{--    <section class="companies-area ptb-100">--}}
{{--        <div class="container">--}}
{{--            <div class="section-title">--}}
{{--                <h2>Popular Companies</h2>--}}
{{--            </div>--}}
{{--            <div class="companies-slider owl-theme owl-carousel">--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/1.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Winbrans.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Quadra, Street, Canada--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/2.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Infiniza.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        North Street, California--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/3.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Glovibo.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Barming Road, UK--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/4.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Bizotic.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Washington, New York--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/1.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Winbrans.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Quadra, Street, Canada--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/2.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Infiniza.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        North Street, California--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/3.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Glovibo.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Barming Road, UK--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/4.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Bizotic.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Washington, New York--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/1.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Winbrans.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Quadra, Street, Canada--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/2.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Infiniza.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        North Street, California--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/3.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Glovibo.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Barming Road, UK--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--                <div class="companies-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/companies/4.png') }}" alt="Companies">--}}
{{--                    <h3>--}}
{{--                        <a href="company-details.html">Bizotic.com</a>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        <i class="icofont-location-pin"></i>--}}
{{--                        Washington, New York--}}
{{--                    </p>--}}
{{--                    <a class="companies-btn" href="create-account.html">Hiring</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


{{--    <section class="profile-area ptb-100">--}}
{{--        <div class="container">--}}
{{--            <div class="section-title">--}}
{{--                <h2>Featured Profile</h2>--}}
{{--            </div>--}}
{{--            <div class="profile-slider owl-theme owl-carousel">--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/1.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Jerry Hudson</h3>--}}
{{--                        <span>Business Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/2.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Jac Jacson</h3>--}}
{{--                        <span>Web Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/3.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Tom Potter</h3>--}}
{{--                        <span>UX/UI Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/4.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Shane Mac</h3>--}}
{{--                        <span>SEO Consultant </span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/5.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Jerry Hudson</h3>--}}
{{--                        <span>Business Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/6.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Jac Jacson</h3>--}}
{{--                        <span>Web Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/7.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Tom Potter</h3>--}}
{{--                        <span>UX/UI Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/8.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Shane Mac</h3>--}}
{{--                        <span>SEO Consultant </span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/1.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Jerry Hudson</h3>--}}
{{--                        <span>Business Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/2.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Jac Jacson</h3>--}}
{{--                        <span>Web Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/3.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Tom Potter</h3>--}}
{{--                        <span>UX/UI Consultant</span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-item">--}}
{{--                    <img src="{{ asset('frontend/assets/img/home-1/profile/4.jpg') }}" alt="Profile">--}}
{{--                    <div class="profile-inner">--}}
{{--                        <h3>Shane Mac</h3>--}}
{{--                        <span>SEO Consultant </span>--}}
{{--                        <a href="candidate-details.html">View Profile--}}
{{--                            <i class="icofont-swoosh-right"></i>--}}
{{--                        </a>--}}
{{--                        <div class="profile-heart">--}}
{{--                            <a href="candidate-details.html">--}}
{{--                                <i class="icofont-heart-alt"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}




@endsection
