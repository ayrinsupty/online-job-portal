@extends('backend.layouts.master')
@section('title')
    {{ $pageHeader['title'] }}
@endsection
@section('admin-content')
    @include('backend.layouts.partials.page-header', $pageHeader)
    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">{{ $pageHeader['title'] }} List </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr id="table-data{{ $user->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <img style="height: 80px; width:80px; border-radious:50%;"
                                            src="{{ asset('images/' . $user->image) }}" alt="">
                                    </td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->address }}</td>
                                    @if (Auth::guard('admin')->user()->can('user.edit'))
                                        <td>
                                            <div class="form-check form-switch">
                                                <input
                                                    onclick="activeData({{ $user->id }},'{{ $pageHeader['base_url'] }}')"
                                                    {{ $user->status == 'active' ? 'checked' : '' }}
                                                    class="form-check-input" name="" type="checkbox"
                                                    id="flexSwitchCheckDefault">
                                            </div>
                                        </td>
                                    @endif
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('user.edit'))
                                            <a class="badge bg-info" href="{{ route('admin.users.edit', $user->id) }}"><i
                                                    class="fas fa-edit"></i></a>
                                        @endif
                                        @if (Auth::guard('admin')->user()->can('user.delete'))
                                            <a class="badge bg-danger" href="javascript:void(0)"
                                                onclick="dataDelete({{ $user->id }},'{{ $pageHeader['base_url'] }}')"><i
                                                    class="fas fa-trash"></i></a>
                                        @endif
                                    </td>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="6">No Data Found! <a class="btn btn-outline-info"
                                            href="{{ $pageHeader['create_route'] }}">Create
                                            {{ $pageHeader['singular_name'] }}</a>
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
