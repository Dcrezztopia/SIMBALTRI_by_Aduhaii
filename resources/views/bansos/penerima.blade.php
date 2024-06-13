@extends('layout.app')
{{-- Setup data for datatables --}}
@section('content_body')
<div class="container">
    <div class="card">
        <div class="card-header lin-gradient-light-primary text-dark">
            Penerima Bansos
        </div>
        <div class="card-body">
            <table class="w-100">
                <thead>
                    <tr>
                        <!-- <th class="cell identifier">ID</th> -->
                        <th class="cell identifier">Nama</th>
                        <th class="cell identifier">NIK</th>
                        <th class="cell identifier">No. KK</th>
                        <!-- <th class="cell identifier">Kondisi Rumah</th> -->
                        <!-- <th class="cell identifier">Luas Rumah</th> -->
                        <!-- <th class="cell identifier">Status Pernikahan</th> -->
                        <!-- <th class="cell identifier">Pekerjaan</th> -->
                        <!-- <th class="cell identifier">Jumlah Tanggungan</th> -->
                        <!-- <th class="cell identifier">Jumlah Pendapatan</th> -->
                        <!-- <th class="cell identifier">Tagihan Listrik</th> -->
                        <!-- <th class="cell identifier">Tagihan Air</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($penerima_bansos as $penerima)
                    <tr>
                        <!-- <td class="cell">{{ $penerima->id_pBansos }}</td> -->
                        <td class="cell">{{ $penerima->pengajuan->nama }}</td>
                        <td class="cell">{{ $penerima->nik }}</td>
                        <td class="cell">{{ $penerima->no_kk }}</td>
                        <!-- <td class="cell">{{ $penerima->kondisi_rumah }}</td> -->
                        <!-- <td class="cell">{{ $penerima->luas_rumah }}</td> -->
                        <!-- <td class="cell">{{ $penerima->status_pernikahan }}</td> -->
                        <!-- <td class="cell">{{ $penerima->pekerjaan }}</td> -->
                        <!-- <td class="cell">{{ $penerima->jml_tanggungan }}</td> -->
                        <!-- <td class="cell">{{ $penerima->jml_pendapatan }}</td> -->
                        <!-- <td class="cell">{{ $penerima->tag_listrik }}</td> -->
                        <!-- <td class="cell">{{ $penerima->tag_air }}</td> -->
                    </tr>
                    @endforeach
                    <!-- Akhir data tabel -->
                </tbody>
            </table>
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
