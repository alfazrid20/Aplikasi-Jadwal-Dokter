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
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->email }}</td>
                                            <td>{{ $d->no_hp }}</td>
                                            <td>{{ $d->alamat }}</td>
                                            <td class="text-center">{{ $d->pendidikan_terakhir }}</td>
                                            <td>{{ $d->ipk }}</td>
                                            <td>{{ $d->infoloker->posisi_id }}</td>
                                            <td>
                                                @if($d->dokumen)
                                                    <a href="{{ asset('storage/' . $d->dokumen) }}" target="_blank" class="btn btn-success">Lihat Dokumen</a>
                                                @else
                                                    Tidak ada dokumen
                                                @endif
                                            </td>
                                            <td>{{ ucwords($d->status) }}</td>
                                            <td>
                                                @if ($d->status_lamaran == 0)
                                                    <span class="badge badge-success">Waiting</span>
                                                @elseif ($d->status_lamaran == 1)
                                                    <span class="badge badge-primary">Process</span>
                                                @elseif ($d->status_lamaran == 2)
                                                    <span class="badge badge-danger">Denied</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('backend.lamaran.updateStatus', $d->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status_lamaran" value="1">
                                                        <button type="submit" class="btn btn-primary mb-2" style="width: 100px;"><i class="fa fa-check-circle"></i></button>
                                                    </form>
                                                    <form action="{{ route('backend.lamaran.updateStatus', $d->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status_lamaran" value="2">
                                                        <button type="submit" class="btn btn-danger" style="width: 100px;"><i class="fa fa-close text-white"></i></button>
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
@endsection

@push('myscript')
    <script>
        document.getElementById('button-addon10').addEventListener('click', function() {
            document.getElementById('searchForm').submit();
        });
    </script>
@endpush
