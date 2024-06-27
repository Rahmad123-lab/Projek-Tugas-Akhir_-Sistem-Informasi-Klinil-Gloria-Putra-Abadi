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
        <h1 class="h3 mb-3 text-gray-800">Buat perjanjian dengan dokter kamu</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('perjanjian.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pasien_id" value="{{ Auth::user()->id }}">

                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                        @error('nama')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Umur -->
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" placeholder="Umur" value="{{ old('umur') }}" required>
                        @error('umur')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}" required>
                        @error('nik')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Nama Dokter -->
                    <div class="form-group">
                        <label for="nama_dokter">Nama Dokter</label>
                        <select class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter" name="nama_dokter" required>
                            <option value="">Pilih Dokter</option>
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}" {{ old('nama_dokter') == $dokter->id ? 'selected' : '' }}>
                                    {{ $dokter->nama_dokter }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_dokter')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Spesialisasi Dokter -->
                    <div class="form-group">
                        <label for="spesialisasi_dokter">Spesialisasi Dokter</label>
                        <select class="form-control @error('spesialisasi_dokter') is-invalid @enderror" id="spesialisasi_dokter" name="spesialisasi_dokter" required>
                            <option value="">Pilih Spesialisasi</option>
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->spesialisasi_dokter }}" {{ old('spesialisasi_dokter') == $dokter->spesialisasi_dokter ? 'selected' : '' }}>
                                    {{ $dokter->spesialisasi_dokter }}
                                </option>
                            @endforeach
                        </select>
                        @error('spesialisasi_dokter')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Waktu Perjanjian -->
                    <div class="form-group">
                        <label for="waktu_perjanjian">Waktu Perjanjian</label>
                        <select name="waktu_perjanjian" class="form-control @error('waktu_perjanjian') is-invalid @enderror" id="waktu_perjanjian" required>
                            <option value="Pagi (08:00)" {{ old('waktu_perjanjian') == 'Pagi (08:00)' ? 'selected' : '' }}>Pagi (08:00)</option>
                            <option value="Siang (14:00)" {{ old('waktu_perjanjian') == 'Siang (14:00)' ? 'selected' : '' }}>Siang (14:00)</option>
                            <option value="Sore (17:00)" {{ old('waktu_perjanjian') == 'Sore (17:00)' ? 'selected' : '' }}>Sore (17:00)</option>
                        </select>
                        @error('waktu_perjanjian')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-info">Buat Perjanjian</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
