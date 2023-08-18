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
                <div class="card-header"></div>
                <div class="card-body">
                    <h3>Bio</h3>
                    <img style="width: 140px;" src="{{ asset('images/' . $seeker->user->image) }}" alt="">
                    <ul>
                        <li><strong>Name :</strong>{{ $seeker->user->first_name }} {{ $seeker->user->last_name }}</li>
                        <li><strong>Email :</strong>{{ $seeker->user->email }}</li>
                        <li><strong>Phone :</strong>{{ $seeker->user->phone }}</li>
                        <li><strong>Address :</strong>{{ $seeker->user->address }}</li>
                        <li><strong>LinkedIn :</strong>{{ $seeker->user->linkedin }}</li>
                    </ul>
                    <h3>Education</h3>
                    <div class="create-information-btn">
                        {{--                        <a href="#">Upload Cover Photo</a>--}}
                        {{--                        <a href="#">Upload Your CV</a>--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Institute Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\SeekerEducation::where('user_id',request()->userid)->get() as $item)
                                <tr>
                                    <td>{{ $item->institute_name }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>



                <div class="card-header">
                    <h3>Experience</h3>
                </div>
                <div class="create-information-btn">
                    {{--                        <a href="#">Add Education</a>--}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Designation</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\SeekerExperience::where('user_id',request()->userid)->get() as $item)
                            <tr>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->designation }}</td>
                                <td>{{ $item->from_date }}</td>
                                <td>{{ $item->to_date }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>



                <div class="card-header">
                    <h3>Skill</h3>
                </div>
                <div class="create-information-btn">
                    {{--                        <a href="#">Add Education</a>--}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\SeekerExpert::where('user_id',request()->userid)->get() as $item)
                            <tr>
                                <td>{{ $item->name }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>



                <div class="card-header">
                    <h3>Reference</h3>
                </div>
                <div class="create-information-btn">
                    {{--                        <a href="#">Add Education</a>--}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Occupaton</th>
                            <th>designation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\SeekerReference::where('user_id',request()->userid)->get() as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->occupation }}</td>
                                <td>{{ $item->designation }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
