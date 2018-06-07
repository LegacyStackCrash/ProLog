<nav class="light-blue darken-2" role="navigation">

    <ul id="user-dropdown" class="dropdown-content">
        <li><a href="/user/settings">Settings</a></li>
        <li class="divider"></li>
        <li><a href="/logout">Log Out</a></li>
    </ul>

    <div class="row nav-wrapper">
        <div class="col s12">
            <a id="logo-container" href="/home" class="brand-logo">ProLog</a>

            @if (Auth::check())
                <ul class="right hide-on-med-and-down">
                    <li class="{{ Request::segment(1) == 'users' ? 'active' : '' }}"><a href="/users">Users</a></li>
                    <li class="{{ Request::segment(1) == 'departments' ? 'active' : '' }}"><a href="/departments">Departments</a></li>
                    <li class="{{ Request::segment(1) == 'customers' ? 'active' : '' }}"><a href="/customers">Customers</a></li>
                    <li class="{{ Request::segment(1) == 'projects' ? 'active' : '' }}"><a href="/projects">Projects</a></li>
                    <li class="{{ Request::segment(1) == 'issues' ? 'active' : '' }}"><a href="/issues">Issues</a></li>
                    {{--<li><a href="/logout">Log Out</a></li>--}}
                    <li><a class="dropdown-trigger" href="#!" data-target="user-dropdown">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/home">Home</a></li>
                    <li class="divider"></li>
                    <li class="{{ Request::segment(1) == 'users' ? 'active' : '' }}"><a href="/users">Users</a></li>
                    <li class="{{ Request::segment(1) == 'departments' ? 'active' : '' }}"><a href="/departments">Departments</a></li>
                    <li class="{{ Request::segment(1) == 'customers' ? 'active' : '' }}"><a href="/customers">Customers</a></li>
                    <li class="{{ Request::segment(1) == 'projects' ? 'active' : '' }}"><a href="/projects">Projects</a></li>
                    <li class="{{ Request::segment(1) == 'issues' ? 'active' : '' }}"><a href="/issues">Issues</a></li>
                    <li class="divider"></li>
                    <li><a href="/user/settings">Settings</a></li>
                    <li><a href="/logout">Log Out</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            @endif
        </div>
    </div>
</nav>