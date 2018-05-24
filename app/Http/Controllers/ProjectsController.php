<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Projects;

class ProjectsController extends Controller
{
    public function index()
    {
        $data = Projects::latest()->get();

        dd($data);
    }
}
