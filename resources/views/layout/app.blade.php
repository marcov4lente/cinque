<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>{{ $pageTitle }} | {{ config('app.name', 'Laravel') }}</title>
    <!-- Mets -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/materialize.min.css') }}" rel="stylesheet"  media="screen,projection"/>
    <link type="text/css"  href="{{ asset('css/font-awesome.min.') }}" rel="stylesheet" >
    <!-- Scripts -->
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
    <div class="navbar-fixed white">
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo"><img src="{{ asset('img/shopx-logo.png') }}" alt="ShopX"> >> {{ $pageTitle }}</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="badges.html">Login</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>
