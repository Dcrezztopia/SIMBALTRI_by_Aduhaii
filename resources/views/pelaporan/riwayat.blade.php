@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Riwayat Pelaporan
    </div>
    <div class="card-body">
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <!-- <th class="cell">ID</th> -->
                                    <th class="cell">Nama</th>
                                    <!-- <th class="cell">Tanggal Lahir</th> -->
                                    <!-- <th class="cell">Jenis Kelamin</th> -->
                                    <!-- <th class="cell">Kewarganegaraan</th> -->
                                    <!-- <th class="cell">Alamat_Rumah</th> -->
                                    <th class="cell">Perihal</th>
                                    <th class="cell">Isi</th>
                                    <!-- <th class="cell">Foto Bukti</th> -->
                                    <th class="cell">Tanggal Dibuat</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pelaporans->isEmpty())
                                    <tr>
                                        <td class="cell text-center" colspan="6">Tidak ada data pelaporan</td>
                                    </tr>
                                @else
                                @foreach($pelaporans as $pelaporan)
                                <tr>
                                    <!-- <td class="cell">{{ $pelaporan->id_pelaporan }}</td> -->
                                    <td class="cell">{{ $pelaporan->nama }}</td>
                                    <!-- <td class="cell">{{ $pelaporan->tanggal_lahir }}</td> -->
                                    <!-- <td class="cell">{{ $pelaporan->jenis_kelamin }}</td> -->
                                    <!-- <td class="cell">{{ $pelaporan->kewarganegaraan }}</td> -->
                                    <!-- <td class="cell">{{ $pelaporan->alamat_rumah }}</td> -->
                                    <td class="cell">{{ $pelaporan->perihal }}</td>
                                    <td class="cell">{{ $pelaporan->isi }}</td>
                                    <!-- <td class="cell"> -->
                                    <!--   <img src="{{ Storage::url($pelaporan->foto_bukti) }}" alt="Foto Bukti" class="img-thumbnail" style="width: 150px; height: auto;"> -->
                                    <!-- </td> -->
                                    <td class="cell">{{ $pelaporan->created_at }}</td>
                                    <td class="cell">
                                        <a href="{{ route('pelaporan.detail', $pelaporan->id_pelaporan) }}"
                                            class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Lihat detail pelaporan">
                                            <i class="bi bi-eye"></i>
                                            Detail
                                        </a>
                                        @if($user->role == "sekretaris_rw" || $user->role == "sekretaris_rt")
                                        <a href="{{ route('pelaporan.edit', $pelaporan->id_pelaporan) }}"
                                            class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit pelaporan">
                                            <i class="bi bi-pencil"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('pelaporan.destroy', $pelaporan->id_pelaporan) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelaporan ini?');"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Hapus laporan">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Akhir data tabel -->
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
