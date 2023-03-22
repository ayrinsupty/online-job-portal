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
                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="create-photo-item">
                                <div class="create-photo-left">
                                    <div class="d-table">
                                        <div class="d-table-cell">
                                            <div class="form-group">
                                                <i class="icofont-photobucket"></i>
                                                <input type="file" name="image" class="form-control-file" />
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
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="Your first Name Here" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control"
                                            placeholder="Your Last Name Here" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Your Username Here" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-information">
                        <h3>Basic Information</h3>
                        <div class="create-information-btn">
                            <a href="#">Upload Cover Photo</a>
                            <a href="#">Upload Your CV</a>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input type="email" name="email" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Phone</label>
                                    <input type="phone" name="phone" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicInput">User Type</label>
                                    <select name="type" required class="form-control" id="type">
                                        <option value="">-- Choose Type --</option>
                                        <option value="Agent">Agent</option>
                                        <option value="Seeker">Seeker</option>
                                        <option value="Employer">Employer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn create-ac-btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
