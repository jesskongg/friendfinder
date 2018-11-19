<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Enrollment;
use App\Interest;
use Phpml\Clustering\KMeans;
use Illuminate\Support\Facades\DB;
use Auth;

class SearchController extends Controller
{
    // TODO: Move this to a controller that handles the dashboard
    public function index()
    {
        // If admin user goes to '/' instead of '/admin', it redirects them to '/admin' (which is the admin version of 'home')
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        $courses = Course::select(['department', 'number'])->get();
        return view('welcome', ['courses' => $courses]);
    }

    public function courses(Request $request)
    {
        if ($request->department && $request->number) {
            $course = Course::where('department', '=', $request->department)
                            ->where('number', '=', $request->number)
                            ->first();
            if ($course) {
                // TODO: exposing ID might not be a good idea but whatever
                $students = DB::table('enrollments')
                                ->join('users', 'users.id', 'enrollments.user_id')
                                ->join('courses', 'courses.id', 'enrollments.course_id')
                                ->where('enrollments.course_id', '=', $course->id)
                                ->select(['users.id', 'name', 'email'])
                                ->get();
                $interests = Interest::select('type')
                                -> get();

                $recommendFriends = $this->recommend($students, $interests);
                return view('course', [
                    'department' => $course->department,
                    'number' => $course->number,
                    'description' => $course->description,
                    'students' => $students,
                    'interests' => $interests,
                    'recommendFriends' => $recommendFriends,
                ]);
            }
            return view('course');
        } else {
            return view('course');
        }
    }

    public function users()
    {
        return view('user');
    }

    public function filter(Request $request)
    {
        $selections = ['name', 'email'];
        $users = [];
        if ($request->name || $request->email) {
            $query = User::query();
            $query = $request->name ? $query->where('name', $request->name) : $query;
            $query = $request->email ? $query->where('email', $request->email) : $query;
            $users = $query->select($selections)->get();
        }
        return response()->json(['data' => $users], 200);
    }

    public function filterByInterest(Request $request)
    {
        $users = [];
        if ($request->interests)
        {
            $users = DB::table('user_interest')
                        ->join('users', 'users.id', 'user_interest.user_id')
                        ->join('interests', 'interests.id', 'user_interest.interest_id')
                        ->whereIn('interests.type', $request->interests)
                        ->select(['name','email','users.id'])
                        ->distinct()
                        ->get();
        }
        return response() -> json(['data' => $users], 200);
    }

    // PHP is so slow that PCA cannot ben run. All features are binary features, so the dataset is very sparce. This algorithm is garbage.
    public function recommend($students, $interests)
    {
        foreach($students as $student)
        {
            // Add randomness
            for($i = 0; $i < count($interests); $i++)
            {
                $row[$i] = mt_rand(1,5);
            }
            $user_interests = DB::table('user_interest')
                         -> where('user_id', '=', $student->id)
                         -> select(['interest_id'])
                         -> get();
            foreach($user_interests as $user_interest)
            {
                $row[$user_interest->interest_id-1] = $row[$user_interest->interest_id-1] + 10;
            }
            $trainData[$student->id] = $row;
        }
        $kmeans = new KMeans(count($students)/5, KMeans::INIT_RANDOM);
        $results = $kmeans->cluster($trainData);
        foreach($results as $result)
        {
            if(isset($result[Auth::id()]))
            {
                $sameCluster = $result;
                break;
            }
        }
        if(empty($sameCluster))
        {
            return null;
        }
        else
        {
            $students = DB::table('users')
                       -> whereIn('id', array_keys($sameCluster))
                       -> select(['id','name', 'email'])
                       -> get();
            return $students;
        }
    }
}
