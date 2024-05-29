@extends('backend.layouts')
@section('title', 'Data Mitra')
@section('content')
    <div class="page_title">
        <h2>Mitra</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/mitra/create" class="btn btn-primary" id="tambahmitra"
                                data-bs-toggle="modal" data-bs-target="#modal-inputmitra"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Mitra</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="mitraTableBody">
                                    @foreach ($mitra as $d )
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td class="text-center">
                                        @if (!empty($d->gambar))
                                                <img src="{{ asset($d->gambar) }}" alt="Foto Loker" style="max-width: 50%;">
                                            @else
                                                <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto"  style="max-width: 100px;">
                                            @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="{{ route('backend.mitra.delete', $d->id) }}"
                                                method="POST">
                                                <a href="{{ route('backend.mitra.edit', $d->id) }}"
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
