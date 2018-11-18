<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// May want to make AdminController only inherit the UserController methods it actually needs
class AdminController extends UserController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers = DB::table('users')->get();
        // dd($allUsers);

        return view('admin/admin-dashboard', compact('allUsers'));
    }
}
