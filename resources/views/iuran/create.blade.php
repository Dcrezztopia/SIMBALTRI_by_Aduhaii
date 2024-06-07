@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Tambah Iuran Warga
    </div>
    <div class="card-body">
                        <form method="post" action="{{ route('iuran.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="id_kegiatan">Kegiatan</label>
                                <select class="form-control" id="id_kegiatan" name="id_kegiatan" required>
                                    <option value="" disabled selected>Pilih Kegiatan</option>
                                    @foreach ($kegiatanWarga as $kegiatan)
                                        <option value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->nama_kegiatan }}</option>
                                    @endforeach
                                </select>
                                @error('id_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <input type="date" class="form-control" id="periode" name="periode" value="{{ old('periode') }}" required>
                                @error('periode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="interval">Interval</label>
                                <input type="number" class="form-control" id="interval" name="interval" value="{{ old('interval') }}" required>
                                @error('interval')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penanggung_jawab">Penanggung Jawab</label>
                                <select class="form-control" id="penanggung_jawab" name="penanggung_jawab" required>
                                    <option value="" disabled selected>Pilih Penanggung Jawab</option>
                                    @foreach ($data_warga as $warga)
                                        <option value="{{ $warga->nik }}">{{ $warga->nama }}</option>
                                    @endforeach
                                </select>
                                @error('penanggung_jawab')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="number" class="form-control" id="total" name="total" value="{{ old('total') }}" required>
                                @error('total')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary text-light">Simpan</button>
                                <a href="{{ route('iuran.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
    </div>
</div>
@endsection
