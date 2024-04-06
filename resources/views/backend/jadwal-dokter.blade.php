@extends('backend.layouts')
@section('title', 'Jadwal Dokter')
@section('content')
    <div class="page_title">
        <h2>Jadwal Dokter</h2>
    </div>

    <style>
        .custom-badge {
            font-size: 1em;
            /* Sesuaikan ukuran font sesuai kebutuhan */
            padding: 0.5em 0.5em;
            /* Sesuaikan padding sesuai kebutuhan */
        }
    </style>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/jadwal-dokter/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Poli</th>
                                        <th>Nama Dokter</th>
                                        <th>Hari</th>
                                        <th>Jam Pelayanan</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="jadwaldokterTableBody">
                                    @foreach ($jadwaldokter as $d)
                                        <tr> <!-- Tambahkan tag <tr> untuk setiap baris data -->
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->poli->nama }}</td>
                                            <td>{{ $d->dokter->nama }}</td>
                                            <td>{{ $d->hari }}</td>
                                            <td>{{ $d->jam_pelayanan }}</td>
                                            <td>
                                                @if ($d->keterangan == 'Tersedia')
                                                    <span
                                                        class="badge badge-primary custom-badge ">{{ $d->keterangan }}</span>
                                                @elseif ($d->keterangan == 'Dalam Perjalanan')
                                                    <span class="badge badge-info custom-badge">{{ $d->keterangan }}</span>
                                                @elseif ($d->keterangan == 'Tidak Tersedia')
                                                    <span
                                                        class="badge badge-danger custom-badge">{{ $d->keterangan }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('backend.jadwal-dokter.delete', $d->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('backend.jadwal-dokter.edit', $d->id) }}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
