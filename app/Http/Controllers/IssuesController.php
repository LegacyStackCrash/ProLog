<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Issues;

class IssuesController extends Controller
{
    public function index()
    {
        $data = Issues::latest()->get();

        dd($data);
    }
}
