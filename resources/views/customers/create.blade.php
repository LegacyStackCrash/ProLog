@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h4>New Customer</h4>

            @include('layouts.errors')

            <form method="POST" action="/customers/create">
                @csrf

                <div class="input-field col m12 s12">
                    <input type="text" id="customer_name" name="customer_name" maxlength="50" value="{{ old('customer_name') }}">
                    <label for="customer_name">Customer Name</label>
                </div>

                <div class="input-field col m12 s12">
                    <input type="text" id="customer_city" name="customer_city" maxlength="30" value="{{ old('customer_city') }}">
                    <label for="customer_city">Customer City</label>
                </div>

                <div class="input-field col m12 s12">
                    <input type="text" id="customer_state" name="customer_state" maxlength="2" value="{{ old('customer_state') }}">
                    <label for="customer_state">Customer State</label>
                </div>

                <div class="input-field col m12 s12">
                    <input type="text" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}">
                    <label for="customer_phone">Customer Phone</label>
                </div>

                <div class="col m12 s12">
                    <button class="btn btn-primary light-blue darken-2">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection