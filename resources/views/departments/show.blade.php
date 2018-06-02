@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12 s12">
            <h3>{{ $department->department_name }}</h3>

            <a href="/departments/edit/{{ $department->id }}" class="btn btn-link light-blue darken-2">Edit Department</a>
        </div>


        <div class="input-field col m12 s12">
            <ul class="tabs">
                <li class="tab col m6 s6"><a href="#projects">Projects</a></li>
                <li class="tab col m6 s6"><a href="#issues">Issues</a></li>
            </ul>

            <div id="projects">
                <table class="striped datatable">
                    <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Department(s)</th>
                        <th>User(s)</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($department->projects->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no projects for this user.</td>
                        </tr>

                    @else

                        @foreach($department->projects as $project)

                            <tr>
                                <td><a href="/projects/{{ $project->id }}">{{ $project->project_name }}</a></td>
                                <td>{{ $project->project_date }}</td>
                                <td>{{ $project->customer->customer_name }}</td>
                                <td>
                                    @foreach($project->departments as $department)
                                        {{ $loop->first ? '' : ', ' }}
                                        {{ $department->department_name }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($project->users as $user)
                                        {{ $loop->first ? '' : ', ' }}
                                        {{ $user->name }}
                                    @endforeach
                                </td>
                            </tr>

                        @endforeach

                    @endif

                    </tbody>
                </table>
            </div>

            <div id="issues">
                <table class="striped datatable">
                    <thead>
                    <tr>
                        <th>Issue Name</th>
                        <th>Date/Time</th>
                        <th>Customer</th>
                        <th>Department(s)</th>
                        <th>User(s)</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($department->issues->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no issues.</td>
                        </tr>

                    @else

                        @foreach($department->issues as $issue)

                            <tr>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_name }}</a></td>
                                <td>{{ $issue->issue_date_time }}</td>
                                <td>{{ $issue->customer->customer_name }}</td>
                                <td>
                                    @foreach($issue->departments as $department)
                                        {{ $loop->first ? '' : ', ' }}
                                        {{ $department->department_name }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($issue->users as $user)
                                        {{ $loop->first ? '' : ', ' }}
                                        {{ $user->name }}
                                    @endforeach
                                </td>
                            </tr>

                        @endforeach

                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection