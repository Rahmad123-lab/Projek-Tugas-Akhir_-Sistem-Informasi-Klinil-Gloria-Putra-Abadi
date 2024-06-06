@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rekam Medis Pasien</h1>
    <p class="mb-4">Update Rekam Medis Pasien</p>
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Rekam Medis Pasien</h6>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pasien.update', $model->id) }}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $model->nama_pasien }}" disabled>
            <input type="hidden" name="nama_pasien" value="{{ $model->nama_pasien }}">
          </div>
          <div class="form-group">
            <label for="alamat_pasien">Alamat Pasien</label>
            <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" value="{{ $model->alamat_pasien }}" disabled>
            <input type="hidden" name="alamat_pasien" value="{{ $model->alamat_pasien }}">
          </div>
          <div class="form-group">
            <label for="dokter_id">Nama Dokter</label>
            <input type="text" class="form-control" id="dokter_nama" value="{{ $model->dokter->nama_dokter }}" disabled>
            <input type="hidden" id="dokter_id" name="dokter_id" value="{{ $model->dokter_id }}">
          </div>
          <div class="form-group">
            <label for="keluhan_pasien">Keluhan</label>
            <textarea class="form-control" id="keluhan_pasien" rows="3" name="keluhan_pasien">{{ $model->keluhan_pasien }}</textarea>
          </div>
          <div class="form-group">
            <label for="diagnosa_pasien">Diagnosa</label>
            <textarea class="form-control" id="diagnosa_pasien" rows="3" name="diagnosa_pasien">{{ $model->diagnosa_pasien }}</textarea>
          </div>
          <div class="form-group">
            <label for="obat_id">Obat</label>
            <select class="form-control" id="obat_id" name="obat_id">
              @foreach ($obats as $obat)
                <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-info">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End of Main Content -->
@endsection
