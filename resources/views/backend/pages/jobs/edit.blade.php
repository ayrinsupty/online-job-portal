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
                            <form action="{{ route($pageHeader['update_route'], $singleData->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title"
                                                   class="form-control @error('title') is-invalid @enderror" id="title"
                                                   placeholder="Enter Name" value="{{ old('title',$singleData->title) }}">
                                            @error('title')
                                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id"
                                                    class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">-- Choose Category --</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}" @selected(old('category_id',$singleData->category_id) == $item->id)>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <strong class="text-danger">{{ $errors->first('category_id') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="application_last_date">Application Last Date</label>
                                            <input type="text" name="application_last_date"
                                                   class="form-control @error('application_last_date') is-invalid @enderror"
                                                   id="application_last_date"
                                                   placeholder="Enter Name" value="{{ old('application_last_date',$singleData->application_last_date) }}">
                                            @error('application_last_date')
                                            <strong
                                                class="text-danger">{{ $errors->first('application_last_date') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="short_description">Short Description</label>
                                            <textarea name="short_description"
                                                      class="form-control @error('short_description') is-invalid @enderror"
                                                      rows="2" cols="2">{{ $singleData->short_description }}</textarea>
                                            @error('short_description')
                                            <strong class="text-danger">{{ $errors->first('short_description') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description"> Description</label>
                                            <textarea name="description"
                                                      class="form-control @error('description') is-invalid @enderror"
                                                      rows="2" cols="2">{{ $singleData->description }}</textarea>
                                            @error('description')
                                            <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Manage</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection