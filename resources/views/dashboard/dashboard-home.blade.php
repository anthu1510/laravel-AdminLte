@extends('layouts.dashboard')

@section('content')
    @include('dashboard.common.widget')
@endsection

@section('sub-scripts')
    <!-- ChartJS -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/themes/js/pages/dashboard.js') }}"></script>
@endsection




