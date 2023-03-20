@extends('layouts.master')
@section('title')
    User Registration
@endsection

@section('content')
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-text">
                        <h2>Create Account</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Create Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="create-account-area pt-100 pb-100">
        <div class="container">
            <div class="create-photo">
                <div class="already-create">
                    <span>Already have an account?</span>
                    <a href="{{ route('login') }}">Sign In</a>
                </div>
                <form method="post" action="{{ route('update.user') }}">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="create-photo-item">
                                <div class="create-photo-left">
                                    <img src="{{ auth()->user()->image }}" alt="">
                                    <div class="d-table">
                                        <div class="d-table-cell">
                                            <div class="form-group">
                                                <i style="margin-top: -165px;" class="icofont-photobucket"></i>
                                                <input type="file" name="image" class="form-control-file"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="create-photo-item">
                                <div class="create-photo-right">
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-control  @error('first_name') is-invalid @enderror"
                                               value="{{ auth()->user()->first_name }}" name="first_name"
                                               placeholder="Your Name Here"/>
                                        @error('first_name')
                                        <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="{{ auth()->user()->last_name }}" name="last_name"
                                               class="form-control  @error('last_name') is-invalid @enderror"
                                               placeholder="Profession"/>
                                        @error('last_name')
                                        <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="{{ auth()->user()->phone }}" name="phone"
                                               class="form-control  @error('phone') is-invalid @enderror"
                                               placeholder="Profession"/>
                                        @error('phone')
                                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="{{ auth()->user()->address }}" name="address"
                                               class="form-control  @error('address') is-invalid @enderror"
                                               placeholder="Profession"/>
                                        @error('address')
                                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" name="updateUser" class="btn create-photo-btn">
                                            Done
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="create-information">
                <form action="{{ route('add.education') }}" method="post">
                    @csrf
                    <h3>Education</h3>
                    <div class="create-information-btn">
                        {{--                        <a href="#">Upload Cover Photo</a>--}}
                        {{--                        <a href="#">Upload Your CV</a>--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Institute Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\SeekerEducation::where('user_id',auth()->id())->get() as $item)
                                <tr>
                                    <td>{{ $item->institute_name }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <a href="{{ route('delete.education',$item->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="institute_name">Institute Name</label>
                                <input type="text" name="institute_name"
                                       class="form-control @error('institute_name') is-invalid @enderror"/>
                                @error('institute_name')
                                <strong class="text-danger">{{ $errors->first('institute_name') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="start_date"
                                       class="form-control @error('start_date') is-invalid @enderror"/>
                                @error('start_date')
                                <strong class="text-danger">{{ $errors->first('start_date') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="end_date"
                                       class="form-control @error('end_date') is-invalid @enderror"/>
                                @error('end_date')
                                <strong class="text-danger">{{ $errors->first('end_date') }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button type="submit" name="education" value="education" class="btn create-ac-btn">Save</button>
                    </div>
                </form>
            </div>
            <div class="create-education">
                <div class="create-education-wrap">
                    <div class="create-education-left">
                        <h3>Experience</h3>
                    </div>
                    <div class="create-information-btn">
                        {{--                        <a href="#">Add Education</a>--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Designation</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\SeekerExperience::where('user_id',auth()->id())->get() as $item)
                                <tr>
                                    <td>{{ $item->company_name }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->from_date }}</td>
                                    <td>{{ $item->to_date }}</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <a href="{{ route('delete.experience',$item->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="post" action="{{ route('add.experience') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name"
                                       class="form-control @error('company_name') is-invalid @enderror"/>
                                @error('company_name')
                                <strong class="text-danger">{{ $errors->first('company_name') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation"
                                       class="form-control @error('designation') is-invalid @enderror"/>
                                @error('designation')
                                <strong class="text-danger">{{ $errors->first('designation') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>From Date</label>
                                <input type="date" name="from_date"
                                       class="form-control @error('from_date') is-invalid @enderror"/>
                                @error('from_date')
                                <strong class="text-danger">{{ $errors->first('from_date') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>To Date</label>
                                <input type="date" name="to_date"
                                       class="form-control @error('to_date') is-invalid @enderror"/>
                                @error('to_date')
                                <strong class="text-danger">{{ $errors->first('to_date') }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button type="submit" name="experience" class="btn create-ac-btn">Save</button>
                    </div>
                </form>
            </div>
            <div class="create-skills">
                <div class="create-skills-wrap">
                    <div class="create-skills-left">
                        <h3>Skill</h3>
                    </div>
                    <div class="create-information-btn">
                        {{--                        <a href="#">Add Education</a>--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\SeekerExpert::where('user_id',auth()->id())->get() as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <a href="{{ route('delete.skill',$item->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="{{ route('add.skill') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"/>
                                @error('name')
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" name="skill" class="btn create-ac-btn">Save</button>
                        </div>

                        {{--                        <div class="col-lg-6">--}}
                        {{--                            <p>Percentage</p>--}}
                        {{--                            <input name="range" value="70" type="range">--}}
                        {{--                        </div>--}}
                    </div>
                </form>
            </div>
            <div class="create-education">
                <div class="create-education-wrap">
                    <div class="create-education-left">
                        <h3>Reference</h3>
                    </div>
                    <div class="create-information-btn">
                        {{--                        <a href="#">Add Education</a>--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Occupaton</th>
                                <th>designation</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\SeekerReference::where('user_id',auth()->id())->get() as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->occupation }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <a href="{{ route('delete.reference',$item->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="{{ route('add.reference') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>name</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"/>
                                @error('name')
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>phone</label>
                                <input type="tel" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror"/>
                                @error('phone')
                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>occupation</label>
                                <input type="text" name="occupation"
                                       class="form-control @error('occupation') is-invalid @enderror"/>
                                @error('occupation')
                                <strong class="text-danger">{{ $errors->first('occupation') }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>designation</label>
                                <input type="text" name="designation"
                                       class="form-control @error('designation') is-invalid @enderror"/>
                                @error('designation')
                                <strong class="text-danger">{{ $errors->first('designation') }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button type="submit" name="reference" class="btn create-ac-btn">Save</button>
                    </div>
                </form>
            </div>
            {{--            <div class="create-skills">--}}
            {{--                <div class="create-skills-wrap">--}}
            {{--                    <div class="create-skills-left">--}}
            {{--                        <h3>Social Links</h3>--}}
            {{--                    </div>--}}
            {{--                    <div class="create-skills-right">--}}
            {{--                        <a href="#">Edit</a>--}}
            {{--                        <a href="#">Add New</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <form>--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-lg-6">--}}
            {{--                            <div class="form-group">--}}
            {{--                                <label>Facebook</label>--}}
            {{--                                <input type="text" class="form-control @error('institute_name') is-invalid @enderror"/>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-lg-6">--}}
            {{--                            <div class="form-group">--}}
            {{--                                <label>Instagram</label>--}}
            {{--                                <input type="text" class="form-control"/>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-lg-6">--}}
            {{--                            <div class="form-group">--}}
            {{--                                <label>Linedin</label>--}}
            {{--                                <input type="text" class="form-control"/>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-lg-6">--}}
            {{--                            <div class="form-group">--}}
            {{--                                <label>Dribbble</label>--}}
            {{--                                <input type="text" class="form-control"/>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            {{--            <div class="text-left">--}}
            {{--                <button type="submit" class="btn create-ac-btn">Save</button>--}}
            {{--            </div>--}}
        </div>
    </div>
@endsection
