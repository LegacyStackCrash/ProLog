@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12 s12">
            @include('layouts.messages')

            <h4>Issues</h4>

            <a href="/issues/create" class="btn btn-link light-blue darken-2">New Issue</a>

            <br/>
            <br/>

            <ul class="tabs">
                <li class="tab col m3"><a href="#incomplete">Incomplete</a></li>
                <li class="tab col m3"><a href="#complete">Complete</a></li>
                <li class="tab col m3"><a href="#archived">Archived</a></li>
                <li class="tab col m3"><a href="#all">All Issues</a></li>
            </ul>
            <div id="incomplete">
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

            <div id="complete">
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

                    @if($issues_complete->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no issues.</td>
                        </tr>

                    @else

                        @foreach($issues_complete as $issue)

                            <tr>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_name }}</a></td>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_date_time }}</a></td>
                                <td>
                                    @if($issue->customer)
                                        <a href="/issues/{{ $issue->id }}">
                                            {{ $issue->customer->customer_name }}
                                        </a>
                                    @endif
                                </td>
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

            <div id="archived">
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

                    @if($issues_archived->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no issues.</td>
                        </tr>

                    @else

                        @foreach($issues_archived as $issue)

                            <tr>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_name }}</a></td>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_date_time }}</a></td>
                                <td>
                                    @if($issue->customer)
                                        <a href="/issues/{{ $issue->id }}">
                                            {{ $issue->customer->customer_name }}
                                        </a>
                                    @endif
                                </td>
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

            <div id="all">
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

                    @if($issues->isEmpty())

                        <tr>
                            <td colspan="5">Sorry, there are currently no issues.</td>
                        </tr>

                    @else

                        @foreach($issues as $issue)

                            <tr>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_name }}</a></td>
                                <td><a href="/issues/{{ $issue->id }}">{{ $issue->issue_date_time }}</a></td>
                                <td>
                                    @if($issue->customer)
                                        <a href="/issues/{{ $issue->id }}">
                                            {{ $issue->customer->customer_name }}
                                        </a>
                                    @endif
                                </td>
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