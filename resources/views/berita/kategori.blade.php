@extends('backend.layouts')
@section('title', 'Data Kategori')
@section('content')
    <div class="page_title">
        <h2>Data Kategori</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/kategori/create" class="btn btn-primary" id="tambahkategori"
                                data-bs-toggle="modal" data-bs-target="#modal-inputkategori"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="kategoriTableBody">
                                    @foreach ($kategori as $data )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('backend.kategori.delete', $data->id) }}"
                                                    method="POST">
                                                    <a href="{{ route('backend.kategori.edit', $data->id) }}"
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
