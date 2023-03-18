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
                                            <label for="basicInput">Company Name</label>
                                            <input type="text" name="company_name"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                id="company_name" placeholder="Enter company name">
                                            @error('company_name')
                                                <strong class="text-danger">{{ $errors->first('company_name') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Designation</label>
                                            <input type="text" name="designation"
                                                class="form-control @error('designation') is-invalid @enderror"
                                                id="designation" placeholder="Enter company name">
                                            @error('designation')
                                                <strong class="text-danger">{{ $errors->first('designation') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Start Date</label>
                                            <input type="date" name="from_date"
                                                class="form-control @error('from_date') is-invalid @enderror"
                                                id="from_date" placeholder="Enter start date">
                                            @error('from_date')
                                                <strong class="text-danger">{{ $errors->first('from_date') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">End Date</label>
                                            <input type="date" name="to_date"
                                                class="form-control @error('to_date') is-invalid @enderror" id="to_date"
                                                placeholder="Enter end date">
                                            @error('to_date')
                                                <strong class="text-danger">{{ $errors->first('to_date') }}</strong>
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
