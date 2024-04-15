@extends('backend.layouts')
@section('title', 'Data Dokter')
@section('content')
    <div class="page_title">
        <h2>Data Dokter</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/data-dokter/create" class="btn btn-primary" id="tambahdokter"
                                data-bs-toggle="modal" data-bs-target="#modal-inputdokter"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <form action="/backend/data-dokter" method="GET" id="searchForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                placeholder="Cari Kamar" style="width: 45%; margin-right: 5%;"
                                                value="{{ Request('nama') }}">
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
                                        <th>Nama Dokter</th>
                                        <th>Spesialis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dokterTableBody">
                                    @foreach ($dokter as $d)
                                        <tr>
                                            <td>{{ $loop->iteration + $dokter->firstitem() - 1 }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->poli->nama }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('backend.data-dokter.delete', $d->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('backend.data-dokter.edit', $d->id) }}"
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
                            {{ $dokter->links('vendor.pagination.bootstrap-5') }}
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
            </script>
        @endpush
