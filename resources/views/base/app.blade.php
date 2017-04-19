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
        <link type="text/css" href="{{ asset('css/font-awesome.min.') }}" rel="stylesheet" >
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

        @include('component.sidenav')
        @include('component.topnav')
        <main>
            @include('component.status')
            @yield('content')
        </main>
    </body>
</html>
