<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Enrollment;
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
        // TODO: get a list of students enrolling in this course
        if ($request->department && $request->number) {
            $course = Course::where('department', '=', $request->department)
                            ->where('number', '=', $request->number)
                            ->first();
            if ($course) {
                $students = DB::table('enrollments')
                                ->join('users', 'users.id', 'enrollments.user_id')
                                ->join('courses', 'courses.id', 'enrollments.course_id')
                                ->where('enrollments.course_id', '=', $course->id)
                                ->select(['name', 'email'])
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
        return view('users');
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
}
