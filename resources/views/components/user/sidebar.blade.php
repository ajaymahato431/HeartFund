<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('images/favicon/apple-touch-icon.png') }}"
                    class="header-logo" />
                <span class="logo-name" style="color: red">HeartFund</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('index') }}" class="nav-link"><i data-feather="home"></i><span>Home Page</span></a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <li class="dropdown">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i data-feather="log-out"></i>
                    <span>Log Out</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('profile.edit') }}" class="nav-link"><i data-feather="delete"></i><span>Delete
                        Account</span></a>
            </li>

        </ul>
    </aside>
</div>
