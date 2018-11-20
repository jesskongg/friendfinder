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
        @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    @else
        <a class="nav-link text-light" href="/meetups">Meetups</a>
        <a class="nav-link text-light" href="/users/{{Auth::user()->id}}">Profile</a>
        <a class="nav-link text-light" href="/friendships">Friendships</a>
       
        <a class="nav-link text-light"href="/messages">Messages @include('messenger.unread-count')</a>
        <a class="nav-link text-light"href="/messages/create">Create New Message</a>

        <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</nav>