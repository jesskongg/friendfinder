@extends('layouts.app')

@section('content')
  	<h1>Profile for: {{ $userRecord->name }} </h1>
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