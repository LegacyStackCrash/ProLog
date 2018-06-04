<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Issues;
use App\Projects;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect('home');
    }

    public function show()
    {
        $projects_incomplete = Projects::where('project_status', 'I')->orderBy('project_date', 'desc')->get();
        $issues_incomplete = Issues::where('issue_status', 'I')->orderBy('issue_date_time', 'desc')->get();

        return view('home', compact(['projects_incomplete', 'issues_incomplete']));
    }
}
