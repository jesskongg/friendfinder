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
      Bio<br>
      <textarea rows="4" cols="25" name="bio" id="bio" value="{{ $userRecord->bio }}"></textarea>
      <br>
      <input type="submit" name="Submit">
    </form>
</body>
