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
                <div class="card-header">{{ $pageHeader['title'] }} List</div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr id="table-data{{ $role->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $item)
                                            <span class="badge bg-success">{{ $item->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('role.edit'))
                                            <a class="badge bg-info" href="{{ route('admin.roles.edit', $role->id) }}"><i
                                                    class="fas fa-edit"></i></a>
                                        @endif
                                        @if (Auth::guard('admin')->user()->can('role.delete'))
                                            <a class="badge bg-danger" href="javascript:void(0)"
                                                onclick="dataDelete({{ $role->id }},'{{ $pageHeader['base_url'] }}')"><i
                                                    class="fas fa-trash"></i></a>
                                        @endif
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
                        {!! $roles->links() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
