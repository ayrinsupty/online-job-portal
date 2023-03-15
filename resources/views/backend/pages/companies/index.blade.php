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
                                <th>Address</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                                <tr id="table-data{{ $company->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->phone }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>
                                        <img style="height: 80px; width:80px; border-radious:50%;"
                                            src="{{ asset('images/' . $company->logo) }}" alt="">
                                    </td>
                                    @if (Auth::guard('admin')->user()->can('company.edit'))
                                        <td>
                                            <div class="form-check form-switch">
                                                <input
                                                    onclick="activeData({{ $company->id }},'{{ $pageHeader['base_url'] }}')"
                                                    {{ $company->status == 'active' ? 'checked' : '' }}
                                                    class="form-check-input" name="" type="checkbox"
                                                    id="flexSwitchCheckDefault">
                                            </div>
                                        </td>
                                    @endif
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('company.edit'))
                                            <a class="badge bg-info" href="{{ route('admin.companies.edit', $company->id) }}"><i
                                                    class="fas fa-edit"></i></a>
                                        @endif
                                        @if (Auth::guard('admin')->user()->can('admin.delete'))
                                            <a class="badge bg-danger" href="javascript:void(0)"
                                                onclick="dataDelete({{ $company->id }},'{{ $pageHeader['base_url'] }}')"><i
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
                        {!! $companies->links() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
