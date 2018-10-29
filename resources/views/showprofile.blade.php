@extends('layouts.app')

@section('scripts')
<script>
  	function onSavePress() {
		var bio = $("#bio_textbox")[0].value
		var major = $("#major_textbox")[0].value
		var minor = $("#minor_textbox")[0].value
		$.ajax({
			type: 'PUT',
			url: '/users/{{Auth::user()->id}}',
			data: {
				bio,
				major,
				minor,
			},
			success: result => location.reload(),
			error: err => console.log(err.responseJSON),
		})
  	}
</script>

@section('content')
  	<h1>Profile for: {{ $userRecord->name }} </h1>
  	<p>Email: {{ $userRecord->email }}<p>
	<p>Major:
    	@if (Auth::user()->id == $userRecord->id)
      	<input id="major_textbox" type="text" value="{{ $userRecord->major }}"/>
    	@else
      	{{ $userRecord->major }}
    	@endif
  	<p>
	<p>Minor:
    	@if (Auth::user()->id == $userRecord->id)
      	<input id="minor_textbox" type="text" value="{{ $userRecord->minor }}"/>
    	@else
      	{{ $userRecord->minor }}
    	@endif
  	<p>
  	<p>Bio:
    	@if (Auth::user()->id == $userRecord->id)
      	<input id="bio_textbox" type="text" value="{{ $userRecord->bio }}"/>
    	@else
      	{{ $userRecord->bio }}
    	@endif
  	<p>
  	<p>Tags</p>
  	@if($interests)
  	<ul>
    	@foreach($interests as $interest)
    		<li>{{ $interest }}</li>
    	@endforeach
  	@endif
  	</ul>
  	@if (Auth::user()->id == $userRecord->id)
	  <button onclick="onSavePress()">Save</button>
	@endif
@endsection