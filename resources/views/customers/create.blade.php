@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h3>New Customer</h3>

            <br/>

            @include('layouts.errors')

            <form method="POST" action="/customers/create">
                @csrf

                <div class="input-field">
                    <input type="text" id="customer_name" name="customer_name" maxlength="50">
                    <label for="customer_name">Customer Name</label>
                </div>

                <div class="input-field">
                    <input type="text" id="customer_city" name="customer_city" maxlength="30">
                    <label for="customer_city">Customer City</label>
                </div>

                <div class="input-field">
                    <input type="text" id="customer_state" name="customer_state" maxlength="2">
                    <label for="customer_state">Customer State</label>
                </div>

                <div>
                    <button class="btn btn-primary light-blue darken-2">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection