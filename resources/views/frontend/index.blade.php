<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>RSU Aisyiyah Padang</title>
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.ico') }}" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

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
            top: -20x; 
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
            background-color: rgba(255, 255, 255, 0.8); /* Ubah nilai alpha (a) sesuai kebutuhan */
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
                        {{--  <img src="{{ asset('frontend/images/logo.ico') }}" alt="Logo" style="width: 40%; margin-top: 2%;" >  --}}
                    </a>    
                    <ul class="nav">
                      <li><a href="/" class="">Home</a></li>
                      <li><a href="/sejarah" class="">Sejarah</a></li>
                      <li><a href="/cek-kamar" class="">Cek Kamar</a></li>
                      <li><a href="/list-berita" class="">Berita</a></li>
                      <li><a href="/lowongan" class="">Lowongan Pekerjaan</a></li>
                      <li><a href="/view-jadwal"><i class="fa fa-calendar"></i>Jadwal Dokter</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
  </header>


<div class="row justify-content-center" style="margin-top: 10%">
    <div class="col-md-5">
        <div class="card card-sm"> 
            <div class="card-body text-center">
                <h5 class="card-header text-center bg-success text-white" id="jadwal-praktek-dokter">Jadwal Praktek Dokter</h5>
                <div class="card-body text-center">
                    <p class="card-text">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="200" height="200" fill="dark"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                    </p>
                </div>
                <div class="text-center">
                    <a href="/view-jadwal" target="_blank" class="btn btn-success" style="width: 100%">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    
    {{--  <div class="col-md-5">
        <div class="card card-sm" id="login-admin">
            <div class="card-body">
                <h5 class="card-header text-center bg-success text-white">Login Admin</h5>
                <div class="card-body text-center">
                    <p class="card-text">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="200" height="200" fill=" black"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                    </p>

                </div>
                <div class="text-center">
                    <div class="col-12"></div>
                    <a href="/login" class="btn btn-success" style="width: 100%">Silahkan Login</a>
                </div>
            </div>
        </div>
    </div>  --}}

    <div class="col-md-5 mt-2">
        <div class="card card-sm" id="sejarah" >
            <div class="card-body">
                <h5 class="card-header text-center bg-success text-white">Sejarah Rumah Sakit Aisyiyah </h5>
                <div class="card-body text-center">
                    <p class="card-text">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"  width="200" height="200" fill="red"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M232 0c-39.8 0-72 32.2-72 72v8H72C32.2 80 0 112.2 0 152V440c0 39.8 32.2 72 72 72h.2 .2 .2 .2 .2H73h.2 .2 .2 .2 .2 .2 .2 .2 .2 .2H75h.2 .2 .2 .2 .2 .2 .2 .2 .2 .2H77h.2 .2 .2 .2 .2 .2 .2 .2 .2 .2H79h.2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2H82h.2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2H85h.2 .2 .2 .2H86h.2 .2 .2 .2H87h.2 .2 .2 .2H88h.2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2H98h.2 .2 .2 .2H99h.2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2 .2v0H456h8v0H568c39.8 0 72-32.2 72-72V152c0-39.8-32.2-72-72-72H480V72c0-39.8-32.2-72-72-72H232zM480 128h88c13.3 0 24 10.7 24 24v40H536c-13.3 0-24 10.7-24 24s10.7 24 24 24h56v48H536c-13.3 0-24 10.7-24 24s10.7 24 24 24h56V440c0 13.3-10.7 24-24 24H480V336 128zM72 128h88V464h-.1-.2-.2-.2H159h-.2-.2-.2H158h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H154h-.2-.2-.2H153h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H150h-.2-.2-.2H149h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H146h-.2-.2-.2H145h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H142h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H139h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H136h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H133h-.2-.2-.2-.2-.2-.2-.2-.2H131h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H128h-.2-.2-.2-.2-.2-.2-.2-.2H126h-.2-.2-.2-.2-.2-.2-.2-.2H124h-.2-.2-.2-.2-.2-.2-.2-.2H122h-.2-.2-.2-.2-.2-.2-.2-.2H120h-.2-.2-.2-.2-.2-.2-.2-.2H118h-.2-.2-.2-.2-.2-.2-.2-.2H116h-.2-.2-.2-.2-.2-.2-.2-.2H114h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H111h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H108h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H105h-.2-.2-.2-.2H104h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H100h-.2-.2-.2-.2H99h-.2-.2-.2-.2H98h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H88h-.2-.2-.2-.2H87h-.2-.2-.2-.2H86h-.2-.2-.2-.2H85h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H82h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H79h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H77h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H75h-.2-.2-.2-.2-.2-.2-.2-.2-.2-.2H73h-.2-.2-.2-.2-.2H72c-13.2 0-24-10.7-24-24V336h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H48V240h56c13.3 0 24-10.7 24-24s-10.7-24-24-24H48V152c0-13.3 10.7-24 24-24zM208 72c0-13.3 10.7-24 24-24H408c13.3 0 24 10.7 24 24V336 464H368V400c0-26.5-21.5-48-48-48s-48 21.5-48 48v64H208V72zm88 24v24H272c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h24v24c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V168h24c8.8 0 16-7.2 16-16V136c0-8.8-7.2-16-16-16H344V96c0-8.8-7.2-16-16-16H312c-8.8 0-16 7.2-16 16z"/></svg>
                    </p>

                </div>
                <div class="text-center">
                    <div class="col-12"></div>
                    <a href="/sejarah" class="btn btn-success" style="width: 100%">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5 mt-2">
        <div class="card card-sm" id="simrs">
            <div class="card-body">
                <h5 class="card-header text-center bg-success text-white">SIMRS</h5>
                <div class="card-body text-center">
                    <p class="card-text">
                       <img src="{{ asset('frontend/images/logo.ico') }}" style="width: 200px; height: 200px;" alt="">
                    </p>

                </div>
                <div class="text-center">
                    <div class="col-12"></div>
                    <a href="https://simrs.rsuaisyiyahpadang.com/" target="_blank" class="btn btn-success" style="width: 100%">SIMRS</a>
                </div>
            </div>
        </div>  
    </div>

    <div class="col-md-5 mt-2 mb-2">
        <div class="card card-sm" id="cek-kamar">
            <div class="card-body">
                <h5 class="card-header text-center bg-success text-white">Cek Kamar</h5>
                <div class="card-body text-center">
                    <p class="card-text">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="200" height="200" fill="  #2c3e50"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                    </p>

                </div>
                <div class="text-center">
                    <div class="col-12"></div>
                    <a href="/cek-kamar" class="btn btn-success" style="width: 100%">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>  
    </div>
</div>



  <!-- ***** Header Area End ***** -->

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6" style="margin-top: 5%">
          <p><strong><i class="fa-solid fa-map-location-dot"></i></strong> Jl. H. Agus Salim No.6, Sawahan, Kec. Padang Tim., Kota Padang, Sumatera Barat 25171</p>
          <p><strong><i class="fa-solid fa-phone"></i></strong> 0751-23843</p>
          <p><strong><i class="fa-solid fa-envelope"></i></strong> rsuaisyiyahpadang@gmail.com</p>
        </div>
        <div class="col-md-6">
          <h5>Location</h5>
          <!-- Embedding Google Maps -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.090328223261!2d100.3635671!3d-0.9476724!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b9384eb33b0d%3A0xee87dd6052b44f19!2sRumah%20Sakit%20Umum%20Aisyiyah!5e0!3m2!1sid!2sid!4v1714013801118!5m2!1sid!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

  </body>
</html>

 <script>
        var header = document.querySelector('.header-sticky');
        var prevScrollpos = window.pageYOffset;

        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                header.classList.remove('is-hidden');
            } else {

                header.classList.add('is-hidden');
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
