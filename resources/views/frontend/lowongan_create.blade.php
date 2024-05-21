<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Detail Lowongan</title>
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.ico') }}" type="image/x-icon">
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-image: url('{{ asset('frontend/images/rs.jpg') }}');
            background-size: cover;
            background-position: center 5%;
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
                        <li><i class="fa fa-envelope"></i> rsuaisyiyahpadang@gmail.com</li>
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
                            <li><a href="/lowongan-pekerjaan">Lowongan Pekerjaan</a></li>
                            <li><a href="/#" class="active">Ajukan Lamaran</a></li>
                            <li><a href="/view-jadwal"><i class="fa fa-calendar"></i>Jadwal Dokter Spesialis</a></li>
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-5 mb-2">
        <div class="card">
            <div class="container">
                <h2 class="mt-5 text-center" style="font-family: 'Times New Roman', Times, serif">Ajukan Lamaran</h2>
                <hr>
                <form id="lamaranForm" action="{{ route('lowongan.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return showConfirmationAlert(event)">
                    @csrf
                    <div class="form-group row mt-2">
                        <div class="col-6">
                            <label for="nama"><b>Nama Lengkap</b></label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="form-text text-danger"><i>*Wajib Diisi</i></small>
                        </div>
                        <div class="col-6">
                            <label for="email"><b>Email</b></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <small class="form-text text-danger"><i>*Wajib Diisi</i></small>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <div class="col-6">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                            <small class="form-text text-danger"><i>*Wajib Diisi</i></small>
                        </div>
                        <div class="col-6">
                            <label for="no_hp"><b>No HP</b></label>
                            <input type="tel" class="form-control" id="no_hp" maxlength="13" name="no_hp" placeholder="ex . 08xx xxxx xxxx">
                            <small class="form-text text-danger"><i>*Wajib Diisi</i></small>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <div class="col-6">
                            <label for="pendidikan_terakhir"><b>Pendidikan Terakhir</b></label>
                            <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" maxlength="5">
                            <small class="form-text text-danger"><i>*Wajib Diisi, Contoh : S1/S2/D4/D3/SMA/SMK</i></small>
                        </div>
                        <div class="col-6">
                            <label for="ipk"><b>IPK / Nilai Ijazah Terakhir</b></label>
                            <input type="text" class="form-control" id="ipk" name="ipk" maxlength="5" pattern="[0-9.]+" title="Masukkan angka dan titik saja">
                            <small class="form-text text-danger"><i>*Wajib Diisi, Contoh : IPK 3.00, SMA Sederajat : 85</i></small>
                        </div>                                          
                    </div>
                    <div class="form-group row mt-2">
                        <div class="col-6">
                            <label for="posisi"><b>Posisi yang Dilamar</b></label>
                            <select class="form-control" id="posisi_dilamar" name="posisi_dilamar" required>
                                <option value="">Pilih Posisi</option>
                                @foreach($lokerData as $loker)
                                    <option value="{{ $loker->id }}" data-status="{{ $loker->status_loker }}">{{ $loker->posisi }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger"><i>*Wajib Diisi</i></small>
                        </div>
                        <div class="col-6">
                            <label for="status_perkawinan"><b>Status Perkawinan</b></label>
                            <select class="form-control" id="status" name="status">
                                <option value="single">Belum Menikah</option>
                                <option value="married">Menikah</option>
                            </select>
                            <small class="form-text text-danger"><i>*Wajib Diisi dan Pilih terlebih dahulu</i></small>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row mt-2">
                        <div class="col-12">
                            <label for="dokumen"><b>Dokumen (CV, Ijazah, Foto, Dokumen Pendukung, dll)</b></label>
                            <input type="file" class="form-control" id="dokumen" name="dokumen">
                            <small class="form-text text-danger"><i>*Wajib Diisi Format PDF</i></small>
                        </div>
                    </div>
                    <div class="button mt-2 mb-2 text-center">
                        <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/counter.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script>
        function validateForm() {
            var nama = document.getElementById('nama').value;
            var email = document.getElementById('email').value;
            var alamat = document.getElementById('alamat').value;
            var no_hp = document.getElementById('no_hp').value;
            var pendidikan_terakhir = document.getElementById('pendidikan_terakhir').value;
            var ipk = document.getElementById('ipk').value;
            var posisi_dilamar = document.getElementById('posisi_dilamar').value;
            var dokumen = document.getElementById('dokumen').value;

            if (nama.trim() === '') {
                alert('Nama harus diisi');
                return false;
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Email tidak valid');
                return false;
            }

            if (alamat.trim() === '') {
                alert('Alamat harus diisi');
                return false;
            }

            if (no_hp.trim() === '') {
                alert('No HP harus diisi');
                return false;
            }

            if (pendidikan_terakhir.trim() === '') {
                alert('Pendidikan terakhir harus diisi');
                return false;
            }

            if (ipk.trim() === '') {
                alert('IPK harus diisi');
                return false;
            }

            if (posisi_dilamar.trim() === '') {
                alert('Posisi yang dilamar harus dipilih');
                return false;
            }

            if (dokumen.trim() === '') {
                alert('Dokumen harus diunggah');
                return false;
            }

            return true; 
        }

        function showConfirmationAlert(event) {
            event.preventDefault(); // Prevent form from submitting immediately
            if (!validateForm()) {
                return false; // If form validation fails, do not proceed
            }

            Swal.fire({
                title: "Apa kamu yakin Datanya Sudah Benar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Display success alert before submitting form
                    Swal.fire({
                        title: "Success",
                        text: "Data Berhasil Dikirim dan Segera Diproses",
                        icon: "success"
                    }).then(() => {
                        // Submit the form after displaying success alert
                        document.getElementById('lamaranForm').submit();
                    });
                }
            });
        }
    </script>
</body>
</html>
