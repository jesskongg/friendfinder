<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Enrollment;
use App\Interest;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // TODO: Move this to a controller that handles the dashboard
    public function index()
    {
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
                return view('course', [
                    'department' => $course->department,
                    'number' => $course->number,
                    'description' => $course->description,
                    'students' => $students,
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
        if ($request->interest)
        {
            /*
            $course = Course::where('department', '=', $request->department)
                ->where('number', '=', $request->number)
                ->first();
            $students = DB::table('enrollments')
                            ->join('users', 'users.id', 'enrollments.user_id')
                            ->join('courses', 'courses.id', 'enrollments.course_id')
                            ->where('enrollments.course_id', '=', $course->id)
                            ->select(['users.id', 'name', 'email'])
                            ->get();
            */

            $users = DB::table('user_interest')
                        ->join('users', 'users.id', 'user_interest.user_id')
                        ->join('interests', 'interests.id', 'user_interest.interest_id')
                        ->where('interests.type','=', $request->interest)
                        ->select(['name','email','type','users.id'])
                        ->get();                       
        }
        return response() -> json(['data' => $users], 200);
    }
}
