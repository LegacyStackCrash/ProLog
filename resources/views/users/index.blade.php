@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12 s12">
            @include('layouts.messages')

            <h4>Users</h4>

            <a href="/users/create" class="btn btn-link light-blue darken-2">New User</a>

            <table class="striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Department(s)</th>
                </tr>
                </thead>
                <tbody>

                @if($users->isEmpty())

                    <tr>
                        <td>Sorry, there are currently no users.</td>
                    </tr>

                @else

                    @foreach($users as $user)

                        <tr>
                            <td><a href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
                            <td>
                                @foreach($user->departments as $department)
                                    {{ $loop->first ? '' : ', ' }}
                                    {{ $department->department_name }}
                                @endforeach
                            </td>
                        </tr>

                    @endforeach

                @endif


                </tbody>
            </table>
        </div>
    </div>

@endsection