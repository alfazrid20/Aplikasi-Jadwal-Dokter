
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jadwal Dokter</title>
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

<body onload="updateTime()">

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
          <li><a href="/list-berita" class="active">Berita</a></li>
          <li><a href="/view-jadwal" target="_blank">Jadwal Dokter</a></li>
          <li><a href="/lowongan-pekerjaan">Lowongan Pekerjaan</a></li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i
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

        <h2>Jadwal Dokter</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>Jadwal Dokter</li>
        </ol>
      </div>
    </div>

    <div class="image text-center">
      <img src="{{ asset('frontend/img/logo_rs.png') }}" style="width: 20%">
    </div>
     <h1 class="text-center">
        Jadwal Praktek Dokter Spesialis <br>
        Rumah Sakit Umum Aisyiyah <br>
        <span id="currentDate"></span>
        <br>
        <span id="currentTime"></span>
      </h1> 
      <br>
    <div class="container mt-2">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Poli</th>
                <th>Nama Dokter</th>
                <th>Jam Pelayanan</th>
                <th class="text-center">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jadwaldokter as $d )
              <tr>
                <td>{{ $d->poli->nama }}</td>
                <td>{{ $d->dokter->nama }}</td>
                <td class="text-center">{{ $d->jam_pelayanan }}</td>
                <td>
                  @if ($d->keterangan == 'Tersedia')
                      <span
                          class="badge text-bg-primary ">{{ $d->keterangan }}</span>
                  @elseif ($d->keterangan == 'Dalam Perjalanan')
                      <span class="badge text-bg-info">{{ $d->keterangan }}</span>
                  @elseif ($d->keterangan == 'Tidak Tersedia')
                      <span
                          class="badge text-bg-danger">{{ $d->keterangan }}</span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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
  <script>
    function updateTime() {
      const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const now = new Date();
      const dayName = days[now.getDay()];
      const date = now.getDate().toString().padStart(2, '0');
      const month = (now.getMonth() + 1).toString().padStart(2, '0');
      const year = now.getFullYear();
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');
      const currentTime = `${hours}:${minutes}:${seconds}`;

      document.getElementById('currentDate').innerText = `${dayName}, ${date}-${month}-${year}`;
      document.getElementById('currentTime').innerText = currentTime;
    }

    setInterval(updateTime, 1000);
  </script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>