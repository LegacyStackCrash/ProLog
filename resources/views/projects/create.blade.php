@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h3>New Project</h3>

            <br/>

            @include('layouts.errors')

            <form method="POST" action="/projects/create">
                @csrf

                <div class="input-field col m12">
                    <input type="text" id="project_name" name="project_name" maxlength="50">
                    <label for="project_name">Project Name</label>
                </div>

                <div class="input-field col m12">
                    <select name="customer_id">
                        <option value="" disabled selected>Choose a Customer...</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>Customer</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="datepicker" name="project_date" id="project_date">
                    <label for="project_date">Project Date</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="datepicker" name="project_completed_date" id="project_completed_date">
                    <label for="project_completed_date">Completed Date</label>
                </div>

                <div class="input-field col m12">
                    <select name="project_status">
                        <option value="" disabled selected>Choose a Status...</option>
                        <option value="I">Incomplete</option>
                        <option value="C">Complete</option>
                        <option value="A">Archived</option>
                    </select>
                    <label>Project Status</label>
                </div>

                <div class="input-field col m12">
                    <textarea class="tinymce" name="project_details" id="project_details"></textarea>
                </div>

                <div class="input-field col m12">
                    <button class="btn btn-primary light-blue darken-2">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection