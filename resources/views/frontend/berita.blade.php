<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>News</title>
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
                        <img src="{{ asset($berita->gambar) }}" alt="image">
                    </div>
                    <div class="main-content">
                        <h4>{{ $berita->judul_berita }}</h4>
                        <div class="kategori bg-primary" style="padding: 10px; color: rgb(255, 255, 255); display: inline-block;">
                            <p class="text-white">{{ $berita->kategori->kategori }}</p>
                        </div>
                        <hr>
                        <p style="color: red">{{ $berita->tanggal }}</p>
                        <p>{!! $berita->isi !!}</p>
                    </div>
                </div>                
                <div class="col-lg-4">
                    <div class="info-table">
                        <h4 class="info-title bg-primary" style="padding: 10px; color: rgb(255, 255, 255)">Other News</h4>
                        <hr>
                        <ul>
                            @foreach ($otherNews as $d)
                            <li>
                                <h5><a href="/view-berita/{{ $d->id }}">{{ $d->judul_berita }}</a></h5>
                                <br>
                                @if (!empty($d->gambar))
                                <img src="{{ asset($d->gambar) }}" alt="Gambar Berita" style="max-width: 50%;">
                                @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto" style="max-width: 100px;">
                                @endif
                                <?php
                                $wordCount = str_word_count($d->isi);
                                $maxWords = 10; // Jumlah maksimum kata yang ingin ditampilkan
                                $trimmedText = implode(' ', array_slice(explode(' ', $d->isi), 0, $maxWords));
                                $trimmedText .= $wordCount > $maxWords ? '...' : ''; // Tambahkan elipsis jika teks dipotong
                                ?>
                                <p><b>{!! $trimmedText !!}</b></p>
                                <div class="button">
                                    <a href="/view-berita/{{ $d->id }}">Lihat Selengkapnya....</a>
                                </div>
                            </li>
                            @endforeach
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
