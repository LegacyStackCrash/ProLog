@extends('auth.layout')

@section('content')

    <h4 class="center-align">ProLog - Project Management</h4>

    <hr/>

    @include('layouts.errors')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-field">
            <input type="email" id="email" name="email" maxlength="250" value="{{ old('email') }}" required>
            <label for="email">Email</label>
        </div>

        <div class="input-field">
            <input type="password" id="password" name="password" required>
            <label for="password">Password</label>
        </div>

        <br/>

        <div>
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span>{{ __('Remember Me') }}</span>
            </label>
        </div>

        <br/>

        <div>
            <button type="submit" class="btn light-blue darken-2">
                {{ __('Login') }}
            </button>

            <a class="btn light-blue darken-2" href="{{ route('password.request') }}">
                {{ __('Forgot Password?') }}
            </a>
        </div>

        <hr/>

        <div class="center-align">
            Chase Terry {{ date('Y') }}
        </div>
    </form>

@endsection