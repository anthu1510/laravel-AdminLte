@if(isset($validation))
    {{--Validation Css--}}
    <link href="{{ asset('assets/vendars/validation-engine-master/css/validationEngine.jquery.css') }}" rel="stylesheet" media="all">
@endif

@if(isset($datatables))
    {{--datatables css--}}
    <link href="{{ asset('assets/vendars/DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/vendars/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" media="all">
@endif

@if(isset($datatables_button))
    {{--datatables Buttons css--}}
    <link rel="stylesheet" href="{{ asset('assets/vendars/DataTables/Buttons-1.6.2/css/buttons.dataTables.min.css') }}">
@endif
