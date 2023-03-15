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

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Enter name">
                                            @error('name')
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
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

                                    <div class="col-md-6">
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

                                    <div class="col-md-6">
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Logo</label>
                                            <input type="file" name="logo"
                                                class="form-control @error('logo') is-invalid @enderror" id="logo"
                                                value="{{ old('logo') }}">
                                            @error('logo')
                                                <strong class="text-danger">{{ $errors->first('logo') }}</strong>
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
