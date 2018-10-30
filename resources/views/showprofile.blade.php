@extends('layouts.app')

@section('content')

  	<h1>Profile for: {{ $userRecord->name }} </h1>
    @if(\Auth::User()->id !== $userRecord->id)
      <form method="POST" action="../friendships">
        @csrf
        <input type="hidden" name="user" value={{$userRecord->id}} />
        <button type="submit">Add Friend</button>
      </form>
    @endif

  	<p>Email: {{ $userRecord->email }}<p>
	<p>Major: {{ $userRecord->major }}<p>
	<p>Minor: {{ $userRecord->minor }}<p>
  	<p>Bio: {{ $userRecord->bio }}<p>
  	<p>Tags</p>
  	@if($interests)
  	<ul>
    	@foreach($interests as $interest)
    		<li>{{ $interest }}</li>
    	@endforeach
  	@endif
	</ul>
	@if (Auth::user() && Auth::user()->id == $userRecord->id)
		<a href="/users/{{Auth::user()->id}}/edit">Edit</a>
	@endif
@endsection