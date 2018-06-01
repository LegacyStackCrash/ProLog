<nav class="light-blue darken-2" role="navigation">
    <div class="row nav-wrapper">
        <div class="col s12">
            <a id="logo-container" href="/home" class="brand-logo">ProLog</a>

            @if (Auth::check())
                <ul class="right hide-on-med-and-down">
                    <li><a href="/users">Users</a></li>
                    <li><a href="/departments">Departments</a></li>
                    <li><a href="/customers">Customers</a></li>
                    <li><a href="/projects">Projects</a></li>
                    <li><a href="/issues">Issues</a></li>
                    <li><a href="/logout">Log Out</a></li>
                </ul>

                <ul id="nav-mobile" class="sidenav">
                    <li><a href="/home">Home</a></li>
                    <li><a href="/users">Users</a></li>
                    <li><a href="/departments">Departments</a></li>
                    <li><a href="/customers">Customers</a></li>
                    <li><a href="/projects">Projects</a></li>
                    <li><a href="/issues">Issues</a></li>
                    <li><a href="/logout">Log Out</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            @endif
        </div>
    </div>
</nav>