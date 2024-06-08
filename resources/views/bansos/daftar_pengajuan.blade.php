@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Riwayat Pengajuan Bansos
    </div>
    <div class="card-body">
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <th class="cell identifier">ID</th>
                                    <th class="cell identifier">Nama</th>
                                    <th class="cell identifier">NIK</th>
                                    <th class="cell identifier">No. KK</th>
                                    <th class="cell identifier">Kondisi Rumah</th>
                                    <th class="cell identifier">Luas Rumah</th>
                                    <th class="cell identifier">Status Pernikahan</th>
                                    <th class="cell identifier">Pekerjaan</th>
                                    <th class="cell identifier">Jumlah Tanggungan</th>
                                    <th class="cell identifier">Jumlah Pendapatan</th>
                                    <th class="cell identifier">Tagihan Listrik</th>
                                    <th class="cell identifier">Tagihan Air</th>
                                    <th class="cell identifier">Tanggal Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengajuan_bansos as $pengajuan)
                                <tr>
                                    <td class="cell">{{ $pengajuan->id_pBansos }}</td>
                                    <td class="cell">{{ $pengajuan->nama }}</td>
                                    <td class="cell">{{ $pengajuan->nik }}</td>
                                    <td class="cell">{{ $pengajuan->no_kk }}</td>
                                    <td class="cell">{{ $pengajuan->kondisi_rumah }}</td>
                                    <td class="cell">{{ $pengajuan->luas_rumah }}</td>
                                    <td class="cell">{{ $pengajuan->status_pernikahan }}</td>
                                    <td class="cell">{{ $pengajuan->pekerjaan }}</td>
                                    <td class="cell">{{ $pengajuan->jml_tanggungan }}</td>
                                    <td class="cell">{{ $pengajuan->jml_pendapatan }}</td>
                                    <td class="cell">{{ $pengajuan->tag_listrik }}</td>
                                    <td class="cell">{{ $pengajuan->tag_air }}</td>
                                    <td class="cell">{{ $pengajuan->created_at }}</td>
                                </tr>
                                @endforeach
                                <!-- Akhir data tabel -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
