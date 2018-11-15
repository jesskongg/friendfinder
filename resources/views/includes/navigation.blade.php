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
        <li>
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li>
            <a href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a>
        </li>
        <li>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </li>
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
<<<<<<< HEAD
</ul>
=======
</nav>
>>>>>>> 24e96344d89d3dfec9db73fae6d5bc8136ca47c4
