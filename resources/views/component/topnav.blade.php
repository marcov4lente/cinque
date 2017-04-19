<header>
    <div class="navbar-fixed">
        <nav class="white z-depth-3"">
            <div class="nav-wrapper">
            <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <a href="/" class="app-logo-top hide-on-large-only">
                <img src="{{ asset('img/logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}">
            </a>
            <ul class="right">
                <li><a href="#">Hello USER</a></li>
                <li>
                    <a href="{{ url('/logout') }}" class="btn white-text"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            </div>
        </nav>
    </div>
</header>
