@extends('layouts.app')

@section('content')

    @include('layouts.messages')

    <div class="row">
        <div class="col m12 s12">
            <h3>{{ $project->project_name }}</h3>

            <a href="/projects/edit/{{ $project->id }}" class="btn btn-link light-blue darken-2">Edit Project</a>
        </div>
    </div>

    <div class="row">
        <div class="col m12 s12">
            <strong>Project Date: </strong> {{ $project->project_date->format('l, F jS Y') }}
        </div>
    </div>

    @if(trim($project->project_details)!='')
        <div class="row">
            <div class="col m12 s12">
                <strong>Project Details:</strong>
            </div>
        </div>

        <div class="row">
            <div class="col m12 s12">
                {{ $project->project_details }}
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
                        {{ $project->customer->customer_name }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col m4 s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Department(s)</span>
                    <p>
                        @foreach($project->departments as $department)
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
                        @foreach($project->users as $user)
                            {{ $loop->first ? '' : ', ' }}
                            {{ $user->name }}
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection