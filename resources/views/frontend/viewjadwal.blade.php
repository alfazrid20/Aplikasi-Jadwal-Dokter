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

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card"
                style="background-image: url('{{ asset('frontend/images/jadwal.jpeg') }}'); background-size: cover; border: none; text-align: center;">
                <div class="card-body">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="logors"
                        style="max-width: 100px; margin: auto;">
                </div>
                <div class="card-body">
                    <h2 style="color: rgb(236, 0, 0);">Jadwal Dokter Spesialis</h2>
                </div>
                <div class="card-body">
                    <h2 style="color: rgb(255, 0, 0);">{{ date('d-m-Y', strtotime(date('Y-m-d'))) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card"
                style="background-image: url('{{ asset('frontend/images/rs.jpg') }}'); background-size: cover; border: none; text-align: center; ">
                <div class="card-body">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="logors"
                        style="max-width: 100px; margin: auto;">
                </div>
                <div class="card-body">
                    <h2 style="color: white;">Ketersediaan Kamar</h2>
                </div>
                <div class="card-body">
                    <h2 style="color: white;">{{ date('d-m-Y', strtotime(date('Y-m-d'))) }}</h2>
                </div>
            </div>
        </div>
    </div>



    {{-- <br>
    <button onclick="location.href='URL_KAMAR_TERSEDIA'" class="btn btn-success" style="margin-left: 30px;">Ketersediaan
        Kamar</button>
    <button onclick="location.href='URL_KAMAR_TERSEDIA'" class="btn btn-success" style="margin-left: 70%;">Ketersediaan
        Kamar</button> --}}

    <div class="row justify-content-center" style="margin-top: 30px">
        <div class="col-md-6">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="table" style="background-color: rgb(88, 216, 163)">
                        <tr>
                            <th><b>No</b></th>
                            <th><b>Poli</b></th>
                            <th><b>Nama Dokter</b></th>
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
                                <td style="color: black; font-weight: bold; padding-left: 3%">
                                    <b>{{ $d->jam_pelayanan }}</b>
                                </td>
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
        <div class="col-md-6">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kamar</th>
                            <th>Jenis Kamar</th>
                            <th>Posisi</th>
                            <th>Status</th>
                            <th>Jumlah Pasien</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                    </thead>
                    <tbody id="kamarTableBody">
                        @foreach ($kamar as $d)
                            @if ($d->status == 'TERISI')
                                <tr>
                                    <td style="color: black; font-weight: bold;">{{ $loop->iteration }}</td>
                                    <td style="color: black; font-weight: bold; padding-left: 4%">{{ $d->nama_kamar }}
                                    </td>
                                    <td style="color: black; font-weight: bold; padding-left: 4%">
                                        {{ $d->jeniskamar->nama_ruang }}</td>
                                    <td style="color: black; font-weight: bold;">{{ $d->posisi }}</td>
                                    <td>
                                        <span
                                            class="badge badge-primary badge-lg custom-badge">{{ $d->status }}</span>
                                    </td>
                                    <td style="color: black; font-weight: bold; padding-left: 7%">
                                        {{ $d->jumlah_pasien }}</td>
                                    <td style="color: black; font-weight: bold;">{{ $d->tanggal_masuk }}</td>
                                </tr>
                            @endif
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
