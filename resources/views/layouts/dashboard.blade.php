@extends('layouts.layout')

@section('body')
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('dashboard.common.top-navbar')
            @include('dashboard.common.side-navbar')
            {{-- Content Wrapper. Contains page content --}}
            <div class="content-wrapper">
                {{-- Content Header (Page header) --}}
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">@yield('dashboard-page-title')</h1>
                            </div>{{-- /.col --}}
                           {{-- <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v1</li>
                                </ol>
                            </div>--}}{{-- /.col --}}
                        </div>{{-- /.row --}}
                    </div>{{-- /.container-fluid --}}
                </div>
                {{-- /.content-header --}}

                {{-- Main content --}}
                <section class="content">
                    <div class="container-fluid">
                        {{ \App\Http\Controllers\AlertController::displayAlert() }}
                       @yield('content')
                    </div>{{-- /.container-fluid --}}
                </section>
                {{-- /.content --}}
            </div>
            {{-- /.content-wrapper --}}
        </div>
    </body>
@endsection

@section('extra-style')
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{ asset('assets/themes/css/adminlte.min.css') }}">
    {{-- overlayScrollbars --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    @include('includes.plugins_css')

    @yield('sub-styles')
@endsection

@section('extra-script')
    {{-- overlayScrollbars --}}
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    {{-- AdminLTE App --}}
    <script src="{{ asset('assets/themes/js/adminlte.js') }}"></script>

    @include('includes.plugins_js')

    @yield('sub-scripts')
@endsection
