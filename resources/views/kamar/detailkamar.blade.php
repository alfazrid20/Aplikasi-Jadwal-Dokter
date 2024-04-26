@extends('backend.layouts')
@section('title', 'Detail Kamar')
@section('content')
    <div class="page_title">
        <h2>Detail Kamar</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/detail-kamar/create" class="btn btn-primary" id="tambahdetailkamar" data-bs-toggle="modal"
                                data-bs-target="#modal-inputdetailkamar"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <form action="/backend/detail-kamar" method="GET" id="searchForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="nama_kamar" id="nama_kamar" class="form-control"
                                                placeholder="Cari Kamar" style="width: 45%; margin-right: 5%;"
                                                value="{{ Request('nama_kamar') }}">
                                            <button class="btn btn-primary" type="submit" id="button-addon5"><i
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
                                        <th>Tempat Tidur</th>
                                        <th>Kamar Mandi</th>
                                        <th>Foto Kamar</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="kamarTableBody">
                                <tr>
                                    @foreach ($detailkamar as $d )
                                    <td>{{ $loop->iteration + $detailkamar->firstItem() - 1}}</td>
                                    <td>{{ $d->nama_kamar }}</td>
                                    <td>{{ $d->jeniskamar->nama_ruang }}</td>
                                    <td>{{ $d->tempat_tidur }}</td>
                                    <td>{{ $d->kamar_mandi }}</td>  
                                    <td>
                                        @if (!empty($d->foto_kamar))
                                            <img src="{{ asset($d->foto_kamar) }}" alt="Foto Kamar" class="avatar" style="max-width: 100%;">
                                        @else
                                            <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto" class="avatar" style="max-width: 50px;">
                                        @endif
                                    </td>
                                    
                                    <td>{{ $d->harga }}</td>

                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('backend.detail-kamar.delete', $d->id) }}"
                                                method="POST">
                                                <a href="{{ route('backend.detail-kamar.edit', $d->id) }}"
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
                            {{ $detailkamar->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        document.getElementById('button-addon5').addEventListener('click', function() {
            document.getElementById('searchForm').submit();
        });

        
    </script>
@endpush
