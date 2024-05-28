<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan | Klinik GPA</title>
    <!-- Stylesheets -->
    <link href="css/style.css" rel="stylesheet">
    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="page-wrapper">
      <!-- Preloader -->
      <!-- <div class="preloader"></div> -->
      <!-- Preloader -->

      <!-- Main Header -->
      <nav class="navbar navbar-default">
          <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header col-md-2 col-sm-2 col-xs-12">
                  <figure class="logo">
                      <a href="../">
                          <img src="images/logoklinik.png" alt="" width="80">
                      </a>
                  </figure>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                      data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../">Beranda</a>
                    </li>
                    <!-- Existing code -->

                    <li class="dropdown">
                        <!-- ... (unchanged) -->
                    </li>
                    <li>
                        <a href= "../jadwaldokter">Jadwal Dokter</a>
                    </li>
                    <!-- Existing code -->

                    <li class="dropdown">
                     <a href="../layanan" >Layanan</a>
                             <span class="caret"></span>
                       </a>
                    <li>
                        <a href="../tentang">Tentang</a>
                    </li>
                    <li>
                        <a href="../Kontak">Kontak</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../auth/login" class="btn btn-main">Login</a>
                    </li>
                </ul>

                </div>

              <!-- /.navbar-collapse -->
          </div>

          <!-- /.container-fluid -->
      </nav>

  <!--End Main Header -->

    <!--Page Title-->
    <section class="page-title text-center" style="background-image:url(images/background/3.jpg);">
        <div class="container">
            <div class="title-text">
                <h1>Layanan</h1>
                <ul class="title-menu clearfix">
                    <li>
                        <a href="../">Beranda &nbsp;/</a>
                    </li>
                    <li>Layanan</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--==================================
    =            Layanan Section            =
    ===================================-->
    <section class="layanan-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- List Layanan -->
                    <div class="layanan-info">
                        <ul class="list-layanan">
                            <li><i class="fa fa-check"></i> IGD 24 Jam</li>
                            <li><i class="fa fa-check"></i> Persalinan</li>
                            <li><i class="fa fa-check"></i> Laboratorium</li>
                            <li><i class="fa fa-check"></i> Konsultasi Kecantikan Wajah</li>
                            <li><i class="fa fa-check"></i> Pemeriksaan Umum</li>
                            <li><i class="fa fa-check"></i> Rawat Rumah</li>
                            <li><i class="fa fa-check"></i> Bedah Minor</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Google Map -->
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
    <!--====  End of Layanan Section  ====-->

    <!--footer-main-->
    <footer class="footer-main">
        <!-- Footer content (sama seperti yang sebelumnya) -->
    </footer>
    <!--End footer-main-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>

    <!-- Scripts (sama seperti yang sebelumnya) -->
    <script src="plugins/jquery.js"></script>
    <script src="plugins/bootstrap.min.js"></script>
    <script src="plugins/bootstrap-select.min.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick/slick.min.js"></script>
    <!-- FancyBox -->
    <script src="plugins/fancybox/jquery.fancybox.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="plugins/google-map/gmap.js"></script>
    <script src="plugins/validate.js"></script>
    <script src="plugins/wow.js"></script>
    <script src="plugins/jquery-ui.js"></script>
    <script src="plugins/timePicker.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
