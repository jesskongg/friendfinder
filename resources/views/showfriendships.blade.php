@extends('layouts.app')

@section('content')
	<h1>Friendships</h1>
	<h2>Requests</h2>
	<ul>
	@foreach ($requestedFriendships as $friendship)
		<li>{{$friendship->sender->name}}
		<form action='/confirm-friendship' method='POST'>
			@csrf
	        <input type="hidden" name="friendship" value={{$friendship->id}} />
			<button>Accept</button>
		</form>
		</li>
	@endforeach
	</ul>
	<h2>Pending</h2>
	<ul>
	@foreach ($pendingFriendships as $friendship)
		@if ($user->id !== ($friendship->recipient->id))
		<li>{{$friendship->recipient->name}}</li>
		@endif
	@endforeach
	</ul>
	<h2>Friends</h2>
	<ul>
	@foreach ($acceptedFriendships as $friendship)
		<li><a href="{{ action('UserController@show', ['id' => $friendship->recipient->id]) }}"/>{{$friendship->recipient->name}}</a>

			<!-- {{$friendship->recipient->name}} -->

		<form action='/remove-friendship' method='POST'>
			@csrf
	        <input type="hidden" name="friendship" value={{$friendship->id}} />
			<button>Remove</button>
		</form>

		</li>
	@endforeach
	</ul>


@endsection
