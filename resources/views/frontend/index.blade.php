  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet">

    <title>RSU Aisyiyah Padang</title>
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.ico') }}" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
      .header-sticky {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        transition: top 0.3s;
      }

      .header-sticky.is-hidden {
        top: -20px;
      }

      #video-background {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -1;
        overflow: hidden;
        object-fit: cover;
      }

      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: -1;
      }

      .content {
        position: relative;
        z-index: 1;
        color: white;
        text-align: center;
        padding: 100px 0;
      }

      .card {
        background-color: rgba(255, 255, 255, 0.8);
        /* Ubah nilai alpha (a) sesuai kebutuhan */
      }

      .contact-info p {
        margin-bottom: 5px;
      }
    </style>

  </head>

  <body>

    <!-- Video Background -->
    <video autoplay muted loop id="video-background">
      <source src="{{ asset('frontend/images/backgroundvideo.mp4') }}" type="video/mp4">
    </video>
    <div class="overlay"></div>


    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <a href="/" class="logo">
                <h1 class="text-white">RSUA</h1>
                {{--  <img src="{{ asset('frontend/images/logo.ico') }}" alt="Logo" style="width: 40%; margin-top: 2%;" >
                --}}
              </a>
              <ul class="nav">
                <li><a href="/" class="">Home</a></li>
                <li><a href="/sejarah" class="">Sejarah</a></li>
                <li><a href="/cek-kamar" class="">Cek Kamar</a></li>
                <li><a href="/list-berita" class="">Berita</a></li>
                <li><a href="/lowongan-pekerjaan" class="">Lowongan Pekerjaan</a></li>
                <li><a href="/view-jadwal" target="_blank"><i class="fa fa-calendar"></i>Jadwal Dokter</a></li>
              </ul>
              <a class='menu-trigger'>
                <span>Menu</span>
              </a>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <section class="carousel-section" style="margin-top: 15%">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card" style="background-color: rgba(255, 255, 255, 0); border: none">
              <div class="card-body">
                <div class="owl-carousel owl-carousel-custom">
                  @foreach ($slider as $d)
                  <div class="item">
                    <div class="header-text">
                      <div style="display: flex; align-items: center;">
                        <img src="{{ asset('frontend/images/logo.ico') }}" alt="First Image" style="max-width: 5%; margin-right: 10px;">
                        <img src="{{ asset('frontend/images/larsi.png') }}" alt="Second Image" style="max-width: 10%;">
                    </div>
                    <hr class="text-white">
                      <h1>{{ $d->judul }}</h1>
                      <p class="text-white" style="word-wrap: break-word;">{{ $d->konten }}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
                <hr class="text-white">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="video section" style="margin-top: 23%">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 offset-lg-4">
            <div class="section-heading text-center">
              <h2>Ayo Kenal Kami Lebih Dekat!!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="video-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <div class="video-frame">
              <img src="{{ asset('frontend/images/rs.jpg') }}" alt="">
              <a href="https://youtu.be/b3zzsrMChyw?si=GTcB7_Fo5VJU1By3" target="_blank"><i class="fa fa-play"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
     <div class="section properties">
          <div class="container">
            <div class="col-12 text-center">
              <h1>News</h1>
            </div>
            <br>
            <div class="row properties-box" id="properties-box">
              @foreach ($berita as $d)
              <?php
                  // Hitung selisih hari antara tanggal berita dengan tanggal hari ini
                  $tanggalBerita = \Carbon\Carbon::createFromFormat('Y-m-d', $d->tanggal);
                  $selisihHari = $tanggalBerita->diffInDays(\Carbon\Carbon::now());
                  // Tentukan status berita berdasarkan selisih hari
                  $statusBerita = $selisihHari < 1 ? 'Update News' : 'Late News';
              ?>
              <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv kategori-{{ $d->kategori->id }}">
                  <div class="item">
                      <a href="#">
                          @if (!empty($d->gambar))
                          <img src="{{ asset($d->gambar) }}" alt="Gambar Berita" style="max-width: 100%;">
                          @else
                          <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto" style="max-width: 100px;">
                          @endif
                      </a>
                      <h4><a href="property-details.html">{{ $d->judul_berita }}</a></h4>
                      <a href="#">{{ $d->kategori->kategori }}</a>
                      <hr>
                      <p style="color: red"><b>{{ $d->tanggal }}</b></p>
                      <p><b>{{ $statusBerita }}</b></p>
                      <br>
                      <div class="main-button mt-2">
                        <a href="/list-berita">Lihat Selengkapnya...</a>
                    </div>                        
                  </div>
              </div>
              @endforeach
          </div>
      </div>
    </div> 
    
    <div class="section properties">
      <div class="container">
        <div class="col-12 text-center">
          <h1>Our Partner</h1>
        </div>
        <br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>   
  
   
    
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6" style="margin-top: 5%">
            <p><strong><i class="fa-solid fa-map-location-dot"></i></strong> Jl. H. Agus Salim No.6, Sawahan, Kec. Padang,
              Kota Padang, Sumatera Barat 25171</p>
            <p><strong><i class="fa-solid fa-phone"></i></strong> 0751-23843</p>
            <p><strong><i class="fa-solid fa-envelope"></i></strong> rsuaisyiyahpadang@gmail.com</p>
          </div>
          <div class="col-md-6 mt-2">
            <!-- Embedding Google Maps -->
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.090328223261!2d100.3635671!3d-0.9476724!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b9384eb33b0d%3A0xee87dd6052b44f19!2sRumah%20Sakit%20Umum%20Aisyiyah!5e0!3m2!1sid!2sid!4v1714013801118!5m2!1sid!2sid"
              width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"            referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <p>&copy; 2024 RSUA. Designed By Alfazri Darmawansyah. All Rights Reserved.</p>
      </div>
    </footer>



    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/counter.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script>
      var header = document.querySelector('.header-sticky');
      var prevScrollpos = window.pageYOffset;

      window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
          header.classList.remove('is-hidden');
        } else {

          header.classList.add('is-hidden');
        }
        prevScrollpos = currentScrollPos;
      }

          // Inisialisasi Owl Carousel dengan autoplay
      $(document).ready(function(){
        $(".owl-carousel-custom").owlCarousel({
          items: 1,
          loop: true,
          autoplay: true, // Aktifkan autoplay
          autoplayTimeout: 5000, // Atur waktu autoplay (dalam milidetik)
          autoplayHoverPause: true // Jeda autoplay saat kursor berada di atas carousel
        });
      });

    </script>
  </body>

  </html>


