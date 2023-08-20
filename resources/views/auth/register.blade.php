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

                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="row align-items-center">
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="create-photo-item">--}}
{{--                                <div class="create-photo-left">--}}
{{--                                    <div class="d-table">--}}
{{--                                        <div class="d-table-cell">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <i class="icofont-photobucket"></i>--}}
{{--                                                <input name="image" type="file" class="form-control-file" />--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-lg-8">
                            <div class="create-photo-item">
                                <div class="create-photo-right">
                                    <div class="form-group">
                                        <label for="">First name <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control  @error('first_name') is-invalid @enderror"
                                                name="first_name"
                                               placeholder="Your First Name Here"/>
                                        @error('first_name')
                                        <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last name <span class="text-danger">*</span></label>
                                        <input type="text"  name="last_name"
                                               class="form-control  @error('last_name') is-invalid @enderror"
                                               placeholder="Your Last Name Here"/>
                                        @error('last_name')
                                        <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pnone no <span class="text-danger">*</span></label>
                                        <input type="tel"  name="phone"
                                               class="form-control  @error('phone') is-invalid @enderror"
                                               placeholder="Your Phone No Here"/>
                                        @error('phone')
                                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address"
                                               class="form-control  @error('address') is-invalid @enderror"
                                               placeholder="Your Address Here"/>
                                        @error('address')
                                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email"
                                               class="form-control  @error('email') is-invalid @enderror"
                                               placeholder="Your Email Here"/>
                                        @error('email')
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password"
                                               class="form-control  @error('password') is-invalid @enderror"
                                               placeholder="Your Password Here"/>
                                        @error('password')
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password<span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation"
                                               class="form-control  @error('password_confirmation') is-invalid @enderror"
                                               placeholder="Your Confirm Password Here"/>
                                        @error('password_confirmation')
                                        <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Account Type<span class="text-danger">*</span></label>
                                        <select name="type" class="form-control  @error('password') is-invalid @enderror" id="" required>
                                            <option value="Seeker">Seeker</option>
                                            <option value="Agent">Agent</option>
                                        </select>
                                        @error('type')
                                        <strong class="text-danger">{{ $errors->first('type') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn create-photo-btn">
                                            Done
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <style>
                label{
                    color: black;
                }
            </style>
        </div>
    </div>
@endsection
