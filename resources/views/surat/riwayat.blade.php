@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Riwayat Surat
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
                                    <!-- <th class="cell identifier">Tanggal Lahir</th> -->
                                    <!-- <th class="cell identifier">Kewarganegaraan</th> -->
                                    <!-- <th class="cell identifier">Pekerjaan</th> -->
                                    <!-- <th class="cell identifier">Alamat_Rumah</th> -->
                                    <th class="cell identifier">Kepentingan</th>
                                    <th class="cell identifier">Perihal</th>
                                    <th class="cell identifier">Tanggal_Dibuat</th>
                                    <th class="cell identifier">Status</th>
                                    <th class="cell identifier">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surats as $surat)
                                <tr>
                                    <td class="cell">{{ $surat->id_surat }}</td>
                                    <td class="cell">{{ $surat->nama }}</td>
                                    {{--
                                    <!-- <td class="cell">{{ $surat->tanggal_lahir }}</td> -->
                                    <!-- <td class="cell">{{ $surat->kewarganegaraan }}</td> -->
                                    <!-- <td class="cell">{{ $surat->pekerjaan }}</td> -->
                                    <!-- <td class="cell">{{ $surat->alamat_rumah }}</td> -->
                                    --}}
                                    <td class="cell">{{ $surat->kepentingan }}</td>
                                    <td class="cell">
                                        @if($surat->perihal == 'pengantar_domisili')
                                        Pengantar Domisili
                                        @else
                                        {{ $surat->perihal }}
                                        @endif
                                    </td>
                                    <td class="cell">{{ $surat->created_at }}</td>
                                    <td class="cell">
                                        @if($surat->status == 'menunggu')
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                        @elseif($surat->status == 'diterima')
                                        <span class="badge bg-success">Diterima</span>
                                        @elseif($surat->status == 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="cell">
                                        <form
                                            action="{{ route('surat.updateStatus', ['id' => $surat->id_surat, 'status' => 'diterima']) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-success" type="submit"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Terima surat untuk diproses">
                                                <i class="bi bi-check"></i>
                                            </button>
                                        </form>
                                        <form
                                            action="{{ route('surat.updateStatus', ['id' => $surat->id_surat, 'status' => 'ditolak']) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-danger" type="submit" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Tolak surat">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('surat.detail', $surat->id_surat) }}"
                                            class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                            title="Lihat detail surat">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('surat.edit', $surat->id_surat) }}"
                                            class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit surat">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('surat.destroy', $surat->id_surat) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?');"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Hapus surat">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
           
                         </td>

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