@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Riwayat pelaporan
    </div>
    <div class="card-body">
  <section class="section dashboard">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="w-100">
            <thead>
              <tr>
                <th class="cell">Nik</th>
                <th class="cell">Nama</th>
                <th class="cell">Jenis Kelamin</th>
                <th class="cell">Tanggal Lahir</th>
                <th class="cell">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dataWarga as $data)
              <tr>
                <td class="cell">{{ $data->nik }}</td>
                <td class="cell">{{ $data->nama }}</td>
                <td class="cell">
                    @if($data->jenis_kelamin == 'P')
                        Perempuan
                    @else
                        Laki-laki
                    @endif
                </td>
                <td class="cell">{{ $data->tanggal_lahir }}</td>
                <td class="cell">
                {{--
                <!--   <form action="{{ route('pelaporan.destroy', $pelaporan->id_pelaporan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelaporan ini?');"> -->
                <!--     @csrf -->
                <!--     @method('DELETE') -->
                <!--     <button class="btn btn-sm btn-danger" type="submit" -->
                <!--                 data-bs-toggle="tooltip" -->
                <!--                 data-bs-placement="top" -->
                <!--                 title="Hapus laporan" -->
                <!--     > -->
                <!--       <i class="bi bi-trash"></i> -->
                <!--     </button> -->
                <!--   </form> -->
                --}}
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

@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home/Data Warga</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Data Warga</h2>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Daftar Warga</div>
                        <a href="{{ route('datawarga.create') }}" class="btn btn-primary float-right">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>No. KK</th>
                                    <th>Nama</th>
                                    <th>Alamat Rumah</th>
                                    <th>RT</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Status Pernikahan</th>
                                    <th>Status Penduduk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{$i = 1}}; 
                                @foreach ($dataWarga as $index => $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->no_kk }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat_rumah }}</td>
                                    <td>{{ $item->RT }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->Agama }}</td>
                                    <td>{{ $item->tanggal_lahir }}</td>
                                    <td>{{ $item->tempat_lahir}}</td>
                                    <td>{{ $item->pendidikan }}</td>
                                    <td>{{ $item->pekerjaan }}</td>
                                    <td>{{ $item->status_pernikahan }}</td>
                                    <td>{{ $item->status_penduduk }}</td>
                                    <td>
                                        <!-- Form Delete -->
                                        <a href="{{ route('datawarga.edit', $item->nik) }}"
                                            class="btn btn-warning btn-sm">Ubah</a>
                                        <!-- Form Delete -->
                                        <form action="{{ route('datawarga.destroy', $item->nik) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?');"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>No. KK</th>
                                <th>Nama</th>
                                <th>Alamat Rumah</th>
                                <th>RT</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Pendidikan</th>
                                <th>Pekerjaan</th>
                                <th>Status Pernikahan</th>
                                <th>Status Penduduk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataWarga as $index => $item)
                            <tr>
                                {{$i = 1}};
                                <td>{{$i++}}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->no_kk }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat_rumah }}</td>
                                <td>{{ $item->RT }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->Agama }}</td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->tempat_lahir}}</td>
                                <td>{{ $item->pendidikan }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>{{ $item->status_pernikahan }}</td>
                                <td>{{ $item->status_penduduk }}</td>
                                <td>
                                    <!-- Form Delete -->
                                    <a href="{{ route('datawarga.edit', $item->nik) }}"
                                        class="btn btn-warning btn-sm">Ubah</a>
                                    <!-- Form Delete -->
                                    <form action="{{ route('datawarga.destroy', $item->nik) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?');"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section> --}}
</main><!-- End #main -->
@endsection