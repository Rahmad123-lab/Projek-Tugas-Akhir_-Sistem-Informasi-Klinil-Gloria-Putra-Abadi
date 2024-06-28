@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Content Here -->
  </nav>
  <!-- End of Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Perjanjian</h1>
    <p class="mb-4">Daftar semua perjanjian yang telah dibuat.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Perjanjian</h6>
      </div>
      <div class="card-body">
        @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif

        @if ($perjanjian->isEmpty())
          <p>Belum ada perjanjian yang dibuat.</p>
        @else
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pasien</th>
                  <th>Nama Dokter</th>
                  <th>Waktu Perjanjian</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($perjanjian as $index => $item)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_pasien }}</td>
                    <td>{{ $item->nama_dokter }}</td>
                    <td>{{ $item->waktu_perjanjian }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                      <a href="{{ route('admin.perjanjian.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
