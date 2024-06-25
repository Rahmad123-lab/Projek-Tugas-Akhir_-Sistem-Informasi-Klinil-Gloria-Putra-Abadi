@extends('layouts.main')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Jadwal Dokter</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Card Container -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Button to Add Schedule -->
                <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary">Tambah Jadwal Dokter</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Dokter</th>
                                <th>Spesialisasi</th>
                                <th>Hari</th>
                                <th>Jam Praktek</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalDokter as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->nama_dokter }}</td>
                                    <td>{{ $jadwal->spesialisasi }}</td>
                                    <td>{{ $jadwal->hari }}</td>
                                    <td>{{ $jadwal->jam_praktek }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal dokter ini?')">Hapus</button>
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
@endsection
