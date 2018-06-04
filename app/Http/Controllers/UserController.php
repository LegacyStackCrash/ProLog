<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Departments;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();

        $message = Session::get('message');

        return view('users.index', compact(['users', 'message']));
    }

    public function show(User $user)
    {
        $message = Session::get('message');

        return view('users.show', compact(['user', 'message']));
    }

    public function create()
    {
        $departments = Departments::orderBy('department_name')->get();

        return view('users.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
        ]);

        $password_generate = User::password_generate();
        $password_generate_encrypted = bcrypt($password_generate);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => $password_generate_encrypted,
        ]);

        //Pivot table relationship for selected departments to this project.
        foreach($request->department as $department_id=>$status){
            $user->departments()->attach($department_id);
        }

        return redirect('users')->with('message', 'Temporary password is: '.$password_generate);
    }

    public function edit(User $user)
    {
        $departments = Departments::orderBy('department_name')->get();

        return view('users.edit', compact(['user', 'departments']));
    }

    public function save(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        //Pivot table relationship for selected departments to this project.
        foreach($request->department as $department_id=>$status){
            if (!$user->departments->contains($department_id)) {
                $user->departments()->attach($department_id);
            }
        }

        return redirect('users')->with('message', 'User updated successfully!');
    }

    public function reset_password(User $user)
    {
        $password_generate = User::password_generate();
        $password_generate_encrypted = bcrypt($password_generate);

        $user->update([
            'password' => $password_generate_encrypted
        ]);

        return back()->with('message', 'New temporary password for '.$user->email.' is: '.$password_generate);
    }

    public function settings()
    {
        $user = Auth::user();
        $message = Session::get('message');

        return view('users.settings', compact(['user', 'message']));
    }

    public function change_settings(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with('message', 'Your settings have been updated successfully!');
    }

    public function change_password(Request $request)
    {
        $this->validate(request(), [
            'password' => 'required|confirmed',
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);

        return back()->with('message', 'User password has been updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('users');
    }
}
