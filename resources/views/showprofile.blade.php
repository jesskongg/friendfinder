<!DOCTYPE html>
<head>
  <title>Show Profile</title>
</head>
<body>
  <h1>Profile for: {{ $userRecord->name }} </h1>
  <p>Email: {{ $userRecord->email }}<p>
  <p>Bio: {{ $userRecord->bio }}<p>
  <p>Interests</p>
  @if($interests)
  <ul>
    @foreach($interests as $interest)
    <li>{{ $interest }}</li>
    @endforeach
  @endif
  </ul>

</body>
