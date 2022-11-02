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
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
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
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/special-view.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@stack('front-js')
<script>
    $(".select2").select2({
        theme: 'bootstrap4',
    });
    @if (Session::has('success_save'))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{ Session::get('success_save')  }}",
        showConfirmButton: true,
    })
    @endif
    @if (Session::has('error'))
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: "{{ Session::get('error') }}",
        showConfirmButton: true,
    })
    @endif
    @if (session()->has('not_checked_status'))
    Swal.fire({
        position: 'center',
        icon: 'info',
        title: "{{ session()->get('not_checked_status') }}",
        showConfirmButton: true,
    })
    @endif
    @if (session()->has('success_status'))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{ session()->get('success_status') }}",
        showConfirmButton: true,
    })
    @endif
    @if (session()->has('reject_status'))
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: "{{ session()->get('reject_status') }}",
        showConfirmButton: true,
    })
    @endif
    @if (session()->has('not_found_status'))
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: "{{ session()->get('not_found_status') }}",
        showConfirmButton: true,
    })
    @endif
</script>
</body>
</html>
