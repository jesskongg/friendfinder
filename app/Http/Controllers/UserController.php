<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Interest;
use App\Course;
use Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Not needed.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not needed.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Not needed.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $userRecord = DB::table('users')->where('id', $id)->first();

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

      // Check if the current user has added any enrolled courses to their profile
      $results = DB::table('enrollments')->where('user_id', $id)->get();
      // If so, get those courses...
      if($results) {
        $enrollments = array();
        foreach($results as $enrollment) {
          $getEnrollment = DB::table('courses')->where('id', $enrollment->course_id)->first();
          if (!in_array($getEnrollment->number, $enrollments))
          array_push($enrollments, $getEnrollment->number);
        }
      }

      return view('showprofile', compact('userRecord', 'interests', 'enrollments'));
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
      if (!Auth::guard('admin')->check()) {
        if ($user == null || $user->id != $id)
          return redirect('/');
      }


      // Check if the current user has added any enrolled courses to their profile
      $results = DB::table('enrollments')->where('user_id', $id)->get();
      $enrollments = array();
      // If so, get those courses...
      if($results) {
        foreach($results as $enrollment) {
          $getEnrollment = DB::table('courses')->where('id', $enrollment->course_id)->first();
          if (!in_array($getEnrollment->id, $enrollments))
          array_push($enrollments, array("course" => strtoupper($getEnrollment->department) . ' ' . $getEnrollment->number, "id" => $getEnrollment->id));
        }
      }

      // Check if the current user has added any "interests" to their profile
      $results = DB::table('user_interest')->where('user_id', $id)->get();
      $interests = array();
      // If so, get those interests..
      if($results) {
        foreach($results as $interest) {
          $getInterest = DB::table('interests')->where('id', $interest->interest_id)->first();
          array_push($interests, $getInterest->type);
        }
      }
      $userRecord = DB::table('users')->where('id', $id)->first();

      // Get listing of all interests in the DB for user to view list of available options
      $dbInterests = DB::table('interests')->get();
      // dd($dbInterests[0]->type);
      // if(in_array($dbInterests[0]->type, $interests)) {
      //   dd($dbInterests[0]->type);
      // }


      return view('editprofile', compact('userRecord', 'interests', 'dbInterests', 'enrollments', 'courses'));
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

        Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
        ])->validate();

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
        $user->github = $request->github ? $user->github : null;
        $user->linkedin = $request->linkedin ? $user->linkedin : null;
        $user->save();
        return redirect()->action('UserController@show', ['id' => $id]);
    }

    public function removeCourse($user_id, $course_id) {

      $user = User::where('id', $user_id)->first();
      $user->courses()->detach($course_id);

      return redirect()->action('UserController@edit', ['id' => $user_id]);
    }

    public function addCourse(Request $request, $user_id) {


      $validatedData = $request->validate([
        'course' => 'regex:/.{4}\s\d{3}/',
      ]);
      $submittedCourse = $request->course;
      $exploded = explode(" ", $submittedCourse);
      $dept = $exploded[0];
      $courseNum = $exploded[1];
      $courseID = DB::table('courses')->where([['department', $dept], ['number', $courseNum]])->value('id');
      $alreadyExists = DB::table('enrollments')->where([['course_id', $courseID], ['user_id', $user_id]])->first();
      // dd($alreadyExists);
      if($alreadyExists) {
        $error = \Illuminate\Validation\ValidationException::withMessages([
       'duplicate_course' => ['You have already added this course.'],
        ]);
        // dd($error);
        throw $error;
      }
      if($courseID) {
        $user = User::where('id', $user_id)->first();
        $user->courses()->syncWithoutDetaching([$courseID]);
      } else {
          $error = \Illuminate\Validation\ValidationException::withMessages([
         'invalid_course' => ['Please enter a valid course'],
          ]);
        throw $error;
      }

      return redirect()->action('UserController@edit', ['id' => $user_id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('users')->where('id', $id)->delete();
      // dd("HELLO");
      return redirect()->action('AdminController@index');
    }

}
