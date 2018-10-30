<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Interest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Check if the current user has added any "interests" to their profile
        $results = DB::table('user_interest')->where('user_id', $id)->get();
        // If so, get those interests..
        if($results) {
          $interests = array();
          foreach($results as $interest) {
            $getInterest = DB::table('interests')->where('id', $interest->interest_id)->first();
            if (!in_array($getInterest->type, $interests))
            array_push($interests, $getInterest->type);
          }
        }
        $userRecord = DB::table('users')->where('id', $id)->first();
        return view('showprofile', compact('userRecord', 'interests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = Auth::user();
      if ($user == null || $user->id != $id) 
        return redirect('/');
      // Check if the current user has added any "interests" to their profile
      $results = DB::table('user_interest')->where('user_id', $id)->get();
      // If so, get those interests..
      if($results) {
        $interests = array();
        foreach($results as $interest) {
          $getInterest = DB::table('interests')->where('id', $interest->interest_id)->first();
          array_push($interests, $getInterest->type);
        }
      }
      $userRecord = DB::table('users')->where('id', $id)->first();
      return view('editprofile', compact('userRecord', 'interests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $selected = $request->selectedInterests;
        if ($selected) {
          $interests = DB::table('interests')->get();
          // TODO: This will become MUCH slower as the interests table grow. We may want to do it using query rather than foreach.
          foreach ($interests as $interest) {
            if (in_array($interest->type, $selected)) {
              $interestExists = DB::table('user_interest')->where([['user_id', $id], ['interest_id', $interest->id]])->first();
              if (!$interestExists) {
                $user->interests()->attach($interest->id);
              }
            } else {
              $user->interests()->detach($interest->id);
            }
          }
        // Remove all interests from user_interest table if no tags are selected (or all tags were unselected)
        } else {
          $user->interests()->detach();
        }
        $user->fill($request->all());
        // TODO: make major, minor and bio nullable
        $user->major = $request->major ? $user->major : "";
        $user->minor = $request->minor ? $user->minor : "";
        $user->bio = $request->bio ? $user->bio : "";
        $user->save();
        return redirect()->route('users.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
