<style>
    .navigation-menu li {
        float: left;
        display: inline;
        margin: 0px 10px 0px 10px;
    }
</style>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="nav-link text-light" href="/" >Home</a>
    @guest
        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
        <a class="nav-link text-light" href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a>
        @if (Route::has('register'))
          <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    @else
        Create a Meetup
        <a class="nav-link text-light" href="/users/{{Auth::user()->id}}">Profile</a>
        <a class="nav-link text-light" href="/friendships">Friendships</a>
        <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</ul>
</nav>
