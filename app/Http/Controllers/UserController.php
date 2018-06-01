<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('users.show', compact('user'));
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

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('users');
    }
}
