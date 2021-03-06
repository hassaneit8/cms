<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\UpdateUsersRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::paginate(4));
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        return redirect(route('users.index'))->with('success', 'Updated Succesfully');//->with('message',"User updated to admin permitions");
    }

    public function makeWriter(User $user)
    {
        $user->role = 'writer';
        $user->save();
        return redirect(route('users.index'))->with('success', 'Updated Succesfully');//->with('message',"User updated to admin permitions");
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);
        return redirect(route('users.index'));

    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateUsersRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'about' => $request->about,
        ]);

        return redirect()->back()->with('success', 'Updated successesfully');
    }

}
