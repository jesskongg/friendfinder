<!DOCTYPE html>
<head>
  <title>Show Profile</title>
</head>
<body>
  <h1>Profile for: {{ $userRecord->name }} </h1>
  <p>Email: {{ $userRecord->email }}<p>
  <p>Bio: {{ $userRecord->bio }}<p>
</body>
