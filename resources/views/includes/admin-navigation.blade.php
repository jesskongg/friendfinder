<style>
    .navigation-menu li {
        float: left;
        display: inline;
        margin: 0px 10px 0px 10px;
    }
</style>
<ul class="navigation-menu">
    <li><a href="/" >Admin Dashboard</a></li>
        <li>
            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                @csrf
            </form>
        </li>
</ul>
