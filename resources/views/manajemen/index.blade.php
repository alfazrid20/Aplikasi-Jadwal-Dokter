@extends('backend.layouts')
@section('title', 'Data Manajemen')
@section('content')
    <div class="page_title">
        <h2>Data Manajemen</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/staff/create" class="btn btn-primary" id="tambahmitra"
                                data-bs-toggle="modal" data-bs-target="#modal-inputmitra"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">No Telepon</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Departemen</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="mitraTableBody">
                                    @foreach ($staff as $d )
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->tgl_lahir }}</td>
                                    <td>{{ $d->jenis_kelamin }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ $d->no_telepon }}</td>
                                    <td>{{ $d->jabatan }}</td>
                                    <td>{{ $d->departemen }}</td>
                                    <td class="text-center">
                                        @if (!empty($d->foto))
                                                <img src="{{ asset($d->foto) }}" alt="Foto Loker" style="max-width: 50%;">
                                            @else
                                                <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto"  style="max-width: 100px;">
                                            @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="{{ route('backend.staff.delete', $d->id) }}"
                                                method="POST">
                                                <a href="{{ route('backend.staff.edit', $d->id) }}"
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
        @endsection
