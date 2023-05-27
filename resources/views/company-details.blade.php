@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')






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
                <img style="height: 100px; width:120px;"
                     src="{{ asset('images/' . $company->logo) }}" alt="">
                <h2>{{ $company->comapny_name }}</h2>
            </div>

            <div id="container">
                <div style="color: black;" class="row">
                    <div class="col-md-12">
                        <ol>
                            <li><strong>Company Email : </strong>{{ $company->company_email }}</li>
                            <li><strong>company phone : </strong>{{ $company->company_phone }}</li>
                            <li><strong>Office Address : </strong>{{ $company->office_address }}</li>
                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
