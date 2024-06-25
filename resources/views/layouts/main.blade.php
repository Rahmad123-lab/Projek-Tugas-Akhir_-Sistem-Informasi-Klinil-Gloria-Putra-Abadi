<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Halaman Dashboard | Klinik GPA</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('images/logoklinik.png') }}" alt="" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">Klinik GPA</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-chart-line"></i>
                    <span>Aktivitas Saya</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Conditional Sidebar Items for Different Roles -->
            @if (Auth::user()->role == 'dokter')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasienDokter"
                        aria-expanded="true" aria-controls="collapsePasienDokter">
                        <i class="fas fa-user-injured"></i>
                        <span>Pasien</span>
                    </a>
                    <div id="collapsePasienDokter" class="collapse" aria-labelledby="headingPasienDokter"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="{{ route('dokter.index') }}">Daftar Pasien</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObatDokter"
                        aria-expanded="true" aria-controls="collapseObatDokter">
                        <i class="fas fa-tablets"></i>
                        <span>Obat</span>
                    </a>
                    <div id="collapseObatDokter" class="collapse" aria-labelledby="headingObatDokter"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="{{ route('obat.index') }}">Daftar Obat</a>
                        </div>
                    </div>
                </li>
            @endif
            @if (Auth::user()->role == 'pasien')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJanjiPasien"
                        aria-expanded="true" aria-controls="collapseJanjiPasien">
                        <i class="fas fa-user-injured"></i> <span>Janji Saya</span>
                    </a>
                    <div id="collapseJanjiPasien" class="collapse" aria-labelledby="headingJanjiPasien"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('pasien.index') }}">Riwayat Berobat</a>
                        </div>
                    </div>
                </li>
            @endif
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDokterAdmin"
                        aria-expanded="true" aria-controls="collapseDokterAdmin">
                        <i class="fas fa-user-md"></i>
                        <span>Dokter</span>
                    </a>
                    <div id="collapseDokterAdmin" class="collapse" aria-labelledby="headingDokterAdmin"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="{{ route('admin-dokter.index') }}">Daftar Dokter</a>
                            <a class="collapse-item" href="{{ route('admin-dokter.create') }}">Tambah Dokter</a>
                            <a class="collapse-item" href="{{ route('admin-jadwal.index') }}">Kelola Jadwal Dokter</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasienAdmin"
                        aria-expanded="true" aria-controls="collapsePasienAdmin">
                        <i class="fas fa-user-injured"></i>
                        <span>Pasien</span>
                    </a>
                    <div id="collapsePasienAdmin" class="collapse" aria-labelledby="headingPasienAdmin"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="{{ route('dokter.index') }}">Daftar Pasien</a>
                            <a class="collapse-item" href="{{ route('dokter.create') }}">Tambah Pasien</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserAdmin"
                        aria-expanded="true" aria-controls="collapseUserAdmin">
                        <i class="fas fa-users"></i>
                        <span>User</span>
                    </a>
                    <div id="collapseUserAdmin" class="collapse" aria-labelledby="headingUserAdmin"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="{{ route('admin.index') }}">Daftar User</a>
                            <a class="collapse-item" href="{{ route('admin.create') }}">Tambah User</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObatAdmin"
                        aria-expanded="true" aria-controls="collapseObatAdmin">
                        <i class="fas fa-tablets"></i>
                        <span>Obat</span>
                    </a>
                    <div id="collapseObatAdmin" class="collapse" aria-labelledby="headingObatAdmin"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="{{ route('obat.index') }}">Daftar Obat</a>
                        </div>
                    </div>
                </li>
            @endif
            @if (Auth::user()->role == 'apoteker')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasienApoteker"
                        aria-expanded="true" aria-controls="collapsePasienApoteker">
                        <i class="fas fa-user-injured"></i>
                        <span>Pasien</span>
                    </a>
                    <div id="collapsePasienApoteker" class="collapse" aria-labelledby="headingPasienApoteker"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="{{ route('dokter.index') }}">Daftar Pasien</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObatApoteker"
                        aria-expanded="true" aria-controls="collapseObatApoteker">
                        <i class="fas fa-tablets"></i>
                        <span>Obat</span>
                    </a>
                    <div id="collapseObatApoteker" class="collapse" aria-labelledby="headingObatApoteker"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"></h6>
                            <a class="collapse-item" href="{{ route('obat.index') }}">Daftar Obat</a>
                            <a class="collapse-item" href="{{ route('obat.create') }}">Tambah Obat</a>
                        </div>
                    </div>
                </li>
            @endif
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" class="d-flex flex-column">
                @yield('content')
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Klinik Gloria Putra Abadi &copy; 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>
</body>

</html>
