<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Contact | Klinik GPA</title>


  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- FancyBox -->
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">

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

<!--End Main Header -->

<!--Page Title-->
<section class="page-title text-center" style="background-image:url(images/background/3.jpg);">
    <div class="container">
        <div class="title-text">
            <h1>Contact</h1>
            <ul class="title-menu clearfix">
                <li>
                    <a href="index.html">home &nbsp;/</a>
                </li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--==================================
=            Contact Form            =
===================================-->
<section class="section contact">
    <!-- container start -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- address start -->
                <div class="address-block">
                    <!-- Location -->
                    <div class="media">
                        <i class="fa fa-map-o"></i>
                        <div class="media-body">
                            <h3>Lokasi</h3>
                            <p>Tarutung
                                <br>Tapanuli Utara
                                <br>Sumatera Utara</p>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="media">
                        <i class="fa fa-phone"></i>
                        <div class="media-body">
                            <h3>Phone</h3>
                            <p>
                                + (62)82166064614
                                <br>0633 20808
                            </p>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="media">
                        <i class="fa fa-envelope-o"></i>
                        <div class="media-body">
                            <h3>Email</h3>
                            <p>
                                klinikgloriaputraabadi@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <!-- address end -->
            </div>
            <div class="col-md-8">
                <div class="contact-form">
                    <!-- contact form start -->
                    <form action="#" class="row">
                        <!-- name -->
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control main" placeholder="Name" required>
                        </div>
                        <!-- email -->
                        <div class="col-md-6">
                            <input type="email" class="form-control main" placeholder="Email" required>
                        </div>
                        <!-- phone -->
                        <div class="col-md-12">
                            <input type="text" class="form-control main" placeholder="Phone" required>
                        </div>
                        <!-- message -->
                        <div class="col-md-12">
                            <textarea name="message" rows="15" class="form-control main" placeholder="Your message"></textarea>
                        </div>
                        <!-- submit button -->
                        <div class="col-md-12 text-right">
                            <button class="btn btn-style-one" type="submit">Send Message</button>
                        </div>
                    </form>
                    <!-- contact form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- container end -->
</section>
<!--====  End of Contact Form  ====-->

<!--================================
=            Google Map            =
=================================-->
<section class="map">
    <!-- Google Map -->
    <div id="map"></div>
</section>
<!--====  End of Google Map  ====-->

<!--footer-main-->
<footer class="footer-main">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <!-- About Section -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="about-widget">
              <div class="footer-logo">
                <figure>
                  <a href="index.html">
                    <img src="images/logoklinik.png" alt="Klinik Logo" width="75">
                  </a>
                </figure>
              </div>
              <p>Klinik Gloria Putra Abadi merupakan Satuan Usaha yang bergerak dibidang layanan kesehatan
                yang mencakup Klinik Pratama, Klinik Utama, Laboratorium Klinik, Apotek, Fisioterapi.</p>
              <ul class="location-link">
                <li class="item">
                  <i class="fa fa-map-marker"></i>
                  <p>Tarutung, Sumatera Utara</p>
                </li>
                <li class="item">
                  <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  <a href="mailto:klinikgloriaputraabadi@gmail.com">
                    <p>klinikgloriaputraabadi@gmail.com</p>
                  </a>
                </li>
                <li class="item">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <p>082163315454</p>
                </li>
              </ul>
            </div>
          </div>
          <!-- Links Section -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <h6>Tautan</h6>
            <ul class="menu-link">
              <li>
                <a href="#">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> IGD 24 Jam
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Pemeriksaan Umum
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Elektrokardiografi (EKG)
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Ultrasonografi (USG)
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Persalinan
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Bedah Minor
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Konsultasi Kecantikan Wajah
                </a>
              </li>
            </ul>
          </div>
          <!-- Social Media Section -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="social-links">
              <h6>Sosial Media</h6>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container clearfix">
        <div class="copyright-text">
          <p>&copy; Copyright 2024. Klinik Gloria Putra Abadi
            <a href="index.html"></a>
          </p>
        </div>
        <ul class="footer-bottom-link">
          <li>
            <a href="#">Beranda</a>
          </li>
          <li>
            <a href="#">About</a>
          </li>
          <li>
            <a href="#">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  <!--End footer-main-->

  </div>
  <!--End pagewrapper-->

  <!--Scroll to top-->
  <div class="scroll-to-top scroll-to-target" data-target=".header-top">
    <span class="icon fa fa-angle-up"></span>
  </div>

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
