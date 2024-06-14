@extends('layout.app')
{{-- Setup data for datatables --}}
@section('content_body')
    <div class="card">
        <div class="card-header lin-gradient-light-primary text-dark">
            Status Penerima Bansos
        </div>
        <div class="card-body text-center">
            @if(!isset($termasuk_penerima_bansos) && ($termasuk_penerima_bansos->isEmpty() || $termasuk_penerima_bansos == null))
            <h3>
                Pengajuan bansos anda lolos.
            </h3>
            @else
            <h3>
                Anda tidak termasuk dalam penerima bantuan sosial.
            </h3>
            @endif
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
