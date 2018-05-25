<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Departments;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Departments::orderBy('department_name')->get();

        return view('departments.index', compact('departments'));
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

    public function destroy()
    {


        return redirect('departments');
    }
}
