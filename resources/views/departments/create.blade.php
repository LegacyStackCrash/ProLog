@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3>New Department</h3>

            <br/>

            @include('layouts.errors')

            <form method="POST" action="/departments/create">

                {{ csrf_field() }}

                <div class="input-field">
                    <input type="text" id="department_name" name="department_name" maxlength="50">
                    <label for="department_name">Department Name</label>
                </div>

                <div>
                    <button class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection