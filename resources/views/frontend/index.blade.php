
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RSU Aisyiyah Padang</title>
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

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <h1>RSUA<span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/" class="active">Home</a></li>
          <li><a href="/cek-kamar" >Cek Kamar</a></li>
          <li><a href="/list-berita">Berita</a></li>
          <li><a href="/jadwal-dokter" target="_blank">Jadwal Dokter</a></li>
          <li><a href="/lowongan-pekerjaan">Lowongan Pekerjaan</a></li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="/sejarah">Sejarah</a></li>
              <hr>
              <li><a href="/manajemen">Staff & Manajemen</a></li>
              <hr>
              <li><a href="/dokter">Dokter</a></li>
            </ul>
          </li>
          <li><a href="/kontak">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Rumah Sakit Umum Aisyiyah Padang</h2>
            {{--  <p data-aos="fade-up"> "SIIP"  </p>  --}}
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      @foreach($foto as $key => $foto_slider)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url('{{ asset($foto_slider->foto_slider) }}')">
          </div>
      @endforeach
  
      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
  </div>
  
  </section>

  <main id="main">
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Fasilitas Layanan</h2>
          <p>Beberapa Fasilitas Pelayanan Yang Kami Miliki</p>
        </div>

        <div class="row gy-4">
          @foreach ($fasilitas as $f )
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-notes-medical"></i>
              </div>
              <h3>{{ $f->nama_fasilitas }}</h3>
              <p>"Kami Berkomitmen Untuk Selalu Memberikan Pelayanan Yang Ramah, Baik Dan Sopan Kepada Seluruh Pasien"</p>
              <img src="{{ $f->gambar }}" alt="{{ $f->nama_fasilitas }}" class="img-fluid">
            </div>
          </div>
          @endforeach
        </div>
        </div>
      </div>
    </section>

    
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Mitra Kerjasama</h2>
          <p> "Kami memiliki jaringan mitra yang kuat, termasuk asuransi kesehatan dan penyedia layanan medis lainnya, yang membantu kami memastikan pasien kami mendapatkan perawatan yang komprehensif dan terjangkau." </p>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">
            @foreach ($mitra as $m)
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ $m->gambar }}" class="testimonial-img" alt="">
                  <h3>{{ $m->nama }}</h3>
                  <h4>Mitra Kerjasama</h4>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    {{ $m->rincian }}
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
        

      </div>
    </section>

    <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up"">

    
    
  <div class=" section-header">
        <h2>Berita</h2>
        <p>Temukan Informasi Menarik dan Terbaru Tentang Kami</p>
      </div>

      <div class="row gy-5">
        @foreach ($berita as $b )
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="post-item position-relative h-100">
            <div class="post-img position-relative overflow-hidden">
              <img src="{{ $b->gambar }}" class="img-fluid">
              <span class="post-date">{{ $b->tanggal }}</span>
            </div>
            <div class="post-content d-flex flex-column">
              <h3 class="post-title">{{ $b->judul_berita }}</h3>
              <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i> <span class="ps-2">RSUA</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-folder2"></i> <span class="ps-2">{{ $b->kategori->kategori }}</span>
                </div>
              </div>
              <hr>
              <a href="/view-berita/{{ $b->id }}" class="readmore stretched-link"><span>Read More</span><i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      
      </div>
    </section>

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

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>