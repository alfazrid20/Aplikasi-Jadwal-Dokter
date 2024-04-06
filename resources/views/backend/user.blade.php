@extends('backend.layouts')
@section('title', 'Data User')
@section('content')
    <div class="page_title">
        <h2>Data User</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/user/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data </a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="userTableBody">
                                    @foreach ($user as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->email }}</td>
                                            <td>
                                                @if (!empty($d->foto))
                                                <img src="{{ asset('storage/' . $d->foto) }}" alt="Foto Pengguna" class="avatar" style="max-width: 50px;">
                                            @else
                                                <img src="{{ asset('assets/img/nophoto.png') }}" alt="Tidak Ada Foto" class="avatar" style="max-width: 50px;">
                                            @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('backend.user.delete', $d->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('backend.user.edit', $d->id) }}"
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
