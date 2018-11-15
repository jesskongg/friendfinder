<style>
    .navigation-menu li {
        float: left;
        display: inline;
        margin: 0px 10px 0px 10px;
    }
</style>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="nav-link text-light" href="/" >Admin Dashboard</a>
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
        <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</ul>
</nav>
