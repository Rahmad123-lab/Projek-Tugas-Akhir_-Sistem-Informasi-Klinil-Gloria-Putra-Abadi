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
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
    <h1 class="h3 mb-2 text-gray-800">Daftar Pasien</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien Anda</h6>
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
                @foreach ($perjanjian as $pasien)
                  @if(in_array($pasien->spesialiasi_dokter, ['Poli Umum', 'Poli Anak', 'Poli Lansia']))
                    <tr>
                      <td>{{ $pasien->nama_pasien }}</td>
                      <td>{{ $pasien->nama_dokter }}</td>
                      <td>{{ $pasien->spesialiasi_dokter }}</td>
                      <td>{{ $pasien->waktu_perjanjian }}</td>
                      <td>
                        @if(Auth::user()->role == 'apoteker')
                          <span>
                            <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-success">
                              Info
                            </a>
                          </span>
                        @elseif(Auth::user()->role =='admin')
                        <Span>
                            <a href="{{ route('pasien.show'), $pasien->id }}" class="btn btn-success">
                                Info
                            </a>
                        </span>
                        @else
                          <span>
                            <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning">
                              Edit
                            </a>
                          </span>
                          <span>
                            <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-success">
                              Info
                            </a>
                          </span>
                          <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <span>
                              <button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block"
                                type="submit">Hapus</button>
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
</div>
<!-- End of Main Content -->
@endsection
