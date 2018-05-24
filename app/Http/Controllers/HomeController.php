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
        $issues = Issues::latest()->limit(15)->get();
        $projects = Projects::latest()->limit(15)->get();

        return view('home');
    }
}
