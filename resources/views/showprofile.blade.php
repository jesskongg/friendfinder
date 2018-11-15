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
  	<p>Email: {{ $userRecord->email }}<p>
  	<p>Major: {{ $userRecord->major }}<p>
  	<p>Minor: {{ $userRecord->minor }}<p>
  	<p>Bio: {{ $userRecord->bio }}<p>
  	<p>Tags</p>
  	@if($interests)
  	<ul>
    	@foreach($interests as $interest)
    		<li>{{ $interest }}  &#x2611;</li>
    	@endforeach
  	@endif
	  </ul>
  <br>
  <br>
    <p>Enrolled Courses</p>
    @if($enrollments)
    <ul>
      @foreach($enrollments as $enrollment)
        <li>{{ $enrollment }}</li>
      @endforeach
    @endif
    </ul>
  <br>
  <br>
<<<<<<< HEAD
  @if(!Auth::guard('admin')->check())
    @if(Auth::user() && Auth::user()->id == $userRecord->id)
      <a href="/users/{{Auth::user()->id}}/edit">Edit Profile</a>
    @endif
  @else
    <a href="/users/{{$userRecord->id}}/edit">Edit Profile</a>
=======
  @if (Auth::user() && Auth::user()->id == $userRecord->id)
    <button type="button" class="btn btn-primary">
      <a class="text-white" href="/users/{{Auth::user()->id}}/edit">Edit Profile</a>
    </button>
>>>>>>> 24e96344d89d3dfec9db73fae6d5bc8136ca47c4
  @endif
@endsection
