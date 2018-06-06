<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Issues;
use App\Departments;
use App\Customers;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class IssuesController extends Controller
{
    public function index()
    {
        $message = Session::get('message');

        $issues = Issues::orderBy('issue_date_time', 'desc')->get();
        $issues_incomplete = Issues::where('issue_status', 'I')->orderBy('issue_date_time', 'desc')->get();
        $issues_complete = Issues::where('issue_status', 'C')->orderBy('issue_date_time', 'desc')->get();
        $issues_archived = Issues::where('issue_status', 'A')->orderBy('issue_date_time', 'desc')->get();

        return view('issues.index', compact(['issues', 'issues_incomplete', 'issues_archived', 'issues_complete', 'message']));
    }

    public function show(Issues $issue)
    {
        $message = Session::get('message');

        $attachments = DB::select('select * from files_issues where issues_id = :id order by created_at desc', ['id' => $issue->id]);

        return view('issues.show', compact(['issue', 'message', 'attachments']));
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
        $issue_date_time_completed = NULL;
        if ($request->issue_date_completed) {
            if ($request->issue_time_completed) {
                $issue_date_time_completed = $request->issue_date_completed.' '.$request->issue_time_completed.':00';
            } else {
                $issue_date_time_completed = $request->issue_date_completed.' 00:00:00';
            }
        }

        //Format durations.
        $issue_duration_days = 0;
        if ($request->issue_duration_days) {
            $issue_duration_days = $request->issue_duration_days;
        }

        $issue_duration_hours = 0;
        if ($request->issue_duration_hours) {
            $issue_duration_hours = $request->issue_duration_hours;
        }

        $issue_duration_minutes = 0;
        if ($request->issue_duration_minutes) {
            $issue_duration_minutes = $request->issue_duration_minutes;
        }

        $issue = Issues::create([
            'issue_name' => request('issue_name'),
            'issue_status' => request('issue_status'),
            'issue_date_time' => $issue_date_time,
            'issue_date_time_completed' => $issue_date_time_completed,
            'issue_duration_days' => $issue_duration_days,
            'issue_duration_hours' => $issue_duration_hours,
            'issue_duration_minutes' => $issue_duration_minutes,
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

    public function edit(Issues $issue)
    {
        $departments = Departments::orderBy('department_name')->get();
        $customers = Customers::orderBy('customer_name')->get();
        $users = User::orderBy('name')->get();

        $checked_departments = [];
        foreach ($issue->departments as $dept) {
            $checked_departments[] = $dept->pivot->departments_id;
        }

        $checked_users = [];
        foreach ($issue->users as $user) {
            $checked_users[] = $user->pivot->user_id;
        }

        return view('issues.edit', compact(['issue', 'departments', 'customers', 'users', 'checked_departments', 'checked_users']));
    }

    public function save(Request $request, Issues $issue)
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
        $issue_date_time_completed = $request->issue_date_completed.' '.$request->issue_time_completed.':00';
        if (trim($issue_date_time_completed)=='') {
            $issue_date_time_completed = NULL;
        }

        $issue->issue_name = $request->issue_name;
        $issue->issue_status = $request->issue_status;
        $issue->issue_date_time = $issue_date_time;
        $issue->issue_date_time_completed = $issue_date_time_completed;
        $issue->issue_duration_days = $request->issue_duration_days;
        $issue->issue_duration_hours = $request->issue_duration_hours;
        $issue->issue_duration_minutes = $request->issue_duration_minutes;
        $issue->customer_id = $request->customer_id;
        $issue->issue_details = $request->issue_details;
        $issue->save();

        //Pivot table relationship for selected departments to this issue.
        foreach($request->department as $department_id=>$status){
            $issue->departments()->attach($department_id);
        }

        //Pivot table relationship for selected users to this issue.
        foreach($request->user as $user_id=>$status){
            $issue->users()->attach($user_id);
        }

        return redirect('issues')->with('message', 'Issue #'.$issue->id.' updated successfully!');
    }

    public function upload(Request $request, Issues $issue)
    {
        $this->validate(request(), [
            'attachments' => 'required',
        ]);

        foreach ($request->attachments as $attachment) {
            //Save file(s) to server.
            $attachment->storeAs('issues/'.$issue->id, $attachment->getClientOriginalName());

            //Insert into database.
            DB::table('files_issues')->insert([
                'issues_id' => $issue->id,
                'file' => $attachment->getClientOriginalName(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return back()->with('message', 'File(s) uploaded successfully!');
    }

    public function destroy(Issues $issue)
    {
        $issue->delete();

        return redirect('issues');
    }
}
