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
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="name" placeholder="Enter name">
                                            @error('name')
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
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
