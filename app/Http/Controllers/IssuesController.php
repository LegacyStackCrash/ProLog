<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Issues;
use App\Departments;
use App\Customers;
use App\User;

class IssuesController extends Controller
{
    public function index()
    {
        $issues = Issues::orderBy('issue_date_time', 'desc')->get();
        $issues_incomplete = Issues::where('issue_status', 'I')->orderBy('issue_date_time', 'desc')->get();
        $issues_complete = Issues::where('issue_status', 'C')->orderBy('issue_date_time', 'desc')->get();
        $issues_archived = Issues::where('issue_status', 'A')->orderBy('issue_date_time', 'desc')->get();

        return view('issues.index', compact('issues', 'issues_incomplete', 'issues_archived', 'issues_complete'));
    }

    public function show(Issues $issue)
    {
        return view('issues.show', compact('issue'));
    }

    public function create()
    {
        $departments = Departments::orderBy('department_name')->get();
        $customers = Customers::orderBy('customer_name')->get();
        $users = User::orderBy('name')->get();

        return view('issues.create', compact('departments', 'customers', 'users'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'issue_name' => 'required',
            'issue_status' => 'required',
            'issue_date' => 'required',
            'issue_time' => 'required',
            'customer_id' => 'required',
            'department' => 'required',
            'user' => 'required',
            'issue_duration_days' => 'nullable|numeric',
            'issue_duration_hours' => 'nullable|numeric',
            'issue_duration_minutes' => 'nullable|numeric',
        ]);

        //Format date/times.
        $issue_date_time = $request->issue_date.' '.$request->issue_time.':00';
        $issue_date_time_completed = $request->issue_date_completed.' '.$request->issue_time_completed;
        if (trim($issue_date_time_completed)=='') {
            $issue_date_time_completed = NULL;
        }

        $issue = Issues::create([
            'issue_name' => request('issue_name'),
            'issue_status' => request('issue_status'),
            'issue_date_time' => $issue_date_time,
            'issue_date_time_completed' => $issue_date_time_completed,
            'issue_duration_days' => request('issue_duration_days'),
            'issue_duration_hours' => request('issue_duration_hours'),
            'issue_duration_minutes' => request('issue_duration_minutes'),
            'customer_id' => request('customer_id'),
            'issue_details' => request('issue_details'),
        ]);

        //Pivot table relationship for selected departments to this issue.
        foreach($request->department as $department_id=>$status){
            $issue->departments()->attach($department_id);
        }

        //Pivot table relationship for selected users to this issue.
        foreach($request->user as $user_id=>$status){
            $issue->users()->attach($user_id);
        }

        return redirect('issues');
    }

    public function destroy(Issues $issue)
    {
        $issue->delete();

        return redirect('issues');
    }
}
