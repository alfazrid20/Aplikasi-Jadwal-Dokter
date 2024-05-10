@extends('backend.layouts')
@section('title', 'Jadwal Dokter')
@section('content')
    <div class="page_title">
        <h2>Jadwal Dokter</h2>
    </div>

    <style>
        .custom-badge {
            font-size: 1em;
            padding: 0.5em 0.5em;
        }   
    </style>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3 d-flex">
                            <a href="/backend/jadwal-dokter/create" class="btn btn-primary" id="tambahjadwal" data-bs-toggle="modal"
                            data-bs-target="#modal-inputjadwal"><i class="fa fa-plus"></i> Tambah
                            Data </a>
                            <form id="resetForm" action="/backend/jadwal-dokter/reset" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary mx-2"><i class="fa fa-refresh"></i> Reset</button>
                            </form>
                        </div>
                        <form action="/backend/jadwal-dokter" method="GET" id="searchForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                placeholder="Cari Dokter" style="width: 45%; margin-right: 5%;"
                                                value="{{ Request('nama') }}">
                                            <button class="btn btn-primary" type="submit" id="button-addon6"><i
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
                                        <th>Poli</th>
                                        <th>Nama Dokter</th>
                                        <th>Hari</th>
                                        <th>Jam Pelayanan</th>
                                        <th>Foto</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="jadwaldokterTableBody">
                                    @foreach ($jadwaldokter as $d)
                                        <tr> 
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->poli->nama }}</td>
                                            <td>{{ $d->dokter->nama }}</td>
                                            <td>{{ $d->hari }}</td>
                                            <td>{{ $d->jam_pelayanan }}</td>
                                            <td>
                                                @if (!empty($d->foto_dokter))
                                                    <img src="{{ asset($d->foto_dokter) }}" alt="Foto Dokter"  style="max-width: 100%;">
                                                @else
                                                    <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto"  style="max-width: 50px;">
                                                @endif
                                            </td>
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
                                                <form id="deleteForm_{{ $d->id }}" action="{{ route('backend.jadwal-dokter.delete', $d->id) }}" method="POST">
                                                    <a href="{{ route('backend.jadwal-dokter.edit', $d->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" onclick="confirmDelete({{ $d->id }})" class="btn btn-danger"><i class="fa fa-trash text-white"></i></button>
                                                </form>
                                        
                                                {{--  <form action="{{ route('backend.jadwal-dokter.reset', $d->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary">Reset</button>
                                                </form>  --}}
                                                
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

@push('myscript')   
    <script>
        document.getElementById('resetForm').addEventListener('submit', function(event) {
            event.preventDefault(); 
            Swal.fire({
                title: 'Apa Kamu Yakin?',
                text: "Data Yang Direset Adalah Jam Pelayanan & Keterangan",
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

    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data Yang Dihapus Tidak Dapat Dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect or submit delete form
                document.getElementById('deleteForm_' + id).submit();
            }
        });
    }

    document.getElementById('button-addon6').addEventListener('click', function() {
        document.getElementById('searchForm').submit();
    });
    
    </script>
    
@endpush
