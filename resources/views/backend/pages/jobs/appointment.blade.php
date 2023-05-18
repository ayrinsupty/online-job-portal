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
                    <h4 class="card-title">Create New {{ $pageHeader['singular_name'] }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.send.appointment.request.add',request('id')) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ $apply->user_id }}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Meeting Time</label>
                                            <input type="datetime-local" name="meeting_time"
                                                   class="form-control @error('meeting_time') is-invalid @enderror" id="meeting_time"
                                                   placeholder="Enter meeting_time">
                                            @error('meeting_time')
                                            <strong class="text-danger">{{ $errors->first('meeting_time') }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="link">Appointment Link</label>
                                            <textarea name="link"
                                                      class="form-control @error('link') is-invalid @enderror"
                                                      rows="2" cols="2"></textarea>
                                            @error('link')
                                            <strong class="text-danger">{{ $errors->first('link') }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Create New</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
                @php
                    $apply =\App\Models\Apply::where('id',request()->id)->first();
                @endphp
            @if($apply->status ==\App\Models\Apply::$statusArray[2])
                <a href="{{ route('admin.confirm.listed',$apply->job_id) }}" class="btn btn-info">Confirmed</a>

            @else
            <a class="badge bg-success"
               href="{{ route('admin.approval.confirmantion', [request()->id,\App\Models\Apply::$statusArray[2]]) }}">Confirm Sicker</a>
            @endif
        </section>

        <table class="table" id="table1">
            <thead>
            <tr>
                <th>Applicant</th>
                <th>Meeting Time</th>
                <th>link</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
@foreach($appointments as $appointment)

                <tr>
                    <td>{{ $appointment->user->first_name }} {{ $appointment->user->last_name }}</td>
                    <td>{{ $appointment->meeting_time }}</td>
                    <td>{{ $appointment->link }}</td>
                    <td>{{ $appointment->apply->status }}</td>
                    <td>
                        @if($appointment->apply->status == \App\Models\Apply::$statusArray[1])
                            @if($appointment->status == 'Done')
                                Done
                            @else
                            <a class="badge bg-success"
                               href="{{ route('admin.approval.appointment', $appointment->id) }}"><i
                                    class="fas fa-check"></i></a>
                            @endif
                            <a class="badge bg-danger"
                               href="{{ route('admin.approval.delete', [$appointment->id]) }}"><i
                                    class="fas fa-ban"></i></a>
                        @elseif($appointment->apply->status == \App\Models\Apply::$statusArray[2])
                            @if($appointment->status == 'Done')
                                Done
                            @else
                                <a class="badge bg-success"
                                   href="{{ route('admin.approval.appointment', $appointment->id) }}"><i
                                        class="fas fa-check"></i></a>
                            @endif
                        @endif

                    </td>
                </tr>
@endforeach

            </tbody>
        </table>


    </div>
@endsection
