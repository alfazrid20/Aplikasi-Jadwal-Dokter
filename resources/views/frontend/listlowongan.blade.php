<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Daftar Lowongan</title>
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.ico') }}" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style>
      body {
          background-image: url('{{ asset('frontend/images/loker.png') }}');
          background-size: cover;
          background-position: 100% center;
          background-attachment: fixed;
      }
    </style>
</head>
<body>
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i>rsuaisyiyahpadang@gmail.com</li>
            <li><i class="fa fa-map"></i> Jl. H. Agus Salim No.6, Sawahan</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="https://m.facebook.com/people/RSU-Aisyiyah-Padang/100069546992570/"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/rsuaisyiyahpadang_/"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo mt-2">
                   <img src="{{ asset('frontend/images/logo.png') }}" style="width: 100px; height: 100px;" alt="logo">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="/">Home</a></li>
                      <li><a href="#" class="active">Lowongan Pekerjaan</a></li>
                      <li><a href="/view-jadwal"><i class="fa fa-calendar"></i>Jadwal Dokter Spesialis</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>

  <div class="section properties">
    <div class="container">
      <h1 class="text-center text-white" style="font-family: 'Pacifico', cursive; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">We are Hiring!!</h1>
      <br>
      <div class="row properties-box" id="properties-box">
        @foreach ($loker as $d)
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6">
          <div class="item">
            <a href="#">
                @if (!empty($d->foto_loker))
                <img src="{{ asset($d->foto_loker) }}" alt="Gambar Berita" style="max-width: 100%;">
                @else
                <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto" style="max-width: 100px;">
                @endif
            </a>
            <h4><a href="#"><span class="badge text-bg-primary">{{ $d->posisi }}</span></a></h4>
            <a href="#">
                @if ($d->status_loker == 'Buka')
                <span class="badge text-bg-success">Buka</span>
                @elseif ($d->status_loker == 'Tutup')
                <span class="badge text-bg-danger">Tutup</span>
                @else
                <span class="badge badge-secondary">{{ $d->status_loker }}</span>
                @endif
            </a>
            <hr>
            <p style="color: red"></p>
            <p></p>
            <?php
            $wordCount = str_word_count($d->deskripsi);
            $maxWords = 10; // Jumlah maksimum kata yang ingin ditampilkan
            $trimmedText = implode(' ', array_slice(explode(' ', $d->deskripsi), 0, $maxWords));
            $trimmedText .= $wordCount > $maxWords ? '...' : ''; // Tambahkan elipsis jika teks dipotong
            ?>
            <p>{!! $trimmedText !!}</p>
            <br>
            <div class="main-button">
                <a class="statusLink" href="/lowongan/{{ $d->id }}" data-status="{{ $d->status_loker }}">
                  Lihat Selengkapnya
                </a>
            </div>
        </div>        
        </div>
        @endforeach
    </div>
    </div>

  <footer class="footer-no-gap mt-2">
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2024 RSUA, Design By Alfazri Darmawansyah. All rights reserved.
      </div>
    </div>
  </footer>

  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/isotope.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('frontend/js/counter.js') }}"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('.statusLink').on('click', function (event) {
          var status = $(this).data('status');
          
          if (status === 'Tutup') {
              event.preventDefault();
              alert('Maaf, Lowongan Sudah ditutup');
          } else {
              // Lanjutkan ke tautan jika status "Buka"
              // Ubah link ini sesuai dengan kebutuhan Anda
              window.location.href = $(this).attr('href');
          }
      });
  });
  
    $(document).ready(function () {
      var $propertiesBox = $('#properties-box').isotope({
        itemSelector: '.properties-items',
        layoutMode: 'fitRows'
      });

      $('.properties-filter a').on('click', function (e) {
        e.preventDefault();
        var filterValue = $(this).attr('data-filter');
        $propertiesBox.isotope({ filter: filterValue });
        $('.properties-filter a').removeClass('is_active');
        $(this).addClass('is_active');
      });

      document.getElementById('statusLink').addEventListener('click', function(event) {
        var status = this.getAttribute('data-status');
        
        if (status === 'Tutup') {
            event.preventDefault(); // Mencegah navigasi ke tautan
            alert('Maaf, Lowongan Sudah ditutup');
        } else {
            // Lanjutkan ke tautan jika status "Buka"
            this.href = '/lowongan';
        }
    });
    });
  </script>
</body>
</html>
