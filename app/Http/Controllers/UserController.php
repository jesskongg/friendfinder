<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function edit()
    {
        return view('editprofile');
    }

    public function index()
    {
        return view('user');
    }

    public function search(Request $request)
    {
        if ($request->name) {
            $users = User::where('name', $request->name)->select(['name', 'email'])->get();
        }
        return view('user', ['users' => isset($users) ? $users : null]);
    }
}
