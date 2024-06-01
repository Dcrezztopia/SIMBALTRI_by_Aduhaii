@extends('layout.app')

@section('content_body')
  <!-- <nav> -->
  <!--   <ol class="breadcrumb"> -->
  <!--     <li class="breadcrumb-item active">Home/Pengajuan Surat/ Pengajuan Surat</li> -->
  <!--   </ol> -->
  <!-- </nav> -->
  <div class="container">
    <div class="card">
        <div class="card-header lin-gradient" id="umumHeading">
        Riwayat Permohonan Surat
        </div>
        <div class="card-body">
        {{ $dataTable->table(['style' => 'width: 100%']) }}
        </div>
    </div>
  </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
