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
                                            <label for="basicInput">Institute Name</label>
                                            <input type="text" name="institute_name"
                                                class="form-control @error('institute_name') is-invalid @enderror"
                                                id="institute_name" placeholder="Enter institute name">
                                            @error('institute_name')
                                                <strong class="text-danger">{{ $errors->first('institute_name') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Start Date</label>
                                            <input type="date" name="start_date"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                id="start_date" placeholder="Enter start date">
                                            @error('start_date')
                                                <strong class="text-danger">{{ $errors->first('start_date') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">End Date</label>
                                            <input type="date" name="end_date"
                                                class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                                                placeholder="Enter end date">
                                            @error('end_date')
                                                <strong class="text-danger">{{ $errors->first('end_date') }}</strong>
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
