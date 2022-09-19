<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/ico.png') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/leaflet/leaflet.css') }}">
    @stack('admin-css')
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    @yield('header')
                </div>
            </div>
        </div>
        <div class="content">
            @include('admin.layouts.alert')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/cropper.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('js/tinymce.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>

<script>
    flatpickr(".date", {});
</script>
<script>
    $('#lfm_oz').filemanager('file');
    $('#lfm_uz').filemanager('file');
    $('#lfm_ru').filemanager('file');
    $('#lfm_en').filemanager('file');
    $('#lfm2').filemanager('image');
    $('#lfm3').filemanager('image');
</script>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<script>
    @if (Session::has('success_save'))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{ MessageService::tr('Successfully saved') }}",
        showConfirmButton: true,
        // timer: 2500
    })
    @endif

    @if (Session::has('success_update'))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{ MessageService::tr('Successfully updated') }}",
        showConfirmButton: true,
        // timer: 2500
    })
    @endif

    @if (Session::has('error'))
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: "{{ Session::get('error') }}",
        showConfirmButton: true,
        // timer: 2500
    })
    @endif
</script>
<script>
    $('body').delegate('.saveBtn', 'click', function (event) {
        const submitButton = $(this);
        if (!submitButton.hasClass('disabled')) {
            let a = submitButton.html();
            submitButton.addClass('disabled');
            submitButton.html(
                "<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\"></span> " +
                a);

            setTimeout(() => {
                submitButton.removeClass('disabled');
                submitButton.html(a);
            }, 3000);
        } else {
            event.preventDefault();
        }
    });

    $('.deleteBtn').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: "{{ MessageService::tr('Are you sure') }} ?",
            text: "{{ MessageService::tr('This information will be deleted') }}!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: "{{ MessageService::tr('Delete') }}",
            cancelButtonText: "{{ MessageService::tr('Cancel') }}",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: "{{ MessageService::tr('Successfully deleted') }}",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        })
    });

    $('.forceDelete').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: "{{ MessageService::tr('Are you sure') }} ?",
            text: "{{ MessageService::tr('You can not restore this information') }}!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: "{{ MessageService::tr('Delete') }}",
            cancelButtonText: "{{ MessageService::tr('Cancel') }}",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: "{{ MessageService::tr('Successfully deleted') }}",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        })
    });

    $('.restore').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: "{{ MessageService::tr('Are you sure') }} ?",
            text: "{{ MessageService::tr('This information will be restored') }}!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: "{{ MessageService::tr('Restore') }}",
            cancelButtonText: "{{ MessageService::tr('Cancel') }}",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: "{{ MessageService::tr('Successfully restored') }}",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        })
    });
</script>
@stack('admin-js')
@livewireScripts
</body>

</html>
