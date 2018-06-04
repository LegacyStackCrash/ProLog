@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12 s12">

            @include('layouts.messages')

            <h4>Dashboard</h4>

            <a href="/issues/create" class="btn btn-link light-blue darken-2">New Issue</a>
            <a href="/projects/create" class="btn btn-link light-blue darken-2">New Project</a>

            <br/>
            <br/>


            <ul class="tabs">
                <li class="tab col m6 s6"><a href="#incomplete_issues">Incomplete Issues</a></li>
                <li class="tab col m6 s6"><a href="#incomplete_projects">Incomplete Projects</a></li>
            </ul>

            <div id="incomplete_issues">
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

                    @if($issues_incomplete->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no issues.</td>
                        </tr>

                    @else

                        @foreach($issues_incomplete as $issue)

                            <tr>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_name }}</a></td>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_date_time }}</td>
                                <td>
                                    @if($issue->customer)
                                        <a href="/issues/{{ $issue->id }}">
                                            {{ $issue->customer->customer_name }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/issues/{{ $issue->id }}">
                                        @foreach($issue->departments as $department)
                                            {{ $loop->first ? '' : ', ' }}
                                            {{ $department->department_name }}
                                        @endforeach
                                    </a>
                                </td>
                                <td>
                                    <a href="/issues/{{ $issue->id }}">
                                        @foreach($issue->users as $user)
                                            {{ $loop->first ? '' : ', ' }}
                                            {{ $user->name }}
                                        @endforeach
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                    @endif

                    </tbody>
                </table>
            </div>


            <div id="incomplete_projects">
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

                    @if($projects_incomplete->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no projects.</td>
                        </tr>

                    @else

                        @foreach($projects_incomplete as $project)

                            <tr>
                                <td><a href="/projects/{{ $project->id }}">{{ $project->project_name }}</a></td>
                                <td><a href="/projects/{{ $project->id }}">{{ $project->project_date->toDateString() }}</a></td>
                                <td>
                                    @if($project->customer)
                                        <a href="/projects/{{ $project->id }}">
                                            {{ $project->customer->customer_name }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/projects/{{ $project->id }}">
                                        @foreach($project->departments as $department)
                                            {{ $loop->first ? '' : ', ' }}
                                            {{ $department->department_name }}
                                        @endforeach
                                    </a>
                                </td>
                                <td>
                                    <a href="/projects/{{ $project->id }}">
                                        @foreach($project->users as $user)
                                            {{ $loop->first ? '' : ', ' }}
                                            {{ $user->name }}
                                        @endforeach
                                    </a>
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
