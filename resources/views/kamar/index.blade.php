@extends('backend.layouts')
@section('title', 'Ketersediaan Kamar ')
@section('content')
    <div class="page_title">
        <h2>Ketersediaan Kamar</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3 d-flex">
                            <a href="/backend/kamar/create" class="btn btn-primary" id="tambahkamar" data-bs-toggle="modal"
                                data-bs-target="#modal-inputkamar"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                                <form id="resetForm" action="/backend/kamar/reset" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary mx-2"><i class="fa fa-refresh"></i> Reset</button>
                                </form>
                        </div>
                        <form action="/backend/kamar" method="GET" id="searchForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="nama_kamar" id="nama_kamar" class="form-control"
                                                placeholder="Cari Kamar" style="width: 45%; margin-right: 5%;"
                                                value="{{ Request('nama_kamar') }}">
                                            <button class="btn btn-primary" type="submit" id="button-addon2"><i
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
                                        <th>Nama Kamar</th>
                                        <th>Jenis Kamar</th>
                                        <th>Posisi</th>
                                        <th>Status</th>
                                        <th>Jumlah Pasien</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="kamarTableBody">
                                    @foreach ($kamar as $d)
                                        <tr>
                                            <td>{{ $loop->iteration + $kamar->firstItem() - 1 }}</td>
                                            <td>{{ $d->nama_kamar }}</td>
                                            <td>{{ $d->jeniskamar->nama_ruang }}</td>
                                            <td>{{ $d->posisi }}</td>
                                            <td>
                                                @if ($d->status == 'TERISI')
                                                    <span
                                                        class="badge badge-primary badge-lg custom-badge">{{ $d->status }}</span>
                                                @elseif ($d->status == 'KOSONG')
                                                    <span
                                                        class="badge badge-danger badge-lg custom-badge">{{ $d->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $d->jumlah_pasien }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('backend.kamar.delete', $d->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('backend.kamar.edit', $d->id) }}"
                                                            class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash text-white"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $kamar->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        document.getElementById('button-addon2').addEventListener('click', function() {
            document.getElementById('searchForm').submit();
        });

        document.getElementById('resetForm').addEventListener('submit', function(event) {
            event.preventDefault(); 
            Swal.fire({
                title: 'Apa Kamu Yakin?',
                text: "Data Yang Direset Adalah Status & Jam Pasien",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        });
    </script>
@endpush
