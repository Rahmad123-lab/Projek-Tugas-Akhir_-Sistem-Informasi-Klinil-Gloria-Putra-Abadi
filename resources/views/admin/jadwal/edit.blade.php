@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Jadwal Dokter</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.jadwal.update', $jadwalDokter->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_dokter">Nama Dokter</label>
                        <input type="text" name="nama_dokter" class="form-control" value="{{ $jadwalDokter->nama_dokter }}" required>
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Spesialisasi</label>
                        <input type="text" name="spesialisasi" class="form-control" value="{{ $jadwalDokter->spesialisasi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" name="hari" class="form-control" value="{{ $jadwalDokter->hari }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jam_praktek">Jam Praktek</label>
                        <input type="text" name="jam_praktek" class="form-control" value="{{ $jadwalDokter->jam_praktek }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
