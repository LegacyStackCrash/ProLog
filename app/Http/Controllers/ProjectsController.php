<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Projects;
use App\Departments;
use App\Customers;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function index()
    {
        $message = Session::get('message');

        $projects = Projects::orderBy('project_date', 'desc')->get();
        $projects_incomplete = Projects::where('project_status', 'I')->orderBy('project_date', 'desc')->get();
        $projects_complete = Projects::where('project_status', 'C')->orderBy('project_date', 'desc')->get();
        $projects_archived = Projects::where('project_status', 'A')->orderBy('project_date', 'desc')->get();

        return view('projects.index', compact(['projects', 'projects_incomplete', 'projects_archived', 'projects_complete', 'message']));
    }

    public function show(Projects $project)
    {
        $message = Session::get('message');

        $attachments = DB::select('select * from files_projects where projects_id = :id order by created_at desc', ['id' => $project->id]);

        return view('projects.show', compact(['project', 'message', 'attachments']));
    }

    public function create()
    {
        $departments = Departments::orderBy('department_name')->get();
        $customers = Customers::orderBy('customer_name')->get();
        $users = User::orderBy('name')->get();

        return view('projects.create', compact(['departments', 'customers', 'users']));
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

    public function edit(Projects $project)
    {
        $departments = Departments::orderBy('department_name')->get();
        $customers = Customers::orderBy('customer_name')->get();
        $users = User::orderBy('name')->get();

        $checked_departments = [];
        foreach ($project->departments as $dept) {
            $checked_departments[] = $dept->pivot->departments_id;
        }

        $checked_users = [];
        foreach ($project->users as $user) {
            $checked_users[] = $user->pivot->user_id;
        }

        return view('projects.edit', compact(['project', 'departments', 'customers', 'users', 'checked_departments', 'checked_users']));
    }

    public function save(Request $request, Projects $project)
    {
        $this->validate(request(), [
            'project_name' => 'required',
            'project_status' => 'required',
            'project_date' => 'required',
            'customer_id' => 'required',
            'department' => 'required',
            'user' => 'required',
        ]);

        $project->project_name = $request->project_name;
        $project->project_status = $request->project_status;
        $project->project_date = $request->project_date;
        $project->project_date_completed = $request->project_date_completed;
        $project->customer_id = $request->customer_id;
        $project->project_details = $request->project_details;
        $project->save();

        //Pivot table relationship for selected departments to this issue.
        foreach($request->department as $department_id=>$status){
            $project->departments()->attach($department_id);
        }

        //Pivot table relationship for selected users to this issue.
        foreach($request->user as $user_id=>$status){
            $project->users()->attach($user_id);
        }

        return redirect('projects')->with('message', 'Project #'.$project->id.' updated successfully!');
    }

    public function upload(Request $request, Projects $project)
    {
        $this->validate(request(), [
            'attachments' => 'required',
        ]);

        foreach ($request->attachments as $attachment) {
            //Save file(s) to server.
            $attachment->storeAs('projects/'.$project->id, $attachment->getClientOriginalName());

            //Insert into database.
            DB::table('files_projects')->insert([
                'projects_id' => $project->id,
                'file' => $attachment->getClientOriginalName(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return back()->with('message', 'File(s) uploaded successfully!');
    }

    public function destroy(Projects $project)
    {
        $project->delete();

        return redirect('projects');
    }
}
