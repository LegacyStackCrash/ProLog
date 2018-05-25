@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3>Customers</h3>

            <a href="/customers/create" class="btn btn-link">New Customer</a>

            <table class="striped">
                <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer City</th>
                    <th>Customer State</th>
                </tr>
                </thead>
                <tbody>

                @if($customers->isEmpty())

                    <tr>
                        <td colspan="3">Sorry, there are currently no customers.</td>
                    </tr>

                @else

                    @foreach($customers as $customer)

                        <tr>
                            <td><a href="customers/{{ $customer->id }}">{{ $customer->customer_name }}</a></td>
                            <td><a href="customers/{{ $customer->id }}">{{ $customer->customer_city }}</a></td>
                            <td><a href="customers/{{ $customer->id }}">{{ $customer->customer_state }}</a></td>
                        </tr>

                    @endforeach

                @endif


                </tbody>
            </table>
        </div>
    </div>

@endsection