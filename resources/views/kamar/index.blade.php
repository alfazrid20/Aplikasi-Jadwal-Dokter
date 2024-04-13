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
                        <div class="mb-3">
                            <a href="/backend/kamar/create" class="btn btn-primary" id="tambahkamar" data-bs-toggle="modal"
                                data-bs-target="#modal-inputdokter"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        {{-- <div class="mb-3 d-flex align-items-center">
                            <input type="text" id="searchInput" class="form-control mr-2" placeholder="Cari Nama Dokter">
                            <button class="btn btn-primary" id="searchBtn">Cari</button>
                        </div> --}}
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="kamarTableBody">
                                    @foreach ($kamar as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
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
                                            <td>{{ $d->tanggal_masuk }}</td>
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
