<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>RSUA JADWAL DOKTER</title>
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.ico') }}" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>
        body {
            background-image: url('{{ asset('frontend/images/drbg.jpg') }}');
            background-size: cover;
            background-position: center;
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
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
    
                    <a href="/" class="logo mt-2">
                        <img src="{{ asset('frontend/images/logo.ico') }}" style="width: 40%;" alt="logo">
                    </a>
                    <ul class="nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/list-berita" class="">Berita</a></li>
                        <li><a href="#" class="active">Detail Berita</a></li>
                        <li><a href="/view-jadwal"><i class="fa fa-calendar"></i>Jadwal Dokter Spesialis</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="card">
    <div class="single-property section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-image">
                        <img src="{{ asset('frontend/images/no-image.png') }}" alt="image">
                    </div>
                    <div class="main-content">
                        <h4>Title Berita</h4>
                        <p>
                            Pada awal berdirinya tahun 1966 adalah Klinik Bersalin dimana pendiriannya termotivasi karena adanya ibu-ibu hamil islam sering mengeluh karena tidak adanya Rumah Bersalin Islami, sehingga mereka terpaksa melahirka dan dirawat pada bidan dan rumah sakit non muslim.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-table">
                        <h4>Late News</h4>
                        <hr>
                        <ul>
                            <li>
                                <h5>News Title 1</h5>
                                <p>Summary of the news...</p>
                            </li>
                            <li>
                                <h5>News Title 2</h5>
                                <p>Summary of the news...</p>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <footer class="footer-no-gap mt-2">
                <div class="container">
                    <div class="col-lg-12">
                        <p>Copyright © 2024 RSUA, Design By Alfazri Darmawansyah. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
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
