@extends('layouts.app')

@section('content')

    @include('layouts.messages')

    <div class="row">
        <div class="col m12 s12">
            <h3>{{ $issue->issue_name }}</h3>

            <a href="/issues/edit/{{ $issue->id }}" class="btn btn-link light-blue darken-2">Edit Issue</a>
        </div>
    </div>

    <div class="row">
        <div class="col m12 s12">
            <strong>Issue Date: </strong> {{ $issue->issue_date_time->format('l, F jS Y H:iA') }}
        </div>
    </div>

    @if(trim($issue->issue_details)!='')
        <div class="row">
            <div class="col m12 s12">
                <strong>Issue Details:</strong>
            </div>
        </div>

        <div class="row">
            <div class="col m12 s12">
                {!! $issue->issue_details !!}
            </div>
        </div>
    @endif

    <hr/>

    <div class="row">
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Customer</span>
                    <p>
                        {{ $issue->customer->customer_name }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Department(s)</span>
                    <p>
                        @foreach($issue->departments as $department)
                            {{ $loop->first ? '' : ', ' }}
                            {{ $department->department_name }}
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">User(s)</span>
                    <p>
                        @foreach($issue->users as $user)
                            {{ $loop->first ? '' : ', ' }}
                            {{ $user->name }}
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection