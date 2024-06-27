@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
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
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h3 text-gray-800">Buat Perjanjian dengan Dokter sebelum konsultasi</h1>
      <a href="{{ route('pasien.create') }}" class="btn btn-primary font-weight-bold">
        + Buat Janji
      </a>
    </div>

    <!-- Conditionally Render Filter Buttons Section -->
    @if(!$pasiens->isEmpty())
      <div class="mb-4 d-flex">
        <a href="{{ route('pasien.index', ['filter' => 'semua']) }}" class="btn btn-primary font-weight-bold mr-2">Semua</a>
        <a href="{{ route('pasien.index', ['filter' => 'selesai']) }}" class="btn btn-success font-weight-bold mr-2">Selesai</a>
        <a href="{{ route('pasien.index', ['filter' => 'batal']) }}" class="btn btn-danger font-weight-bold">Batal</a>
      </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        @if($pasiens->isEmpty())
          <div class="alert alert-info">
              Anda Belum memiliki Riwayat berobat.
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
                @foreach ($pasiens as $pasien)
                  <tr>
                    <td>{{ $pasien->nama_pasien }}</td>
                    <td>{{ $pasien->nama_dokter }}</td>
                    <td>{{ $pasien->dokter->spesialisasi_dokter }}</td>
                    <td>{{ $pasien->waktu_perjanjian }}</td>
                    <td>
                      <span>
                        <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-success">Info</a>
                      </span>
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
