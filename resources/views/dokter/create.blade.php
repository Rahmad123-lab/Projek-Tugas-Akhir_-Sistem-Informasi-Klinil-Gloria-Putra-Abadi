@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Pasien</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien Anda</h6>
      </div>
      <div class="card-body">
        @if($perjanjians->isEmpty())
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
                @foreach ($perjanjian as $data)
                  @if(in_array($data->spesialiasi_dokter, ['Poli Umum', 'Poli Anak', 'Poli Lansia']))
                    <tr>
                      <td>{{ $data->nama_pasien }}</td>
                      <td>{{ $data->nama_dokter }}</td>
                      <td>{{ $data->spesialiasi_dokter }}</td>
                      <td>{{ $data->waktu_perjanjian }}</td>
                      <td>
                        @if(Auth::user()->role == 'apoteker')
                          <span>
                            <a href="{{ route('pasien.show', $data->id) }}" class="btn btn-success">
                              Info
                            </a>
                          </span>
                        @elseif(Auth::user()->role == 'admin')
                          <span>
                            <a href="{{ route('pasien.show', $data->id) }}" class="btn btn-success">
                              Info
                            </a>
                          </span>
                        @else
                          <span>
                            <a href="{{ route('pasien.edit', $data->id) }}" class="btn btn-warning">
                              Edit
                            </a>
                          </span>
                          <span>
                            <a href="{{ route('pasien.show', $data->id) }}" class="btn btn-success">
                              Info
                            </a>
                          </span>
                          <form action="{{ route('pasien.destroy', $data->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <span>
                              <button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block" type="submit">Hapus</button>
                            </span>
                          </form>
                        @endif
                      </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->

  <!-- Begin Page Content for Adding New Patient -->
  <div class="container-fluid mt-5">
    <h1 class="h3 mb-2 text-gray-800">Tambah Pasien</h1>
    <p class="mb-4">Isi formulir pendaftaran berikut untuk menambahkan pasien baru</p>
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pasien Baru</h6>
      </div>
      <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="POST" action="{{ route('pasien.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" value="{{ old('nama_pasien') }}" required>
          </div>
          <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" placeholder="Umur" value="{{ old('umur') }}" required>
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}" required>
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
              <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="{{ old('telepon') }}" required>
          </div>
          <button type="submit" class="btn btn-info">Tambah</button>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
