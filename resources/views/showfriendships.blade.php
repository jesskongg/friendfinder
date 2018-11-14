@extends('layouts.app')

@section('content')
	<h3>Friendships</h3>
	<h4>Requests</h4>
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
	<h4>Pending</h4>
	<ul>
	@foreach ($pendingFriendships as $friendship)
		@if ($user->id !== ($friendship->recipient->id))
		<li>{{$friendship->recipient->name}}</li>
		@endif
	@endforeach
	</ul>
	<h4>Friends</h4>
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
