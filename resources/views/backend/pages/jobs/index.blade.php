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
                                <th>Title</th>
                                <th>Last Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr id="table-data{{ $data->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->application_last_date }}</td>
                                    <td>
                                            <a class="badge bg-info"
                                                href="{{ route($pageHeader['edit_route'], $data->id) }}"><i
                                                    class="fas fa-edit"></i></a>
                                        <a class="badge bg-info"
                                                href="{{ route('admin.all.apply',$data->id) }}"><i
                                                    class="fas fa-book"></i>({{ $data->applicant_count }})</a>
                                            <a class="badge bg-danger" href="javascript:void(0)"
                                                onclick="dataDelete({{ $data->id }},'job')"><i
                                                    class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="6">No Data Found <a class="btn btn-info"
                                            href="{{ $pageHeader['create_route'] }}">Create
                                            {{ $pageHeader['singular_name'] }}</a>
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $datas->links() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
