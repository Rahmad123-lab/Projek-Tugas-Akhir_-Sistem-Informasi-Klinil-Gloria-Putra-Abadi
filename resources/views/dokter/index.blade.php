@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Begin Page Content -->
  <div class="container-fluid mt-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Pasien</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien sdsaAnda</h6>
        <br>
      </div>
      <div class="card-body">
        @if($perjanjian->isEmpty())
          <div class="alert alert-info">
            Anda Belum memiliki Pasien.
          </div>
        @else
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama Pasien</th>
                  <th>Nama Dokter</th>
                  <th>Spesialisasi Dokter</th>
                  <th>Waktu Perjanjian</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($perjanjian as $perjanjianItem)
                  <tr>
                    <td>{{ $perjanjianItem->nama_pasien }}</td>
                    <td>{{ $perjanjianItem->nama_dokter }}</td>
                    <td>{{ $perjanjianItem->dokter->spesialisasi_dokter }}</td>
                    <td>{{ $perjanjianItem->waktu_perjanjian }}</td>
                    <td>
                      @if(Auth::user()->role == 'apoteker')
                        <a href="{{ route('pasien.show', $perjanjianItem->id) }}" class="btn btn-success">Info</a>
                      @elseif(Auth::user()->role =='admin')
                        <a href="{{ route('pasien.show', $perjanjianItem->id) }}" class="btn btn-success">Info</a>
                      @else
                        <a href="{{ route('pasien.edit', $perjanjianItem->id) }}" class="btn btn-warning">Periksa</a>
                        <a href="{{ route('pasien.show', $perjanjianItem->id) }}" class="btn btn-success">Info</a>
                        <form action="{{ route('pasien.destroy', $perjanjianItem->id) }}" method="post">
                          @method('delete')
                          @csrf
                          <button onclick="return confirm('apakah kamu ingin hapus rekam medis ini?')" class="btn btn-danger d-block" type="submit">Hapus</button>
                        </form>
                      @endif
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
