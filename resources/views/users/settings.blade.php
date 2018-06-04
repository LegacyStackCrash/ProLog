@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12 s12">
            @include('layouts.messages')

            <h3>Edit Settings</h3>
        </div>

        <div class="input-field col m12 s12">
            <ul class="tabs">
                <li class="tab col m6 s6"><a href="#change_settings">Change Settings</a></li>
                <li class="tab col m6 s6"><a href="#change_password">Change Password</a></li>
            </ul>

            <div id="change_settings">
                <form method="POST" action="/user/change_settings">
                    @csrf

                    <div class="input-field col m12 s12">
                        <input type="text" id="name" name="name" value="{{ $user->name }}">
                        <label for="name">Name</label>
                    </div>

                    <div class="input-field col m12 s12">
                        <input type="email" id="email" name="email" value="{{ $user->email }}">
                        <label for="email">Email Address</label>
                    </div>

                    <div class="col m12 s12">
                        <button class="btn light-blue darken-2">Save</button>
                    </div>
                </form>
            </div>

            <div id="change_password">
                <form method="POST" action="/user/change_password">
                    @csrf

                    <div class="input-field col m12 s12">
                        <input type="password" id="password" name="password">
                        <label for="password">Password</label>
                    </div>

                    <div class="input-field col m12 s12">
                        <input type="password" id="password_confirmation" name="password_confirmation">
                        <label for="password_confirmation">Confirm Password</label>
                    </div>

                    <div class="col m12 s12">
                        <button class="btn light-blue darken-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection