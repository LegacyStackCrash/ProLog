@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h4>New Department</h4>

            @include('layouts.errors')

            <form method="POST" action="/departments/create">

                {{ csrf_field() }}

                <div class="input-field col m12 s12">
                    <input type="text" id="department_name" name="department_name" maxlength="50">
                    <label for="department_name">Department Name</label>
                </div>

                <div class="col m12 s12">
                    <button class="btn light-blue darken-2">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection