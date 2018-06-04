<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Departments;
use Illuminate\Support\Facades\Session;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Departments::orderBy('department_name')->get();

        $message = Session::get('message');

        return view('departments.index', compact(['departments', 'message']));
    }

    public function show(Departments $department)
    {
        return view('departments.show', compact('department'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'department_name' => 'required|unique:departments',
        ]);

        Departments::create([
            'department_name' => request('department_name'),
        ]);

        return redirect('departments');
    }

    public function edit(Departments $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function save(Request $request, Departments $department)
    {
        $this->validate(request(), [
            'department_name' => 'required',
        ]);

        $department->department_name = $request->department_name;
        $department->save();

        return redirect('departments')->with('message', 'Department updated successfully!');
    }

    public function destroy(Departments $department)
    {
        $department->delete();

        return redirect('departments');
    }
}
