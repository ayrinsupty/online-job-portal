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
                                            <input type="text" name="search" class="form-control"
                                                   placeholder="Job Title">
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

    <section class="job-area ptb-100">

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

        <div class="container">
            <div class="section-title">
                <h2>{{ $jobDetails->title }}</h2>
            </div>

            <div id="container">
                <div style="color: black;" class="row">
                    <div class="col-md-12">
                        <ol>
                            <li><strong>Category : </strong>{{ $jobDetails->category->name }}</li>
                            <li><strong>Salary : </strong>{{ ($jobDetails->salary>0) ? $jobDetails->salary : "Negotiable"  }}</li>
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
                            <p class="text-danger">Already Applied</p>
                        @else
                            <form method="post" action="{{ route('apply',$jobDetails->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Salary Expectation</label>
                                            <input type="number" name="expect_salary"
                                                   class="form-control @error('expect_salary') is-invalid @enderror"/>
                                            @error('expect_salary')
                                            <strong class="text-danger">{{ $errors->first('expect_salary') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    @role('Agent')
                                    <p class="text-danger">You Can not apply</p>
                                    @else
                                        <button class="btn btn-success mt-3">Apply</button>
                                        @endrole
                                </div>
                            </form>
                            {{--                            <a href="{{ route('apply',$jobDetails->id) }}">Apply</a>--}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
