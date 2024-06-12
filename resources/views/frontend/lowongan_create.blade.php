<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail Lowongan</title>
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

<body>

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <h1>RSUA<span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/lowongan-pekerjaan" class="active">Lowongan Pekerjaan</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="breadcrumbs d-flex align-items-center" style="background: url('{{ asset('frontend/img/rs.png') }}')">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2>Lamaran</h2>
      <ol>
        <li><a href="/">Home</a></li>
        <li>Lamaran</li>
      </ol>
    </div>
  </div>

    <div class="container mt-5 mb-2">
        <div class="card">
            <div class="container">
                <h2 class="mt-5 text-center text-dark" style="font-family: 'Times New Roman', Times, serif">Ajukan Lamaran</h2>
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
                            <label for="posisi_id"><b>Posisi yang Dilamar</b></label>
                            <select class="form-control" id="posisi_id" name="posisi_id" required>
                                <option value="">Pilih Posisi</option>
                                @foreach($loker as $d)
                                    <option value="{{ $d->id }}" data-status="{{ $d->status_loker }}">{{ $d->posisi_id }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger"><i>*Wajib Diisi</i></small>
                        </div>
                        <div class="col-6">
                            <label for="status"><b>Status Perkawinan</b></label>
                            <select class="form-control" id="status" name="status">
                                <option value="single">Belum Menikah</option>
                                <option value="married">Menikah</option>
                            </select>
                            <small class="form-text text-danger"><i>*Wajib Diisi dan Pilih terlebih dahulu</i></small>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row mt-2">
                        <div class="col-6">
                            <label for="dokumen"><b>Dokumen (CV, Ijazah, Dokumen Pendukung, dll)</b></label>
                            <input type="file" class="form-control" id="dokumen" name="dokumen">
                            <small class="form-text text-danger"><i>*Wajib Diisi Format PDF</i></small>
                        </div>

                        <div class="col-6">
                            <label for="dokumen"><b>Foto 3x4</b></label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <small class="form-text text-danger"><i>*Wajib Diisi Format PNG Max : 2 MB</i></small>
                        </div>
                    </div>
                    <div class="button mt-2 mb-2 text-center">
                        <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short">
    </i>
    </a>
    
      
         
    
      <div id="preloader"></div>

    <!-- Scripts -->
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('frontend/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.getElementById('posisi_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var status = selectedOption.getAttribute('data-status');
        if (status === 'Tutup') {
            alert('Maaf, Lowongan Ini Belum Dibuka');
            // Atau Anda dapat menggunakan library swal untuk alert yang lebih menarik
            // Swal.fire({
            //     title: 'Perhatian!',
            //     text: 'Maaf, Lowongan Ini Belum Dibuka',
            //     icon: 'warning'
            // });
            }
        });
        function validateForm() {
            var nama = document.getElementById('nama').value;
            var email = document.getElementById('email').value;
            var alamat = document.getElementById('alamat').value;
            var no_hp = document.getElementById('no_hp').value;
            var pendidikan_terakhir = document.getElementById('pendidikan_terakhir').value;
            var ipk = document.getElementById('ipk').value;
            var posisi_id = document.getElementById('posisi_id').value;
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

            if (posisi_id.trim() === '') {
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
