@if(isset($validation))
    {{--Validation Js--}}
    <script src="{{ asset('assets/vendars/validation-engine-master/js/languages/jquery.validationEngine-en.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendars/validation-engine-master/js/jquery.validationEngine.js') }}" type="text/javascript"></script>
    <script>
        $("#dash-form").validationEngine(); // Validation
    </script>
@endif

@if(isset($datatables))
    {{--datatables Js--}}
    <script src="{{ asset('assets/vendars/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendars/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendars/DataTables/Responsive-2.2.5/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendars/DataTables/Responsive-2.2.5/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
@endif

@if(isset($datatables_button))
    {{--datatables Buttons js--}}
    <script src="{{ asset('assets/vendars/DataTables/Buttons-1.6.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendars/DataTables/Buttons-1.6.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendars/DataTables/Buttons-1.6.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendars/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendars/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendars/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendars/DataTables/Buttons-1.6.2/js/buttons.print.min.js') }}"></script>
@endif

