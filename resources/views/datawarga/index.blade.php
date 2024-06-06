
@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Data Warga

    </div>
    <div class="card-body pa-5">
        <table id="theTable">
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var dataUser = $('#theTable').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('level/list') }}",
                    "dataType": "json",
                    "type": "POST",
                },
                columns: [
                    {
                        data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "level_id",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "level_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "level_kode",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable:false
                    }
                ]
            });
        });
    </script>
@endpush
