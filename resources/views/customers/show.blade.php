@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12 s12">
            <h3>{{ $customer->customer_name }}</h3>

            <a href="/customers/edit/{{ $customer->id }}" class="btn btn-link light-blue darken-2">Edit Customer</a>
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

                    @if($customer->projects->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no projects for this user.</td>
                        </tr>

                    @else

                        @foreach($customer->projects as $project)

                            <tr>
                                <td><a href="/projects/{{ $project->id }}">{{ $project->project_name }}</a></td>
                                <td><a href="/projects/{{ $project->id }}">{{ $project->project_date->toDateString() }}</a></td>
                                <td><a href="/projects/{{ $project->id }}">{{ $project->customer->customer_name }}</a></td>
                                <td>
                                    @foreach($project->departments as $department)
                                        {{ $loop->first ? '' : ', ' }}
                                        <a href="/projects/{{ $project->id }}">{{ $department->department_name }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($project->users as $user)
                                        {{ $loop->first ? '' : ', ' }}
                                        <a href="/projects/{{ $project->id }}">{{ $user->name }}</a>
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

                    @if($customer->issues->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no issues.</td>
                        </tr>

                    @else

                        @foreach($customer->issues as $issue)

                            <tr>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_name }}</a></td>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_date_time }}</a></td>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->customer->customer_name }}</a></td>
                                <td>
                                    @foreach($issue->departments as $department)
                                        {{ $loop->first ? '' : ', ' }}
                                        <a href="/issues/{{ $issue->id }}">{{ $department->department_name }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($issue->users as $user)
                                        {{ $loop->first ? '' : ', ' }}
                                        <a href="/issues/{{ $issue->id }}">{{ $user->name }}</a>
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