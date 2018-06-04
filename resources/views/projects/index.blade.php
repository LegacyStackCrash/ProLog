@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12 s12">
            @include('layouts.messages')

            <h4>Projects</h4>

            <a href="/projects/create" class="btn btn-link light-blue darken-2">New Project</a>

            <br/>
            <br/>

            <ul class="tabs">
                <li class="tab col m3"><a href="#incomplete">Incomplete</a></li>
                <li class="tab col m3"><a href="#complete">Complete</a></li>
                <li class="tab col m3"><a href="#archived">Archived</a></li>
                <li class="tab col m3"><a href="#all">All Projects</a></li>
            </ul>
            <div id="incomplete">
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

            <div id="complete">
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

                    @if($projects_complete->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no projects.</td>
                        </tr>

                    @else

                        @foreach($projects_complete as $project)

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

            <div id="archived">
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

                    @if($projects_archived->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no projects.</td>
                        </tr>

                    @else

                        @foreach($projects_archived as $project)

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

            <div id="all">
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

                    @if($projects->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no projects.</td>
                        </tr>

                    @else

                        @foreach($projects as $project)

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
        </div>
    </div>

@endsection