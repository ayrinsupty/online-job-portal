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
                <div class="card-header">All Applicants</div>
                <a href="{{ route('admin.short.listed',request()->id) }}" class="btn btn-info">Short listed</a>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Applicant</th>
                                <th>Apply at</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr id="table-data{{ $data->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $data->user->first_name }} {{ $data->user->last_name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        @if($data->status == \App\Models\Apply::$statusArray[0])
                                            <a class="badge bg-info"
                                                href="{{ route('admin.approval.confirmantion', [$data->id,\App\Models\Apply::$statusArray[1]]) }}"><i
                                                    class="fas fa-check"></i></a>
                                        @elseif($data->status == \App\Models\Apply::$statusArray[1])
                                        <a class="badge bg-danger"
                                                href="{{ route('admin.approval.confirmantion', [$data->id,\App\Models\Apply::$statusArray[3]]) }}"><i
                                                    class="fas fa-ban"></i></a>
                                        @elseif($data->status == \App\Models\Apply::$statusArray[3])
                                        <a class="badge bg-success"
                                                href="{{ route('admin.approval.confirmantion', [$data->id,\App\Models\Apply::$statusArray[0]]) }}"><i
                                                    class="fas fa-clock"></i></a>
                                        @endif

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
