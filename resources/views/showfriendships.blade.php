@extends('layouts.app')

@section('content')
	<h1>Friendships</h1>
	<ol>
	@foreach ($friendships as $friendship)
		<li>{{$friendship->recipient->name}} | {{$friendship->status}}</li>
	@endforeach
	</ol>

@endsection