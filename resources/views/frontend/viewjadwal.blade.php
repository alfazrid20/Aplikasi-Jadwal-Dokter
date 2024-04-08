<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Informasi Jadwal Dokter</title>
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.ico') }}" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
</head>

<body>
    <!-- ***** Header Area ***** -->
    <header class="header-area header-sticky" style="background-color: rgb(88, 216, 163)">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <nav class="main-nav">
                        <a href="/" class="gambar">
                            <img src="{{ asset('frontend/images/logo.png') }}" style="width: 100px" alt="Gambar">
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col">
            <div class="card" style="background-color: rgb(88, 216, 163); border: none;">
                <div class="card-body">
                    <h2 style="text-align: center; color: white;">Jadwal Dokter Spesialis</h2>
                </div>
                <div class="card-body">
                    <h2 style="text-align: center; color: white;">{{ date('d-m-Y', strtotime(date('Y-m-d'))) }}</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center" style="margin-top: 30px">
        <div class="col-md-10">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="table" style="background-color: rgb(88, 216, 163)">
                        <tr>
                            <th><b>No</b></th>
                            <th><b>Poli</b></th>
                            <th><b>Nama Dokter</b></th>
                            {{-- <th><b>Hari</b></th> --}}
                            <th><b>Jam Pelayanan</b></th>
                            <th><b>Keterangan</b></th>
                        </tr>
                    </thead>
                    <tbody id="jadwaldokterTableBody">
                        @foreach ($jadwaldokter as $d)
                            <tr> <!-- Tambahkan tag <tr> untuk setiap baris data -->
                                <td style="color: black; font-weight: bold;"><b>{{ $loop->iteration }}</b></td>
                                <td style="color: black; font-weight: bold;"><b>{{ $d->poli->nama }}</b></td>
                                <td style="color: black; font-weight: bold;"><b>{{ $d->dokter->nama }}</b></td>
                                <td style="color: black; font-weight: bold; padding-left: 5%">
                                    <b>{{ $d->jam_pelayanan }}</b>
                                </td>

                                {{-- <td><b>{{ $d->hari }}</b></td> --}}
                                {{-- <td><b style="padding-left: 30%;">{{ $d->jam_pelayanan }}</b></td> --}}
                                <td>
                                    @if ($d->keterangan == 'Tersedia')
                                        <span class="badge badge-primary custom-badge">{{ $d->keterangan }}</span>
                                    @elseif ($d->keterangan == 'Dalam Perjalanan')
                                        <span class="badge badge-info custom-badge">{{ $d->keterangan }}</span>
                                    @elseif ($d->keterangan == 'Tidak Tersedia')
                                        <span class="badge badge-danger custom-badge">{{ $d->keterangan }}</span>
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



        </div>
    </div>

    <!-- ***** Header Area End ***** -->


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/counter.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('assets/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/utils.js') }}"></script>
    <script src="{{ asset('assets/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('assets/js/chart_custom_style1.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</body>

</html>
