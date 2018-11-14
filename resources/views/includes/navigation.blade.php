<style>
    .navigation-menu li {
        float: left;
        display: inline;
        margin: 0px 10px 0px 10px;
    }
</style>
<ul class="navigation-menu">
    <li><a href="/" >Home</a></li>
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
        <li>Create a Meetup</li>
        <li>
            <a href="/users/{{Auth::user()->id}}">Profile</a>
        </li>
        <li>
            <a href="/friendships">Friendships</a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @endguest
</ul>
