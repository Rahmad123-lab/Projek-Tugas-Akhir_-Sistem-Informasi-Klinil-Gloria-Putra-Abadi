@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
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
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if (Auth::user()->role == 'pasien')
          <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
            {{ Auth::user()->name }}! Bagaimana kondisi kesehatanmu?
          </h1>
        @else
          <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
            Selamat Datang, {{ Auth::user()->name }}!
          </h1>
        @endif
      </div>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}

    <!-- Banner Section -->
    <div class="jumbotron text-center bg-primary text-white">
      <h1 class="display-4">Layanan Cepat dan Tepat</h1>
      <p class="lead">Layanan Booking dan Chat Dokter Terbaik di Indonesia</p>
    </div>

    <!-- Services Section -->
    <div class="row text-center">
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <i class="fas fa-comments fa-3x mb-3 text-primary"></i>
            <h5 class="card-title mb-3">Chat Dokter</h5>
            <p class="card-text">Layanan Chat dengan Dokter Profesional</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <i class="fas fa-calendar-check fa-3x mb-3 text-primary"></i>
            <h5 class="card-title mb-3">Buat Janji</h5>
            <p class="card-text">Buat Janji dengan Dokter Terpercaya</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <i class="fas fa-shopping-bag fa-3x mb-3 text-primary"></i>
            <h5 class="card-title mb-3">Aloshop</h5>
            <p class="card-text">Belanja Kebutuhan Kesehatan</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <i class="fas fa-shield-alt fa-3x mb-3 text-primary"></i>
            <h5 class="card-title mb-3">Aloproteksi</h5>
            <p class="card-text">Perlindungan Kesehatan Terbaik</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
