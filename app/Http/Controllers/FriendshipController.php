<?php

namespace App\Http\Controllers;

use App\Friendship;
use App\User;
use Illuminate\Http\Request;
use Log;


class FriendshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::User();
        $acceptedFriendships = $user->getAcceptedFriendships();
        $requestedFriendships = $user->getFriendRequests();
        $pendingFriendships = $user->getPendingFriendships();
        return view('showfriendships', compact('user', 'acceptedFriendships', 'requestedFriendships', 'pendingFriendships'));
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

    public function confirm(Request $request)
    {
        $user = \Auth::User();
        $friendship = Friendship::find($request['friendship']);
        $sender = User::find($friendship->sender_id);
        $user->acceptFriendRequest($sender);
        
        return redirect()->route('friendships.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $bodyContent = $request->getContent();
        $user = \Auth::User();
        $recipient = User::find($request['user']);
        $user->befriend($recipient);
        
        return redirect()->route('friendships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friendship  $friendship
     * @return \Illuminate\Http\Response
     */
    public function show(Friendship $friendship)
    {
        return response()->json($friendship);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friendship  $friendship
     * @return \Illuminate\Http\Response
     */
    public function edit(Friendship $friendship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friendship  $friendship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friendship $friendship)
    {
        //
    }

    public function unfriend(Request $request)
    {
        $friendship = Friendship::find($request['friendship']);
        $sender = User::find($friendship->sender_id);
        $recipient = User::find($friendship->recipient_id);
        $recipient->unfriend($sender);
        
        return redirect()->route('friendships.index');
    }
}
