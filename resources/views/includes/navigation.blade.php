<style>
    .navigation-menu li {
        float: left;
        display: inline;
        margin: 0px 10px 0px 10px;
    }
    .icon {
        width: 25px;
        height: 25px;
        vertical-align: middle;
        margin-right: 5px;
    }
</style>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="nav-link text-light" href="/"><img class='icon' src='/icon/home.png'>Home</a>
    @guest
        <a class="nav-link text-light" href="{{ route('login') }}"><img class='icon' src='/icon/login.png'>{{ __('Login') }}</a>
        <a class="nav-link text-light" href="{{ route('admin.login') }}"><img class='icon' src='/icon/login.png'>{{ __('Admin Login') }}</a>
        @if (Route::has('register'))
          <a class="nav-link text-light" href="{{ route('register') }}"><img class='icon' src='/icon/note.png'>{{ __('Register') }}</a>
        @endif
        <a class="nav-link text-light" href="/credits">Credits</a>
    @else
        <a class="nav-link text-light" href="/meetups"><img class='icon' src='/icon/meetup.png'>Meetups</a>
        <a class="nav-link text-light" href="/friendships"><img class='icon' src='/icon/friendship.png'>Friendships ( {{ count(Auth::user()->getFriendRequests()) }} )</a>
        <a class="nav-link text-light" href="/users/{{Auth::user()->id}}"><img class='icon' src='/icon/avatar.png'>Profile ( {{ Auth::user()->name }} )</a>
        <a class="nav-link text-light" href="/credits">Credits</a>
        <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img class='icon' src='/icon/logout.png'>{{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</ul>
</nav>
