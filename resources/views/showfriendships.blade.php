@extends('layouts.app')

@section('content')
	<h3>Friendships</h3>
	<h4>Requests</h4>
	<ul class="list-group">
	@foreach ($requestedFriendships as $friendship)
		<li class="list-group-item">
		<form style="display: inline-block" action='/confirm-friendship' method='POST'>
			@csrf
			<input type="hidden" name="friendship" value={{$friendship->id}} />
			<button style="margin-right: 25px;" class="btn btn-primary">Accept</button>
		</form>

		<a href="{{ action('UserController@show', ['id' => $friendship->sender->id]) }}"/>{{$friendship->sender->name}}</a>
		</li>
	@endforeach
	</ul>
	<h4>Pending</h4>
	<ul class="list-group">
	@foreach ($pendingFriendships as $friendship)
		@if ($user->id !== ($friendship->recipient->id))
		<li class="list-group-item"><a href="{{ action('UserController@show', ['id' => $friendship->recipient->id]) }}"/>{{$friendship->recipient->name}}</a></li>
		@endif
	@endforeach
	</ul>
	<h4>Friends</h4>
	<ul class="list-group">
	@foreach ($acceptedFriendships as $friendship)

		<li class="list-group-item">
		<form style="display: inline-block;" action='/remove-friendship' method='POST'>
			@csrf
			<div>
				<input type="hidden" name="friendship" value={{$friendship->id}} />
				<button style="margin-right: 25px;" class="btn btn-danger">Remove</button>
			</div>
		</form>

		@if ($friendship->recipient->id === \Auth::User()->id)
		<a href="{{ action('UserController@show', ['id' => $friendship->sender->id]) }}"/>{{$friendship->sender->name}}</a>
		@else
		<a href="{{ action('UserController@show', ['id' => $friendship->recipient->id]) }}"/>{{$friendship->recipient->name}}</a>
		@endif
		</li>
	@endforeach
	</ul>


@endsection
