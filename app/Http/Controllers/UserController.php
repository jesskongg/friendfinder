<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function edit()
    {
        return view('editprofile');
    }

    public function index(Request $request)
    {
        $selections = ['id', 'name', 'email'];
        if ($request->name || $request->email) {
            $query = User::query();
            $query = $request->name ? $query->where('name', $request->name) : $query;
            $query = $request->email ? $query->where('email', $request->email) : $query;
            $users = $query->select($selections)->get();
        }
        return view('user', [
            'users' => isset($users) ? $users : null,
            'name' => isset($request->name) ? $request->name : '',
            'email' => isset($request->email) ? $request->email : '',
        ]);
    }
}
