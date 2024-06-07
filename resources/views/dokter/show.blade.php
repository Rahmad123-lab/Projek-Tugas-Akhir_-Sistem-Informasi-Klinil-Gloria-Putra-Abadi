@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid mt-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rekam Pasien</h1>
    <p class="mb-4">Rekam Medis Sdr {{ $pasien->nama_pasien }}</p>
    <!-- Form Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <span>
          <a href="{{ route('dokter.index') }}" class="btn btn-primary font-weight-bold">
            Kembali
          </a>
        </span>
        <span>
          <a href="{{ route('generatePDF', $pasien->id) }}" class="btn btn-success font-weight-bold">
            Cetak Rekam Pasien
          </a>
        </span>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" class="form-control" id="nama_pasien" value="{{ $pasien->nama_pasien }}" readonly>
          </div>
          <div class="form-group">
            <label for="alamat_pasien">Alamat Pasien</label>
            <input type="text" class="form-control" id="alamat_pasien" value="{{ $pasien->alamat_pasien }}" readonly>
          </div>
          <div class="form-group">
            <label for="tanggal_berobat">Tanggal Berobat</label>
            <input type="text" class="form-control" id="tanggal_berobat" value="{{ $pasien->created_at->format('d/m/Y') }}" readonly>
          </div>
          <div class="form-group">
            <label for="keluhan">Keluhan</label>
            <input type="text" class="form-control" id="keluhan" value="{{ $pasien->keluhan_pasien }}" readonly>
          </div>
          <div class="form-group">
            <label for="diagnosa">Diagnosa</label>
            <input type="text" class="form-control" id="diagnosa" value="{{ $pasien->diagnosa_pasien }}" readonly>
          </div>
          <div class="form-group">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" class="form-control" id="nama_dokter" value="{{ $pasien->nama_dokter }}" readonly>
          </div>
          <div class="form-group">
            <label for="obat">Obat</label>
            <input type="text" class="form-control" id="obat" value="{{ $pasien->resep_obat }}" readonly>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
