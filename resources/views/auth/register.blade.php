@extends('auth.layout')

@section('content')

    <h4 class="center-align">ProLog Registration</h4>

    <hr/>

    @include('layouts.errors')

    <div class="row">
        <div class="col m12">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-field col m12 s12">
                    <input type="text" id="name" name="name" maxlength="50" value="{{ old('name') }}" required autofocus>
                    <label for="name">Name</label>
                </div>

                <div class="input-field col m12 s12">
                    <input type="email" id="email" name="email" maxlength="250" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                </div>

                <div class="input-field col m12 s12">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>

                <div class="input-field col m12 s12">
                    <input type="password" id="password-confirm" name="password_confirmation" required>
                    <label for="password-confirm">Confirm Password</label>
                </div>

                <div class="col m12 s12">
                    <button type="submit" class="btn btn-primary light-blue darken-2">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
