@extends('layouts.app')

@section('content')
  	<h3>Profile: {{ $userRecord->name }} </h3>
    @if(!Auth::guard('admin')->check())
      @if(isset(Auth::User()->id))
        @if(Auth::User()->id !== $userRecord->id)
          <form method="POST" action="../friendships">
            @csrf
            <input type="hidden" name="user" value={{$userRecord->id}} />
    				@if(! \Auth::User()->hasSentFriendRequestTo(App\User::find($userRecord->id)) && ! \Auth::User()->isFriendWith(App\User::find($userRecord->id)))
    					<button type="submit">Add Friend</button>
    				@endif
          </form>
        @endif
      @endif
    @endif
  	<p><strong>Email:</strong> {{ $userRecord->email }}</p>
  	<p><strong>Major:</strong> {{ $userRecord->major }}</p>
  	<p><strong>Minor:</strong>  {{ $userRecord->minor }}</p>
  	<p><strong>Bio:</strong></p>
      <div class="card" style="max-width:20%;">
        <div class="card-body">
          {{ $userRecord->bio }}
        </div>
      </div>
      <br>
  	<p><strong>Tags</strong></p>
  	@if($interests)
  	<ul>
    	@foreach($interests as $interest)
    		<li>{{ $interest }}  &#x2611;</li>
    	@endforeach
  	@endif
	  </ul>
  <br>
  <br>
    <p><strong>Enrolled Courses</strong></p>
    @if($enrollments)
    <ul>
      @foreach($enrollments as $enrollment)
        <li><a href="{{action('SearchController@courses', ['department' => 'cmpt', 'number' => $enrollment])}}">CMPT {{ $enrollment }}</a></li>
      @endforeach
    @endif
    </ul>
  <?php
    // Do we assume that users' git ids are the same as their emails?
    $user_id = $userRecord->github;
    if ($user_id != null)
    {
      echo "<br><br><p><strong>Github repository</strong></p>";
      $url = "https://api.github.com/users/".$user_id."/repos";
      try
      {
        # https://stackoverflow.com/questions/37141315/file-get-contents-gets-403-from-api-github-com-every-time
        $result = json_decode(file_get_contents($url, false, stream_context_create(['http' => ['method' => 'GET', 'header' => ['User-Agent: PHP']]])));
        if(!empty($result))
        {
          echo "<ul>";
          foreach($result as $repo)
          {
            echo "<li><a href={$repo->html_url} target='_blank'>{$repo->name}</a></li>";
          }
          echo "</ul>";
        }
        else
        {
          echo "No Repo";
        }
      }
      catch (Exception $e)
      {
        //echo "Error: ".$e;
      }
    }
  ?>
  @if($userRecord->linkedin != null)
    @if (filter_var($userRecord->linkedin, FILTER_VALIDATE_URL) === FALSE)
      <p>LinkedIn ID: {{$userRecord->linkedin}}</p>
    @else
      <br><br><p><a href={{$userRecord->linkedin}} target="_blank">LinkedIn Profile</a></p>
    @endif
  @endif
  <br>
  <br>
  @if(!Auth::guard('admin')->check())
    @if(Auth::user() && Auth::user()->id == $userRecord->id)
    <a href="{{ action("UserController@edit", ["id" => $userRecord->id]) }}">
      <button type="button" class="btn btn-success">Edit Profile</button>
    </a>
    @endif
  @else
  <a href="{{ action("UserController@edit", ["id" => $userRecord->id]) }}">
    <button type="button" class="btn btn-success">Edit Profile</button>
  </a>
  @endif
@endsection
