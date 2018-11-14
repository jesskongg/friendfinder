@extends('layouts.app')

@section('content')
<H1>ADMIN DASHBOARD</h1>

<div>
  <ul>
    @foreach($allUsers as $user)
      <li>
        <a href="{{ action("UserController@show", ["id" => $user->id]) }}">{{ $user->name }}</a>
        <form method="POST" action="{{ action("UserController@destroy", ["id" => $user->id])}}">
          @method('DELETE')
          @csrf
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </li>
    @endforeach
  </ul>
</div>

@endsection
