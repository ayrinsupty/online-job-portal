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
                            <form action="{{ $pageHeader['store_route'] }}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
                                            <label for="basicInput">Phone no</label>
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
                                            <label for="basicInput">Occupation</label>
                                            <input type="text" name="occupation"
                                                class="form-control @error('occupation') is-invalid @enderror"
                                                id="occupation" placeholder="Enter occupation">
                                            @error('occupation')
                                                <strong class="text-danger">{{ $errors->first('occupation') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Designation</label>
                                            <input type="text" name="designation"
                                                class="form-control @error('designation') is-invalid @enderror"
                                                id="designation" placeholder="Enter designation">
                                            @error('designation')
                                                <strong class="text-danger">{{ $errors->first('designation') }}</strong>
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
