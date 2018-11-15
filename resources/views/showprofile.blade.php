@extends('layouts.app')

@section('content')
  	<h1>Profile for: {{ $userRecord->name }} </h1>
    @if(!Auth::guard('admin')->check())
      @if(\Auth::User()->id !== $userRecord->id)
        <form method="POST" action="../friendships">
          @csrf
          <input type="hidden" name="user" value={{$userRecord->id}} />
  				@if(! \Auth::User()->hasSentFriendRequestTo(App\User::find($userRecord->id)) && ! \Auth::User()->isFriendWith(App\User::find($userRecord->id)))
  					<button type="submit">Add Friend</button>
  				@endif
        </form>
      @endif
    @endif
  	<p><strong>Email:</strong> {{ $userRecord->email }}</p>
  	<p><strong>Major:</strong> {{ $userRecord->major }}</p>
  	<p><strong>Minor:</strong>  {{ $userRecord->minor }}</p>
  	<p><strong>Bio:</strong></p>
      <div class="card" style="max-width:20%;">
        <div class="card-body">
          {{ $userRecord->bio }}
        </div>
      </div>
      <br>
  	<p><strong>Tags</strong></p>
  	@if($interests)
  	<ul>
    	@foreach($interests as $interest)
    		<li>{{ $interest }}  &#x2611;</li>
    	@endforeach
  	@endif
	  </ul>
  <br>
  <br>
    <p><strong>Enrolled Courses</strong></p>
    @if($enrollments)
    <ul>
      @foreach($enrollments as $enrollment)
        <li>{{ $enrollment }}</li>
      @endforeach
    @endif
    </ul>
  <br>
  <br>
  @if(!Auth::guard('admin')->check())
    @if(Auth::user() && Auth::user()->id == $userRecord->id)
    <a href="{{ action("UserController@edit", ["id" => $userRecord->id]) }}">
      <button type="button" class="btn btn-success">Edit Profile</button>
    </a>
    @endif
  @else
  <a href="{{ action("UserController@edit", ["id" => $userRecord->id]) }}">
    <button type="button" class="btn btn-success">Edit Profile</button>
  </a>
  @endif
@endsection
