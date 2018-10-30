@extends('layouts.app')

@section('content')
	<h1>Friendships</h1>
	<h2>Requests</h2>
	<ul>
	@foreach ($requestedFriendships as $friendship)
		<li>{{$friendship->recipient->name}} <button>Accept</button></li>
	@endforeach
	</ul>
	<h2>Pending</h2>
	<ul>
	@foreach ($pendingFriendships as $friendship)
		<li>{{$friendship->recipient->name}} <button>Withdraw</button></li>
	@endforeach
	</ul>
	<h2>Friends</h2>
	<ul>
	@foreach ($acceptedFriendships as $friendship)
		<li>{{$friendship->recipient->name}} <button>Remove</button></li>
	@endforeach
	</ul>


@endsection