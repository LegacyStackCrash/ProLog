@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col s10 offset-s1">
            <h3>Departments</h3>

            <a href="/departments/create" class="btn btn-link">New Department</a>

            <table class="striped">
                <thead>
                <tr>
                    <th>Department Name</th>
                </tr>
                </thead>
                <tbody>

                @if($departments->isEmpty())

                    <tr>
                        <td>Sorry, there are currently no departments.</td>
                    </tr>

                @else

                    @foreach($departments as $department)

                        <tr>
                            <td><a href="/departments/{{ $department->id }}">{{ $department->department_name }}</a></td>
                        </tr>

                    @endforeach

                @endif


                </tbody>
            </table>
        </div>
    </div>

@endsection