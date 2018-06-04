<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Projects;
use App\Departments;
use App\Customers;
use App\User;


class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::orderBy('project_date', 'desc')->get();
        $projects_incomplete = Projects::where('project_status', 'I')->orderBy('project_date', 'desc')->get();
        $projects_complete = Projects::where('project_status', 'C')->orderBy('project_date', 'desc')->get();
        $projects_archived = Projects::where('project_status', 'A')->orderBy('project_date', 'desc')->get();

        return view('projects.index', compact('projects', 'projects_incomplete', 'projects_archived', 'projects_complete'));
    }

    public function show(Projects $project)
    {
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        $departments = Departments::orderBy('department_name')->get();
        $customers = Customers::orderBy('customer_name')->get();
        $users = User::orderBy('name')->get();

        return view('projects.create', compact('departments', 'customers', 'users'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'project_name' => 'required',
            'project_status' => 'required',
            'project_date' => 'required',
            'customer_id' => 'required',
            'department' => 'required',
            'user' => 'required',
        ]);

        $project = Projects::create([
            'project_name' => request('project_name'),
            'project_status' => request('project_status'),
            'project_date' => request('project_date'),
            'project_completed_date' => request('project_completed_date'),
            'customer_id' => request('customer_id'),
            'project_details' => request('project_details'),
        ]);

        //Pivot table relationship for selected departments to this project.
        foreach($request->department as $department_id=>$status){
            $project->departments()->attach($department_id);
        }

        //Pivot table relationship for selected users to this project.
        foreach($request->user as $user_id=>$status){
            $project->users()->attach($user_id);
        }

        return redirect('projects');
    }



    public function destroy(Projects $project)
    {
        $project->delete();

        return redirect('projects');
    }
}
