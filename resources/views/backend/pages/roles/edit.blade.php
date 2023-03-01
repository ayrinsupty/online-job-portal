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
                            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="basicInput">Role</label>
                                    <input value="{{ $role->name }}" type="text" name="name" class="form-control"
                                        id="basicInput" placeholder="Enter role">
                                </div>


                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        @php  $i = 1;  @endphp
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <label class="form-check-label"
                                                    for="flexSwitchCheckDefault">{{ $group->name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            @php
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                @if ($permission->group_name == $group->name)
                                                    <div class="form-check form-switch">
                                                        <input
                                                            {{ $role->hasPermissionTo($permission->name) == 1 ? 'checked' : '' }}
                                                            value="{{ $permission->id }}" class="form-check-input"
                                                            name="permissions[]" type="checkbox"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckDefault">{{ $permission->name }}</label>
                                                    </div>
                                                @endif
                                                @php
                                                    $j++;
                                                @endphp
                                            @endforeach
                                            <hr>
                                        </div>

                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                                <button type="submit" class="btn btn-outline-success">Update {{ $pageHeader['singular_name'] }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
