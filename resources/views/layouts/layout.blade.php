<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            @yield('dashboard-page-title')
        @endif
    </title>
    {{-- Styles --}}
    {{-- Google Font: Source Sans Pro --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- Tempusdominus Bbootstrap 4 --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    {{-- iCheck --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    @yield('extra-style')
</head>
    @yield('body')

    {{-- Scripts --}}
    {{-- jQuery --}}
    {{--<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>--}}
    <script src="{{ asset('assets/vendars/DataTables/jQuery-3.3.1/jquery-3.3.1.min.js') }}"></script>
    {{-- jQuery UI 1.11.4 --}}
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    {{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    {{-- Bootstrap 4 --}}
     <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('extra-script')
</html>
