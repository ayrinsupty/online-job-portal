
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
                                <th>Company Name</th>
                                <th>Designation</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($seekerExperiences as $seekerExperience)
                                <tr id="table-data{{ $seekerExperience->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $seekerExperience->company_name }}</td>
                                    <td>{{ $seekerExperience->designation }}</td>
                                    <td>{{ date('d-m-Y', strtotime($seekerExperience->frpm_date)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($seekerExperience->to_date)) }}</td>
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('seekerExperience.edit'))
                                            <a class="badge bg-info"
                                                href="{{ route('admin.seekerExperiences.edit', $seekerExperience->id) }}"><i
                                                    class="fas fa-edit"></i></a>
                                        @endif
                                        @if (Auth::guard('admin')->user()->can('seekerExperience.delete'))
                                            <a class="badge bg-danger" href="javascript:void(0)"
                                                onclick="dataDelete({{ $seekerExperience->id }},'{{ $pageHeader['base_url'] }}')"><i
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
                        {!! $seekerExperiences->links() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
