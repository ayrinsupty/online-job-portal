@extends('backend.layouts.master')
@section('title')
    {{ $pageHeader['title'] }}
@endsection
@section('admin-content')
    @include('backend.layouts.partials.page-header', $pageHeader)
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create New {{ $pageHeader['singular_name'] }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ $pageHeader['store_route'] }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">First Name</label>
                                            <input type="text" name="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" placeholder="Enter first name">
                                            @error('first_name')
                                                <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Last Name</label>
                                            <input type="text" name="last_name"
                                                class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                                placeholder="Enter last name">
                                            @error('last_name')
                                                <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Username</label>
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror" id="username"
                                                placeholder="Enter username">
                                            @error('username')
                                                <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="Enter email">
                                            @error('email')
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Phone</label>
                                            <input type="phone" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                placeholder="Enter phone no">
                                            @error('phone')
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Address</label>
                                            <input type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror" id="address"
                                                placeholder="Enter address">
                                            @error('address')
                                                <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                placeholder="Enter password">
                                            @error('password')
                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">User Type</label>
                                            <select name="type" required class="form-control" id="type">
                                                <option value="">-- Choose Type --</option>
                                                <option value="Super Admin">Admin</option>
                                                <option value="Agent">Agent</option>
                                              </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="basicInput">Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" id="image"
                                                value="{{ old('image') }}">
                                            @error('image')
                                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-success">Create
                                    {{ $pageHeader['singular_name'] }}</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
