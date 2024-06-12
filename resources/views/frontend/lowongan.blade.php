<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail Lowongan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo.ico') }}" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">

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
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
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
    <div class="breadcrumbs d-flex align-items-center" style="background: url('{{ asset('frontend/img/rs.png') }}')">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Detail Lowongan Pekerjaan</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>Detail Lowongan Pekerjaan</li>
        </ol>
      </div>
    </div>

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5">
          <div class="col-lg-8">
            <article class="blog-details">
              <div class="post-img">
                <img src="{{ asset($loker->foto_loker) }}" alt="" class="img-fluid">
              </div>
              <h2 class="title">{{ $loker->posisi_id }}</h2>
              <hr>
              <div class="content">
                <h5>Deskripsi</h5>
                <hr>
                <p>{!! $loker->deskripsi !!}</p>
                <hr>
                <h5>Persyaratan</h5>
                <hr>
                <p>{!! $loker->persyaratan !!}</p>
                <hr>
                <h5>Batas Waktu Lamaran</h5>
                <hr>
                <p>Batas Waktu Lamaran Adalah Pada Tanggal <b><u>{{ $loker->batas_waktu }}</u></b></p>
                <br>
                <div class="button">
                  <a href="/daftar-lowongan" class="btn btn-danger">Apply Lamaran</a>
                </div>
              </div>
            </article>
          </div>

          <div class="col-lg-4">
            <div class="sidebar-item recent-post">
                <h4 class="sidebar-title text-center" style="font-family: 'Times New Roman', Times, serif">Lowongan Lainnya</h4>
                <hr>
                <ul>
                    @foreach ($otherJobs as $d)
                        @if ($d->status_loker == 'Buka')
                            <li>
                                <h4 style="font-family: 'Times New Roman', Times, serif"><a><span class="badge text-bg-primary">{{ $d->posisi_id }}  </span>
                                  </a></h4>
                                <br>
                                @if (!empty($d->foto_loker))
                                    <img src="{{ asset($d->foto_loker) }}" style="max-width: 100%;">
                                @else
                                    <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto" style="max-width: 100px;">
                                @endif
                                <div class="button mt-2">
                                    <a href="/lowongan/{{ $d->id }}" class="statusLink" data-status="{{ $d->status_loker }}"><span class="badge text-bg-primary">Lihat Selengkapnya....</span></a>
                                </div>
                            </li>
                            <hr>
                        @endif
                    @endforeach
                </ul>
            </div>
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

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
  
  <!-- Custom Script for Status Link Handling -->
  
</body>

</html>