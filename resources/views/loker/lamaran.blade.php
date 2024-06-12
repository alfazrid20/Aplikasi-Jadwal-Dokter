@extends('backend.layouts')
@section('title', 'Data Pelamar')
@section('content')
    <div class="page_title">
        <h2>Data Lamaran</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <form action="{{ route('backend.lamaran.index') }}" method="GET" id="searchForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                placeholder="Cari Pelamar" style="width: 45%; margin-right: 5%;"
                                                value="{{ request('nama') }}">
                                            <button class="btn btn-primary" type="submit" id="button-addon4"><i
                                                    class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kandidat</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>No Handphone</th>
                                        <th>Alamat</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>IPK/Nilai</th>
                                        <th>Posisi Dilamar</th>
                                        <th>Dokumen</th>
                                        <th>Status Perkawinan</th>
                                        <th>Status Lamaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="lamaranTableBody">
                                    @foreach ($lamaran as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="#" class="nama-pelamar" data-toggle="modal" data-target="#pelamarModal"
                                                   data-nama="{{ $d->nama }}" data-email="{{ $d->email }}" data-no_hp="{{ $d->no_hp }}"
                                                   data-alamat="{{ $d->alamat }}" data-pendidikan="{{ $d->pendidikan_terakhir }}"
                                                   data-ipk="{{ $d->ipk }}" data-posisi="{{ $d->infoloker->posisi_id }}"
                                                   data-foto="{{ asset($d->foto) }}">
                                                    {{ $d->nama }}
                                                </a>
                                            </td>
                                            <td>{{ $d->email }}</td>
                                            <td>
                                                @if (!empty($d->foto))
                                                    <img src="{{ asset($d->foto) }}" alt="Foto Loker" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto"  style="max-width: 100px;">
                                                @endif
                                            </td>
                                            <td>{{ $d->no_hp }}</td>
                                            <td>{{ $d->alamat }}</td>
                                            <td class="text-center">{{ $d->pendidikan_terakhir }}</td>
                                            <td>{{ $d->ipk }}</td>
                                            <td>{{ $d->infoloker->posisi_id }}</td>
                                            <td>
                                                @if($d->dokumen)
                                                    <a href="{{ asset('storage/' . $d->dokumen) }}" target="_blank" class="btn btn-danger">Lihat Dokumen</a>
                                                @else
                                                    Tidak ada dokumen
                                                @endif
                                            </td>
                                            <td>{{ ucwords($d->status) }}</td>
                                            <td>
                                                @if ($d->status_lamaran == 0)
                                                    <span class="badge badge-warning">Waiting</span>
                                                @elseif ($d->status_lamaran == 1)
                                                    <span class="badge badge-primary">Process</span>
                                                @elseif ($d->status_lamaran == 2)
                                                    <span class="badge badge-danger">Denied</span>
                                                @elseif ($d->status_lamaran == 3)
                                                    <span class="badge badge-success">Hired</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form id="submitForm_{{ $d->id }}_1" action="{{ route('backend.lamaran.updateStatus', $d->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status_lamaran" value="1">
                                                        <button type="submit" class="btn btn-primary mb-2 mr-2"><i class="fa fa-check-circle"></i></button>
                                                    </form>
                                                    <form id="submitForm_{{ $d->id }}_2" action="{{ route('backend.lamaran.updateStatus', $d->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status_lamaran" value="2">
                                                        <button type="submit" class="btn btn-danger mr-2"><i class="fa fa-close text-white"></i></button>
                                                    </form>
                                                    <form id="submitForm_{{ $d->id }}_3" action="{{ route('backend.lamaran.updateStatus', $d->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status_lamaran" value="3">
                                                        @if ($d->status_lamaran == 1)
                                                            <button type="button" class="btn btn-info" onclick="confirmHire({{ $d->id }})"><i class="fa fa-check-square-o text-white"></i></button>
                                                        @else
                                                            <button type="button" class="btn btn-info" disabled><i class="fa fa-check-square-o text-white"></i></button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $lamaran->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pelamarModal" tabindex="-1" role="dialog" aria-labelledby="pelamarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pelamarModalLabel">Detail Pelamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img id="modalFoto" src="#" class="img-fluid" alt="Foto Pelamar" style="width: 100%; height: auto; margin-top: 20%">
                        </div>
                        <div class="col-md-8">
                            <p><span id="modalNama"></span></p>
                            <hr>
                            <p><span id="modalEmail"></span></p>
                            <hr>
                            <p><span id="modalNoHP"></span></p>
                            <hr>
                            <p><span id="modalAlamat"></span></p>
                            <hr>
                            <p><span id="modalPendidikan"></span></p>
                            <hr>
                            <p><span id="modalIPK"></span></p>
                            <hr>
                            <p><span id="modalPosisi"></span></p>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('myscript')
    <script>
        document.getElementById('button-addon4').addEventListener('click', function() {
            document.getElementById('searchForm').submit();
        });

        function confirmHire(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This candidate will be hired!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hire them!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('submitForm_' + id + '_3').submit();
                }
            });
        }

        // Event listener untuk menampilkan modal dan mengisi data
        document.querySelectorAll('.nama-pelamar').forEach(function(element) {
            element.addEventListener('click', function() {
                var nama = element.getAttribute('data-nama');
                var email = element.getAttribute('data-email');
                var no_hp = element.getAttribute('data-no_hp');
                var alamat = element.getAttribute('data-alamat');
                var pendidikan = element.getAttribute('data-pendidikan');
                var ipk = element.getAttribute('data-ipk');
                var posisi = element.getAttribute('data-posisi');
                var foto = element.getAttribute('data-foto');

                document.getElementById('modalNama').textContent = nama;
                document.getElementById('modalEmail').textContent = email;
                document.getElementById('modalNoHP').textContent = no_hp;
                document.getElementById('modalAlamat').textContent = alamat;
                document.getElementById('modalPendidikan').textContent = pendidikan;
                document.getElementById('modalIPK').textContent = ipk;
                document.getElementById('modalPosisi').textContent = posisi;
                document.getElementById('modalFoto').setAttribute('src', foto);
            });
        });
    </script>
@endpush
