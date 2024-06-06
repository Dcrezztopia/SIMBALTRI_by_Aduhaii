@extends('layout.app')
{{-- Setup data for datatables --}}
@section('content_body')
<div class="container">
    <div class="card">
        <div class="card-header lin-gradient-light-primary text-dark">Penerima Bansos</div>
        <div class="card-body">
            <div
            <!-- {{-- $dataTable->table(['style' => 'width: 100%']) --}} -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // alert('Hello World');
        });
    </script>
    <!-- {{-- $dataTable->scripts() --}} -->
@endpush

@push('css')
    <style>

#users-table {
  /* width: 80% !important; */
}
        /* .container { */
        /*     margin-top: 100px; */
        /*     margin-left: 300px !important; */
        /* } */
        /* #table1 { */
        /*     margin-top: 300px; */
        /*     margin-left: 200px; */
        /* } */
    </style>
@endpush
