
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
                                <th>Institute Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($seekerEducations as $seekerEducation)
                                <tr id="table-data{{ $seekerEducation->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $seekerEducation->institute_name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($seekerEducation->start_date)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($seekerEducation->end_date)) }}</td>
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('seekerEducation.edit'))
                                            <a class="badge bg-info"
                                                href="{{ route('admin.seekerEducations.edit', $seekerEducation->id) }}"><i
                                                    class="fas fa-edit"></i></a>
                                        @endif
                                        @if (Auth::guard('admin')->user()->can('seekerEducation.delete'))
                                            <a class="badge bg-danger" href="javascript:void(0)"
                                                onclick="dataDelete({{ $seekerEducation->id }},'{{ $pageHeader['base_url'] }}')"><i
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
                        {!! $seekerEducations->links() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
