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
  @if (Auth::user() && Auth::user()->id == $userRecord->id)
    <a href="/users/{{Auth::user()->id}}/edit">Edit Profile</a>
  @endif
@endsection
