@extends('auth.layout')

@section('content')

    <h4 class="center-align">Reset Password</h4>

    <hr/>

    @include('layouts.errors')

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="input-field">
            <input type="email" id="email" name="email" maxlength="250" value="{{ old('email') }}" required>
            <label for="email">Email</label>
        </div>

        <div>
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn light-blue darken-2">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>

    </form>
@endsection
