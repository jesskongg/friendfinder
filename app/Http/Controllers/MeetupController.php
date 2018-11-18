<?php

namespace App\Http\Controllers;

use App\Meetup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class MeetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetups = DB::table('meetups')->join('users', 'meetups.creator_id', '=', 'users.id')
                ->select('meetups.*', 'users.name AS username')
                ->orderBy('date', 'desc')
                ->get();
        return view('meetup', ['meetups' => $meetups]);
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
        $user = Auth::user();
        $title = $request->title;
        $description = $request->description;
        $location = $request->location;
        Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d'
        ])->validate();
        $date = $request->date;
        if (isset($title) && isset($description) && isset($location) && isset($location) && isset($user)) {
            $meetup = new Meetup();
            $meetup->title = $title;
            $meetup->description = $description;
            $meetup->location = $location;
            $meetup->creator_id = $user->id;
            $meetup->date = $date;
            $meetup->save();
        }
        return redirect()->action('MeetupController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function show(Meetup $meetup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function edit(Meetup $meetup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meetup $meetup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meetup $meetup)
    {
        $user = Auth::user();
        if ($user->id == $meetup->creator_id) {
            $meetup->delete();
        }        
        return redirect()->action('MeetupController@index');
    }
}
