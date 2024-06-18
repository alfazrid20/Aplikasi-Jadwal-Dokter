
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dokter RSUA</title>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

  
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
          <li><a href="/lowongan-pekerjaan" class="active">Lowongan Pekerjaan</a></li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="/sejarah">Sejarah</a></li>
              <li><a href="/manajemen">Staff & Manajemen</a></li>
              <li><a href="/dokter">Dokter</a></li>
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
        <h2>Dokter & Ahli</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>Dokter</li>
        </ol>
      </div>
    </div>

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
        <div class="container" data-aos="fade-up">
    
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
    
                <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($jadwaldokter->unique('poli.id') as $d)
                        <li data-filter=".poli-{{ $d->poli->id }}">{{ $d->poli->nama }}</li>
                    @endforeach
                </ul>
    
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($jadwaldokter as $d)
                        <div class="col-lg-4 col-md-6 portfolio-item poli-{{ $d->poli->id }}">
                            <div class="portfolio-content h-100">
                                <img src="{{ $d->foto_dokter ? asset($d->foto_dokter) : asset('placeholder.jpg') }}" class="img-fluid" alt="Foto Dokter">
                                <div class="room-details mt-2">
                                    <p class="text-center">{{ $d->dokter->nama }}</p>
                                    <p class="text-center">{{ $d->poli->nama }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
  </main>


  <footer id="footer" class="footer">
    <div class="footer-content position-relative ">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <img src="{{ asset('frontend/img/logo_rs.png') }}" style="width: 90%">
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>RSUA</h3>
              <p>
                Jl. H. Agus Salim No.6, Sawahan, Kec. Padang, Kota Padang, Sumatera Barat 25171<br><br>
                <strong>Phone:</strong> 0751-23843<br>
                <strong>Customer Service:</strong> 0811-6761-616<br>
                <strong>Email:</strong> rsuaisyiyahpadang@gmail.com<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="https://m.facebook.com/people/RSU-Aisyiyah-Padang/100069546992570/" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/rsuaisyiyahpadang_/" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
          </div>
  
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
          </div>
  
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
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const readMoreLinks = document.querySelectorAll('.readmore');

        readMoreLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                const status = this.getAttribute('data-status');
                if (status === 'Tutup') {
                    event.preventDefault();
                    alert('Maaf, lowongan yang Anda pilih sudah tutup.');
                }
            });
        });
    });
  </script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>