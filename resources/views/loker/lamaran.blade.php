@extends('backend.layouts')
@section('title', 'Data Lowongan Pekerjaan')
@section('content')
    <div class="page_title">
        <h2>Lowongan Pekerjaan</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/loker/create" class="btn btn-primary" id="tambahloker"
                                data-bs-toggle="modal" data-bs-target="#modal-inputloker"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <form action="/backend/loker" method="GET" id="searchForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                placeholder="Cari Data" style="width: 45%; margin-right: 5%;"
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
                                        <th>Posisi</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Persyaratan</th>
                                        <th>Batas Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dokterTableBody">
                                    @foreach ($loker as $d )
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->posisi }}</td>
                                    <td>
                                        @if (!empty($d->foto_loker))
                                                <img src="{{ asset($d->foto_loker) }}" alt="Foto Loker" style="max-width: 100%;">
                                            @else
                                                <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto"  style="max-width: 100px;">
                                            @endif
                                    </td>
                                    <td>{!! $d->deskripsi !!}</td>
                                    <td>{!! $d->persyaratan !!}</td>
                                    <td>{{ $d->batas_waktu }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('backend.loker.delete', $d->id) }}"
                                                method="POST">
                                                <a href="{{ route('backend.loker.edit', $d->id) }}"
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
                            {{--  {{ $dokter->links('vendor.pagination.bootstrap-5') }}  --}}
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @push('myscript')
            <script>
                document.getElementById('button-addon9').addEventListener('click', function() {
                    document.getElementById('searchForm').submit();
                });
            </script>
        @endpush
