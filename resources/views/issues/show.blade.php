@extends('layouts.app')

@section('content')

    @include('layouts.messages')

    <div class="row">
        <div class="col m12 s12">
            <h3>{{ $issue->issue_name }}</h3>

            <form method="POST" action="/issues/delete/{{ $issue->id }}">
                @csrf

                <a href="/issues/edit/{{ $issue->id }}" class="btn btn-link light-blue darken-2">Edit Issue</a>

                <button class="btn btn-link red accent-2" data-confirm="Are you sure you want to delete this project?">Delete Issue</button>
            </form>
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

    <div class="row info">
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

    <hr/>

    <div class="row">
        @if(!empty($attachments))
            <h4>File Attachments</h4>

            @foreach($attachments as $attachment)

                <div class="chip">
                    <a target="_blank" href="/storage/issues/{{ $attachment->issues_id }}/{{ $attachment->file }}">{{ substr($attachment->file,0,40) }}</a>
                    <i class="close material-icons">close</i>
                </div>

            @endforeach

            <hr/>
        @endif

        <h4>Upload Files</h4>

        @include('layouts.errors')

        <form method="POST" action="/issues/upload/{{ $issue->id }}" enctype="multipart/form-data">

            @csrf

            <div class="file-field input-field col m12 s12">
                <div class="btn light-blue darken-2">
                    <span>File</span>
                    <input type="file" name="attachments[]" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
            </div>

            <div class="input-field col m12 s12">
                <button class="btn btn-primary light-blue darken-2">Save</button>
            </div>
        </form>
    </div>

@endsection