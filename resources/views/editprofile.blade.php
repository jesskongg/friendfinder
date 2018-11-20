@extends('layouts.app')

@section('styles')
    <style>
        .course {
          margin: 0 0 10px 0;
        }
        #add-btn {
          margin-top: 5px;
        }
        #enrollments {
          list-style-type: none;
        }
    </style>
@endsection()

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
    <div class="form-group col-md-4">
      <label for="github">Github ID</label>
      <input class="form-control" type="text" name="github" id="github" value="{{ $userRecord->github }}">
    </div>
    <div class="form-group col-md-4">
      <label for="linkedin">LinkedIn Profile</label>
      <input class="form-control" type="text" name="linkedin" id="linkedin" value="{{ $userRecord->linkedin }}">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="bio">Bio</label>
      <textarea class="form-control" rows="4" cols="25" name="bio" id="bio">{{ $userRecord->bio }}</textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <h3>Tags</h3>
      Select all tags that apply to you<br>
      @foreach ($dbInterests as $interest)
        <input type="checkbox" name="selectedInterests[]" value="{{ $interest->type }}" {{in_array($interest->type,$interests)?'checked':''}}> {{ $interest->type }}<br>
      @endforeach
      <input class="btn btn-primary" type="submit" name="Submit" value="Submit Profile">
    </form>
    </div>
    <div class="form-group col-md-2">
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
          <label for="name">Course Code (ie: CMPT 470)</label>
          <input class="form-control" type="text" name="course" id="course" required>
          <input class="btn btn-success" id="add-btn" type="submit" name="Submit" value="Add">
        </form>
      </div>
      <div class="form-group col-md-2">
        @if($enrollments)
          <h3>Remove a Course</h3>
          <ul id="enrollments">
            @foreach($enrollments as $enrollment)
              <li class="course">{{ $enrollment["course"] }}
                <a href="{{ action("UserController@removeCourse", ["user_id" => $userRecord->id, "course_id" => $enrollment["id"]]) }}">
                  <button type="button" class="btn btn-danger btn-sm">Remove</button>
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  </div>

@endsection
