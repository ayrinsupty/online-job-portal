@extends('layouts.master')
@section('title')
My Application
@endsection

@section('content')
    <div class="banner-area banner-area-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="banner-text">
                        <h1>Search Here For <span>Better</span> Job</h1>
                        <p>Jobs, Employment & Future Career Opportunities</p>
                        <div class="banner-form-area">
                            <form action="{{ route('home') }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="search" class="form-control" placeholder="Job Title">
                                            <label>
                                                <i class="icofont-search-1"></i>
                                            </label>
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-lg-6">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label>--}}
                                    {{--                                                <i class="icofont-location-pin"></i>--}}
                                    {{--                                            </label>--}}
                                    {{--                                            <input type="text" class="form-control" placeholder="City or State">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <button type="submit" class="btn banner-form-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="banner-img">
                        <img src="{{ asset('frontend/assets/img/home-3/banner.png') }}" alt="Banner">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Last Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($datas as $data)
                            <tr id="table-data{{ $data->id }}">
                                <td>{{ $loop->index + 1 }}</td>
{{--                                <td>{{ $data->user->first_name }} {{ $data->user->last_name }}</td>--}}
                                <td><a href="{{ route('job.details',$data->job_id) }}">{{ $data->job->title }} </a></td>
                                <td><a href="{{ route('company',$data->job->user_id) }}">{{ $data->job->user->company_name }}</a></td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    {{ $data->status }}
                                        @if($data->status == \App\Models\Apply::$statusArray[1])

                                            @php
                                                $appointmentinfo = \App\Models\Appointment::where('apply_id',$data->id)->where('user_id',auth()->id())->get();
                                            @endphp
                                    @foreach($appointmentinfo as $row)
                                    <ul style="border: 1px solid black;">
                                        <li>Meeting time:{{ $row->meeting_time }}</li>
                                        <li>Meeting link :{{ $row->link }}</li>
                                        <li>Status :{{ $row->status }}</li>
                                    </ul>
                                    @endforeach
                                    @endif


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="6">No Data Found
                                </td>
                                <td colspan="2"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
{{--                    <div class="d-flex justify-content-end">--}}
{{--                        {!! $datas->links() !!}--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
