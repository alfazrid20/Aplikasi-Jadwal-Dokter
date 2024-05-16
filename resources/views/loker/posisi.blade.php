@extends('backend.layouts')
@section('title', 'Data Posisi')
@section('content')
    <div class="page_title">
        <h2>Job Position</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/posisi/create" class="btn btn-primary" id="tambahposisi"
                                data-bs-toggle="modal" data-bs-target="#modal-inputposisi"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Posisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="kategoriTableBody">
                                    @foreach ($posisi as $data )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->posisi }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('backend.kategori.delete', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
