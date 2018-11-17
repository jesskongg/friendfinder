@extends('layouts.app')

@section('styles')
    <style>
        .dashboard-table {
            max-width: 30%;
            position: absolute;
            left: 50px;

        }
    </style>
@endsection()

@section('content')
<center>
  <h1>Welcome to Admin Dashboard</h1>
  <h4>Select any user to edit their profile</h4>
</center>
<br>
<br>

<table class="table table-hover dashboard-table">
  <thead>
    <tr>
      <th scope="col">ID</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allUsers as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>
        <a href="{{ action("UserController@show", ["id" => $user->id]) }}">
          <button type="button" class="btn btn-info">View Profile</button>
        </a>
        <a href="{{ action("UserController@edit", ["id" => $user->id]) }}">
          <button type="button" class="btn btn-success">Edit Profile</button>
        </a>
        <form method="POST" style="display:inline" action="{{ action("UserController@destroy", ["id" => $user->id])}}">
          @method('DELETE')
          @csrf
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
