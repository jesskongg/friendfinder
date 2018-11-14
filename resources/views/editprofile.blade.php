@extends('layouts.app')

@section('styles')

@section('content')

<h3>Edit Profile</h3>
<form action="{{ action("UserController@update", $userRecord->id ) }}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">Name</label>
      <input class="form-control" type="text" name="name" id="name" value="{{ $userRecord->name }}" required>
    </div>
    @if ($errors->has('email'))
      <div class="alert alert-danger">
        {{ $errors->first('email') }}
      </div>
    @endif
    <div class="form-group col-md-4">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" id="email" value="{{ $userRecord->email }}" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="major">Major</label>
      <input class="form-control" type="text" name="major" id="major" value="{{ $userRecord->major }}">
    </div>
    <div class="form-group col-md-4">
      <label for="minor">Minor</label>
      <input class="form-control" type="text" name="minor" id="minor" value="{{ $userRecord->minor }}">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="bio">Bio</label>
      <textarea class="form-control" rows="4" cols="25" name="bio" id="bio">{{ $userRecord->bio }}</textarea>
    </div>
  </div>
  Select all tags that apply to you<br>
  @foreach ($dbInterests as $interest)
    <input type="checkbox" name="selectedInterests[]" value="{{ $interest->type }}" {{in_array($interest->type,$interests)?'checked':''}}> {{ $interest->type }}<br>
  @endforeach
  <input class="btn btn-success" type="submit" name="Submit">
</form>
<br>
<br>
<h3>Add a Course</h3>
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
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">Course Code (ie: CMPT 470)</label>
      <input class="form-control" type="text" name="course" id="course" required>
    </div>
  </div>
  <input class="btn btn-success" type="submit" name="Submit">
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

@endsection
