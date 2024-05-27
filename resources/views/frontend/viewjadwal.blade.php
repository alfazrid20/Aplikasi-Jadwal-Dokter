        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
            <title>Informasi Jadwal Dokter</title>
            <link rel="shortcut icon" href="{{ asset('frontend/images/logo.ico') }}" type="image/x-icon">
            <!-- Bootstrap core CSS -->
            <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
            <!-- Additional CSS Files -->
            <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/css/templatemo-villa-agency.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
            <style>
                /* Set video as background */
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
                /* Overlay to make text more readable */
                .overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    /* Adjust the opacity as needed */
                    z-index: -1;
                }
                /* Styles for content */
                .content {
                    position: relative;
                    z-index: 1;
                    color: white;
                    text-align: center;
                    padding: 100px 0;
                    /* Adjust padding as needed */
                }
                .card {
                    background-color: rgba(255, 255, 255, 0.8);
                    /* Ubah nilai alpha (a) sesuai kebutuhan */
                }

                .marquee-container {
                    overflow: hidden;
                    white-space: nowrap;
                    box-sizing: border-box;
                    width: 100%;
                    color: white;
                    margin-top: 20px;
                    /* background: transparent; /* Remove this line or set it to transparent if needed */
                }
        
                .marquee-content {
                    display: inline-block;
                    padding-left: 100%;
                    animation: marquee 20s linear infinite;
                }
        
                .marquee-content img {
                    vertical-align: middle;
                    margin-left: 30px;
                }
        
                @keyframes marquee {
                    0% { transform: translateX(100%); }
                    100% { transform: translateX(-100%); }
                }

            
            </style>
        </head>
        <body>

            <video autoplay muted loop id="video-background">
                <source src="{{ asset('frontend/images/backgroundvideo.mp4') }}" type="video/mp4">
            </video>
            <div class="overlay"></div>

            <div class="container-fluid main-banner">
                <div class="row">
                    <div class="col-md-7 mx-auto" style="margin-top: 1%">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($jadwaldokter as $key => $d)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="card mt-2">
                                        <h5 class="card-header text-center bg-success text-white">Jadwal Praktek Dokter Spesialis <br>{{ date('d-m-Y', strtotime(date('Y-m-d'))) }}</h5>
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-md-4 mb-3 mb-md-0">
                                                    <img src="{{ asset($d->foto_dokter) }}" class="img-fluid rounded" alt="Foto Dokter">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5 class="card-title" style="font-size: 25px"><span class="badge text-bg-success">{{ $d->dokter->nama }}</span></h5>
                                                    <br>
                                                    <p class="card-text" style="font-size: 25px;"><span class="badge text-bg-success">SPESIALIS {{ $d->poli->nama }}</span></p>
                                                    <br>
                                                    <p class="card-text" style="font-size: 25px;"><span class="badge text-bg-success">JAM PRAKTEK : {{ $d->jam_pelayanan }}</span></p>
                                                    <br>
                                                    @php
                                                    $status = $d->keterangan;
                                                    $badge_class = '';
                                                    switch($status) {
                                                        case 'Tersedia':
                                                            $badge_class = 'badge bg-primary';
                                                            break;
                                                        case 'Tidak Tersedia':
                                                            $badge_class = 'badge bg-danger';
                                                            break;
                                                        case 'Dalam Perjalanan':
                                                            $badge_class = 'badge bg-info';
                                                            break;
                                                        default:
                                                            $badge_class = 'badge bg-secondary';
                                                    }
                                                    @endphp
                                                    <span class="badge {{ $badge_class }}" style="font-size: 25px">{{ $status }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
                    
                  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="text-align: center">
                    <div class="carousel-inner">
                        @foreach($kamar->chunk(3) as $chunk)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $kamar)
                                        <div class="col-md-4">
                                            <div class="card mt-2">
                                                <div class="card-header text-center bg-success text-white">Informasi Kamar</div>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                                                    <p class="card-text"><span class="badge text-bg-success">{{ $kamar->jeniskamar->nama_ruang }}</span></p>    
                                                    <p class="card-text">Status:     
                                                        @if($kamar->status == 'TERISI')
                                                            <span class="badge bg-primary">{{ $kamar->status }}</span>
                                                        @elseif($kamar->status == 'KOSONG')
                                                            <span class="badge bg-danger">{{ $kamar->status }}</span>
                                                        @else
                                                            {{ $kamar->status }}
                                                        @endif
                                                    </p>
                                                    <p class="card-text"><span class="badge text-bg-success">Jumlah Pasien: {{ $kamar->jumlah_pasien }}</span>
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                

                </div>
                </div>
                <div class="marquee-container">
                    <div class="marquee-content">   
                        <img src="{{ asset('frontend/images/icon.png') }}" alt="Mobile JKN" style="width: 20%;">
                        <img src="{{ asset('frontend/images/plystr.png') }}" alt="Mobile JKN" style="width: 20%;">
                        <i>Pendaftaran Poliklinik Bisa Melalui Aplikasi Mobile JKN</i>
                    </div>
                </div>

            <!-- Bootstrap core JavaScript -->
            <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
            <!-- Sweet Alert -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $(document).ready(function(){
                    function startCarousel() {
                        var carouselInterval = 5000; 
                        var refreshInterval = 10000; 
            
                        $('#carouselExampleInterval').carousel({
                            interval: carouselInterval
                        });
            
                        function refreshPage() {
                            location.reload();
                        }
            
                        function checkCarouselStopped() {
                            var $carousel = $('#carouselExampleInterval');
                            var $activeItem = $carousel.find('.carousel-item.active');
            
                            if ($activeItem.length === 0) {
                                setTimeout(refreshPage, refreshInterval);
                            }
                        }
            
                        $('#carouselExampleInterval').on('slid.bs.carousel', function () {
                            checkCarouselStopped();
                        });
            
                        setInterval(checkCarouselStopped, refreshInterval);
                    }
            
                    startCarousel();
                }); 
            </script>
            
            
        </body>
        </html>
