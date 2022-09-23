<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/leaflet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/special-view.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
    @stack('front-css')
</head>
<body>

<div class="wrapper">
    <x-frontend.header/>
    @yield('content')
    <x-frontend.footer />
</div>

<script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/fancybox.umd.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/leaflet.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/special-view.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@stack('front-js')
</body>
</html>
