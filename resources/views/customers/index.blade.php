@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h4>Customers</h4>

            <a href="/customers/create" class="btn btn-link light-blue darken-2">New Customer</a>

            <table class="striped datatable">
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