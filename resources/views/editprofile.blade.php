<!DOCTYPE html>
<head>
  <title>Edit Profile</title>
</head>
<body>
  <h1>Edit Profile</h1>
    <form action="{{ action("UserController@update", $userRecord->id ) }}" method="POST">
      @method('PUT')
      @csrf
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="{{ $userRecord->name }}">
      <br>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" value="{{ $userRecord->email }}">
      <br>
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
      <input type="checkbox" name="selectedInterests[]" value="First Year" @if(in_array('First Year', $interests)) checked=checked @endif>First Year<br>
      <input type="checkbox" name="selectedInterests[]" value="High GPA" @if(in_array('High GPA', $interests)) checked=checked @endif>High GPA<br>
      <input type="checkbox" name="selectedInterests[]" value="Second Degree" @if(in_array('Second Degree', $interests)) checked=checked @endif>Second Degree<br>
      <input type="checkbox" name="selectedInterests[]" value="Post Bachelor Diploma" @if(in_array('Post Bachelor Diploma', $interests)) checked=checked @endif>PBD<br>
      <input type="checkbox" name="selectedInterests[]" value="International" @if(in_array('International', $interests)) checked=checked @endif>International<br>
      <input type="checkbox" name="selectedInterests[]" value="Gaming" @if(in_array('Gaming', $interests)) checked=checked @endif>Gaming<br>
      <input type="checkbox" name="selectedInterests[]" value="Blockchain" @if(in_array('Blockchain', $interests)) checked=checked @endif>Blockchain<br>
      <input type="checkbox" name="selectedInterests[]" value="Artificial Intelligence" @if(in_array('Artificial Intelligence', $interests)) checked=checked @endif>Artificial Intelligence<br>
      <input type="checkbox" name="selectedInterests[]" value="Machine Learning" @if(in_array('Machine Learning', $interests)) checked=checked @endif>Machine Learning<br>
      <input type="checkbox" name="selectedInterests[]" value="Big Data" @if(in_array('Big Data', $interests)) checked=checked @endif>Big Data<br>
      <input type="checkbox" name="selectedInterests[]" value="Virtual Reality" @if(in_array('Virtual Reality', $interests)) checked=checked @endif>Virtual Reality<br>
      <input type="checkbox" name="selectedInterests[]" value="Animation" @if(in_array('Animation', $interests)) checked=checked @endif>Animation<br>
      <input type="submit" name="Submit">
    </form>
</body>
