@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12 s12">
            <h4>Departments</h4>

            <a href="/departments/create" class="btn btn-link light-blue darken-2">New Department</a>

            <table class="striped">
                <thead>
                <tr>
                    <th width="85%">Department Name</th>
                    <th># Employees</th>
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
                            <td>0</td>
                        </tr>

                    @endforeach

                @endif


                </tbody>
            </table>
        </div>
    </div>

@endsection