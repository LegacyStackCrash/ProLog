@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3>{{ $customer->customer_name }}</h3>

            <h5>{{ $customer->customer_city }}, {{ $customer->customer_state }}</h5>

            <hr/>

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

            <hr/>

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