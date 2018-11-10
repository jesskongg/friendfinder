@extends('layouts.app')

@section('styles')

@section('content')

<h1>Edit Profile</h1>
<form action="{{ action("UserController@update", $userRecord->id ) }}" method="POST">
  @method('PUT')
  @csrf
  <label for="name">Name</label>
  <input type="text" name="name" id="name" value="{{ $userRecord->name }}" required>
  <br>
  @if ($errors->has('email'))
    <div class="alert alert-danger">
      {{ $errors->first('email') }}
    </div>
  @endif
  <label for="email">Email</label>
  <input type="email" name="email" id="email" value="{{ $userRecord->email }}" required>
  <br>
  <!-- TODO: replace textbox with dept datalist -->
  <label for="major">Major</label>
  <input type="text" name="major" id="major" value="{{ $userRecord->major }}">
  <br>
  <label for="minor">Minor</label>
  <input type="text" name="minor" id="minor" value="{{ $userRecord->minor }}">
  <br>
  Bio<br>
  <textarea rows="4" cols="25" name="bio" id="bio">{{ $userRecord->bio }}</textarea>
  <br>
  Select all tags that apply to you<br>
  @foreach ($dbInterests as $interest)
    <input type="checkbox" name="selectedInterests[]" value="{{ $interest->type }}" {{in_array($interest->type,$interests)?'checked':''}}>{{ $interest->type }}<br>
  @endforeach
  <input type="submit" name="Submit">
</form>
<br>
<br>
<h1>Add a Course</h1>
@if ($errors->has('course'))
  <div class="alert alert-danger">
    {{ $errors->first('course') }}
  </div>
@endif
@if ($errors->has('invalid_course'))
  <div class="alert alert-danger">
    {{ $errors->first('invalid_course') }}
  </div>
@endif
@if ($errors->has('duplicate_course'))
  <div class="alert alert-danger">
    {{ $errors->first('duplicate_course') }}
  </div>
@endif
<form action="{{ action("UserController@addCourse", $userRecord->id ) }}" method="POST">
  @csrf
  <label for="name">Course Code (ie: CMPT 470)</label>
  <input type="text" name="course" id="course" required>
  <br>
  <input type="submit" name="Submit">
</form>
<br>
<br>
<p>Enrolled Courses:</p>
@if($enrollments)
<ul>
  @foreach($enrollments as $enrollment)
    <li>{{ $enrollment["course"] }} <a href="{{ action("UserController@removeCourse", ["user_id" => $userRecord->id, "course_id" => $enrollment["id"]]) }}">Remove</a></li>
  @endforeach
@endif
</ul>
<br>
<br>


@endsection
