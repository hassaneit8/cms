<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\UpdateUsersRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users',User::all());
    }
    public function makeAdmin(User $user){
        $user->role ='admin';
        $user->save();
        return redirect(route('users.index'))->with('success', 'Updated Succesfully');//->with('message',"User updated to admin permitions");
    }
    public function edit(){
        return view('users.edit')->with('user',auth()->user());
    }
    public function update(UpdateUsersRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'name'=>$request->name,
            'about'=>$request->about,
        ]);

        return redirect()->back()->with('success','Updated successesfully');
    }

}
