<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mice Hospitality')</title>
    <meta name="description" content="@yield('meta_description', 'Mice Hospitality')">
    <meta name="keywords" content="@yield('meta_keyword', 'Mice Hospitality')">
    <link rel="canonical" href="{{url()->current()}}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/ea7ddb5d7494a908841148edd6a30015?family=Adelle+Sans" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}" />
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}" />
    <!-- Google tag (gtag.js) -->
    @livewireStyles
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W3C2TY74ME"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-W3C2TY74ME');

    </script>
    @yield('styles')

</head>

<body>
    <div class="container-fluid">
        <!-- Naivgation part -->

        @yield('content')

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    @yield('scripts')
    
    @livewireScripts
</body>

</html>
