@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h3>{{ $department->department_name }}</h3>

            <br/>

            <h4>Users</h4>
            <table class="striped">
                <thead>
                <tr>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
        </div>

        <div class="col m6">
            <h4>Projects</h4>
            <table class="striped">
                <thead>
                <tr>
                    <th>Project</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Department(s)</th>
                    <th>User(s)</th>
                </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
        </div>

        <div class="col m6">
            <h4>Issues</h4>
            <table class="striped">
                <thead>
                <tr>
                    <th>Issue</th>
                    <th>Date/Time</th>
                    <th>Customer</th>
                    <th>Department(s)</th>
                    <th>User(s)</th>
                </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
        </div>
    </div>

@endsection