
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kepengurusan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo.ico') }}" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">

  <style>
    .organization-chart {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .org-chart-level {
      display: flex;
      justify-content: center;
      margin: 20px 0;
    }

    .org-chart-box {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      margin: 0 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .org-chart-box img {
      border-radius: 50%;
      width: 100px;
      height: 100px;
      object-fit: cover;
      margin-bottom: 10px;
    }

    .org-chart-box h3 {
      font-size: 1.2em;
      margin-bottom: 5px;
    }

    .org-chart-box p {
      font-size: 0.9em;
      color: #666;
    }

    .org-chart-level .org-chart-box:first-child {
      margin-right: 40px;
    }

    .org-chart-level .org-chart-box:last-child {
      margin-left: 40px;
    }
  </style>

</head>

<body>

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <h1>RSUA<span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/cek-kamar">Cek Kamar</a></li>
          <li><a href="/list-berita">Berita</a></li>
          <li><a href="/jadwal-dokter" target="_blank">Jadwal Dokter</a></li>
          <li><a href="/lowongan-pekerjaan">Lowongan Pekerjaan</a></li>
          <li class="dropdown"><a href="#" class="active"><span>Tentang Kami</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="/sejarah">Sejarah</a></li>
              <li><a href="/manajemen">Staff & Manajemen</a></li>
              <li><a href="#">Dokter</a></li>
            </ul>
          </li>
          <li><a href="/kontak">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="main">

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('frontend/img/rs.png');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Kepengurusan</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>Kepengurusan</li>
        </ol>   
      </div>
    </div>

    <div class="image text-center">
        <img src="{{ asset('frontend/img/logo_rs.png') }}" style="width: 20%">
    </div>
    <h1 class="text-center mt-2">Kepengurusan  Rumah Sakit Umum <br>
       
        Aisyiyah Padang
    </h1>
    <div class="container">
        <div class="organization-chart" data-aos="fade-up">
            <!-- Edit Nama dan Foto Saja Jangan Edit ID nya -->
            <div class="org-chart-level">
                <div class="org-chart-box">
                    <img src="{{ $direktur->foto }}" alt="Direktur">
                    <h3>{{ $direktur->jabatan }}</h3>
                    <p>{{ $direktur->nama }}</p>
                </div>
            </div>
            <!-- Staff-->
            <div class="org-chart-level">
                @foreach($staff as $posisi)
                <div class="org-chart-box">
                    <img src="{{ $posisi->foto }}" alt="{{ $posisi->nama }}">
                    <h3>{{ $posisi->jabatan }}</h3>
                    <p>{{ $posisi->nama }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
  </main>


  <footer id="footer" class="footer">
    <div class="footer-content position-relative text-center">
      <div class="container">
        <div class="row justify-content-center">
  
          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>RSUA</h3>
              <p>
                Jl. H. Agus Salim No.6, Sawahan, Kec. Padang, Kota Padang, Sumatera Barat 25171<br><br>
                <strong>Phone:</strong> 0751-23843<br>
                <strong>Customer Service:</strong> 0811-6761-616<br>
                <strong>Email:</strong> rsuaisyiyahpadang@gmail.com<br>
              </p>
              <div class="social-links d-flex justify-content-center mt-3">
                <a href="https://m.facebook.com/people/RSU-Aisyiyah-Padang/100069546992570/" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/rsuaisyiyahpadang_/" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
          </div><!-- End footer info column -->
  
          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Shortcut Link</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Cek Kamar</a></li>
              <li><a href="#">Berita</a></li>
              <li><a href="#">Lowongan Pekerjaan</a></li>
              <li><a href="#">Tentang Kami</a></li>
              <li><a href="#">Jadwal Dokter</a></li>
            </ul>
          </div><!-- End footer links column -->
  
        </div>
      </div>
    </div>
 
  
  
    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>RSUA</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://github.com/alfazrid20">Alfazri Darmawansyah</a>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>

  
     

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('frontend/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>