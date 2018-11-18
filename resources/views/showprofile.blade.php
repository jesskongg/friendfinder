@extends('layouts.app')

@section('content')
  	<h3>Profile: {{ $userRecord->name }} </h3>
    @if(isset(Auth::User()->id))
      @if(Auth::User()->id !== $userRecord->id)
        <form method="POST" action="../friendships">
          @csrf
          <input type="hidden" name="user" value={{$userRecord->id}} />
  				@if(! \Auth::User()->hasSentFriendRequestTo(App\User::find($userRecord->id)) && ! \Auth::User()->isFriendWith(App\User::find($userRecord->id)))
  					<button type="submit" class="btn btn-primary">Add Friend</button>
  				@endif
        </form>
      @endif
    @endif
  	<p>Email: {{ $userRecord->email }}<p>
  	<p>Major: {{ $userRecord->major }}<p>
  	<p>Minor: {{ $userRecord->minor }}<p>
  	<p>Bio: {{ $userRecord->bio }}<p>
  	<p>Tags</p>
  	@if($interests)
  	<ul>
    	@foreach($interests as $interest)
    		<li>{{ $interest }}  &#x2611;</li>
    	@endforeach
  	@endif
	  </ul>
  <br>
  <br>
    <p>Enrolled Courses</p>
    @if($enrollments)
    <ul>
      @foreach($enrollments as $enrollment)
        <li>{{ $enrollment }}</li>
      @endforeach
    @endif
    </ul>
  <?php
    // Do we assume that users' git ids are the same as their emails? 
    // No
    $user_id = $userRecord->github;
    if ($user_id != null)
    {
      echo "<br><br><p>Github repository</p>";
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
            echo "<li><a href = {$repo->html_url}>{$repo->name}</a></li>";
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
      <br><br><p><a href={{$userRecord->linkedin}}>LinkedIn Profile</a></p>
    @endif
  @endif
  <br>
  <br>
  @if (Auth::user() && Auth::user()->id == $userRecord->id)
    <button type="button" class="btn btn-primary">
      <a class="text-white" href="/users/{{Auth::user()->id}}/edit">Edit Profile</a>
    </button>
  @endif
@endsection
