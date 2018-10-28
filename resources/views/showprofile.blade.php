<!DOCTYPE html>
<head>
  <title>Show Profile</title>
</head>
<body>
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

</body>
