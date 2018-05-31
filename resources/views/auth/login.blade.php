@extends('auth.layout')

@section('content')

    <h4 class="center-align">ProLog - Sign In</h4>

    <hr/>

    @include('layouts.errors')

    <div class="row">
        <div class="col m12">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-field col m12 s12">
                    <input type="email" id="email" name="email" maxlength="250" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                </div>

                <div class="input-field col m12 s12">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>

                <br/>

                <div class="col m12 s12">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>{{ __('Remember Me') }}</span>
                    </label>
                </div>

                <div class="col m12 s12">
                    <br/>
                </div>

                <div class="col m12 s12">
                    <button type="submit" class="btn light-blue darken-2">
                        {{ __('Login') }}
                    </button>

                    <a class="btn light-blue darken-2" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>

                <div class="input-field col m12 s12">
                    <hr/>
                </div>

                <div class="col m12 s12 center-align">
                    Chase Terry {{ date('Y') }}
                </div>
            </form>
        </div>
    </div>

@endsection