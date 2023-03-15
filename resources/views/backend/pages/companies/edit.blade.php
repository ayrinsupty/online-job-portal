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
                    <h4 class="card-title">Edit {{ $pageHeader['singular_name'] }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.companies.update', $companies->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Name</label>
                                            <input type="text" name="name"
                                                class="form-control  @error('name') is-invalid @enderror" id="name"
                                                placeholder="Enter name" value="{{ old('name', $companies->name) }}">
                                            @error('name')
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="basicInput"
                                                placeholder="Enter email" value="{{ old('email', $companies->email) }}">
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
                                                placeholder="Enter phone no" value="{{ old('phone', $companies->phone) }}">
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
                                                placeholder="Enter address" value="{{ old('address', $companies->address) }}">
                                            @error('address')
                                                <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="basicInput">Image</label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <img style="height:150px; width:150px; border-radious:50%;"
                                                        src="{{ asset('images/' . $companies->image) }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-outline-primary">Update
                                    {{ $pageHeader['singular_name'] }}</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
