@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h4>Edit Issue</h4>

            @include('layouts.errors')

            <form method="POST" action="/issues/edit/{{ $issue->id }}">
                @csrf

                <div class="input-field col m12 s12">
                    <input type="text" id="issue_name" name="issue_name" maxlength="50" value="{{ $issue->issue_name }}">
                    <label for="issue_name">Issue Name</label>
                </div>

                <div class="input-field col m12 s12">
                    <select name="customer_id">
                        <option value="" disabled selected>Choose a Customer...</option>
                        @foreach($customers as $customer)

                            <div class="col m3 s12">
                                <label>
                                    <option value="{{ $customer->id }}" {{ $issue->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->customer_name }}</option>
                                </label>
                            </div>

                        @endforeach
                    </select>
                    <label>Customer</label>
                </div>

                <div class="col m12 s12">
                    <label>Issue Details:</label>
                </div>

                <div class="input-field col m12 s12">
                    <textarea class="tinymce" name="issue_details" id="issue_details">{{ $issue->issue_details }}</textarea>
                </div>

                <div class="input-field col m12 s12">
                    <select name="issue_status">
                        <option value="" disabled selected>Choose a Status...</option>
                        <option value="I" {{ $issue->issue_status == 'I' ? 'selected' : '' }}>Incomplete</option>
                        <option value="C" {{ $issue->issue_status == 'C' ? 'selected' : '' }}>Complete</option>
                        <option value="A" {{ $issue->issue_status == 'A' ? 'selected' : '' }}>Archived</option>
                    </select>
                    <label>Issue Status</label>
                </div>

                <div class="input-field col m4 s12">
                    <input type="text" class="datepicker" name="issue_date" id="issue_date" value="{{ $issue->issue_date_time->toDateString() }}">
                    <label for="issue_date">Issue Date</label>
                </div>

                <div class="input-field col m2 s12">
                    <input type="text" class="timepicker" name="issue_time" id="issue_time" value="{{ $issue->issue_date_time->format('H:i') }}">
                    <label for="issue_time">Time</label>
                </div>

                <div class="input-field col m4 s12">
                    <input type="text" class="datepicker" name="issue_date_completed" id="issue_date_completed" value="{{ ($issue->issue_date_time_completed) ? $issue->issue_date_time_completed->toDateString() : '' }}">
                    <label for="issue_completed_date">Completed Date</label>
                </div>

                <div class="input-field col m2 s12">
                    <input type="text" class="timepicker" name="issue_time_completed" id="issue_time_completed" value="{{ ($issue->issue_date_time_completed) ? $issue->issue_date_time_completed->format('H:i') : '' }}">
                    <label for="issue_time_completed">Time</label>
                </div>

                <div class="col m12 s12">
                    <label>Issue Duration</label>
                </div>

                <div class="input-field col m4 s4">
                    <input type="text" name="issue_duration_days" id="issue_duration_days" value="{{ $issue->issue_duration_days }}">
                    <label for="issue_duration_days">Days</label>
                </div>

                <div class="input-field col m4 s4">
                    <input type="text" name="issue_duration_hours" id="issue_duration_hours" value="{{ $issue->issue_duration_hours }}">
                    <label for="issue_duration_hours">Hours</label>
                </div>

                <div class="input-field col m4 s4">
                    <input type="text" name="issue_duration_minutes" id="issue_duration_minutes" value="{{ $issue->issue_duration_minutes }}">
                    <label for="issue_duration_minutes">Minutes</label>
                </div>

                <div class="col m12 s12">
                    <label>Assigned Department(s):</label>
                </div>

                <div class="input-field col m12 s12">
                    @if($departments->isEmpty())
                        Sorry, there are no departments.
                    @else
                        @foreach($departments as $department)

                            <div class="col m3 s12">

                                <label>
                                    <input type="checkbox" name="department[{{ $department->id }}]" id="department_{{ $department->id }}" {{ in_array($department->id, $checked_departments) ? 'checked' : '' }}>
                                    <span>{{ $department->department_name }}</span>
                                </label>
                            </div>

                        @endforeach
                    @endif

                </div>

                <div class="col m12 s12">
                    <label>Assigned User(s):</label>
                </div>

                <div class="input-field col m12 s12">
                    @if($users->isEmpty())
                        Sorry, there are no users.
                    @else
                        @foreach($users as $user)

                            <div class="col m3 s12">
                                <label>
                                    <input type="checkbox" name="user[{{ $user->id }}]" id="user_{{ $user->id }}" {{ in_array($user->id, $checked_users) ? 'checked' : '' }}>
                                    <span>{{ $user->name }}</span>
                                </label>
                            </div>

                        @endforeach
                    @endif

                </div>

                <div class="input-field col m12">
                    <button class="btn btn-primary light-blue darken-2">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection