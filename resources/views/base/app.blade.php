<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>{{ $pageTitle }} | {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/materialize.min.css') }}" rel="stylesheet"  media="screen,projection"/>
    <link type="text/css"  href="{{ asset('css/font-awesome.min.') }}" rel="stylesheet" >

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="white">
    <ul id="slide-out" class="side-nav fixed red-darken-1 white-text">
        <li class="red-darken-1 nav-header z-depth-3">
            <a href="/" class="app-logo-side"><img src="{{ asset('img/logo-inverse.svg') }}" alt="{{ config('app.name', 'Laravel') }}"></a>
        </li>
        <li>
            <a href="#"><span class="fa fa-graduation-cap" aria-hidden="true"></span> Item 1</a>
        </li>
        <li>
            <a href="#"><span class="fa fa-graduation-cap" aria-hidden="true"></span> Item 2</a>
        </li>
    </ul>
    <header>

        <div class="navbar-fixed">
            <nav class="white z-depth-3"">
                <div class="nav-wrapper">
                <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <a href="/" class="app-logo-top hide-on-large-only">
                    <img src="{{ asset('img/logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <ul class="right">
                    <li><a href="#">Hello {{ Auth::user()->first_name }}</a></li>
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
    <main>
        @include('components.status')
        @yield('content')
    </main>
</body>
</html>
