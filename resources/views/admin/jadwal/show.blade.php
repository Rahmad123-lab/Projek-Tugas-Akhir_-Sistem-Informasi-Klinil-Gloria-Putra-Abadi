@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Detail Dokter</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama Dokter</label>
                    <input type="text" name="nama" class="form-control" value="{{ $dokter->nama }}" readonly>
                </div>
                <div class="form-group">
                    <label for="spesialisasi">Spesialisasi</label>
                    <input type="text" name="spesialisasi" class="form-control" value="{{ $dokter->spesialisasi }}" readonly>
                </div>
                <a href="{{ route('admin.dokter.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
