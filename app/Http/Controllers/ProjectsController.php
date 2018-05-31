<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Projects;

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
        return view('projects.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'project_name' => 'required',
            'project_status' => 'required',
            'project_date' => 'required',
        ]);

        Projects::create([
            'project_name' => request('project_name'),
            'project_status' => request('project_status'),
            'project_date' => request('project_date'),
            'project_completed_date' => request('project_completed_date'),
            'customer_id' => request('customer_id'),
            'project_details' => request('project_details'),

        ]);

        return redirect('projects');
    }

    public function destroy(Projects $project)
    {
        $project->delete();

        return redirect('projects');
    }
}
