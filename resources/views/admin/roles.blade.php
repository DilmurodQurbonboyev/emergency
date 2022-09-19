<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @stack('css')
    <title>{{ MessageService::tr('Select Role') }}</title>
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
    <aside class="main-sidebar sidebar-dark-primary">
        <a class="brand-link">
            <img src="{{ asset('img/gerb.png') }}" alt="uz">
            <span class="brand-text">
                    {{ MessageService::tr("Laravel Dashboard") }}
                </span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>{{ MessageService::tr('Dashboard') }}</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ MessageService::tr('Select Role') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('setRole') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label"
                                               for="authority_id"></label>
                                        <select class="form-control select2" name="authority_id" id="authCode"
                                                aria-required="true">
                                            @foreach ($authorities as $authority)
                                                <option value="{{ $authority->id }}">
                                                    {{ $authority->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-success">{{ MessageService::tr('Save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/tinymce.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>

<script src="{{ asset('js/admin.js') }}"></script>

</body>

</html>
