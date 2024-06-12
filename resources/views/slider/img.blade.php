@extends('backend.layouts')
@section('title', 'Gambar Slider')
@section('content')
    <div class="page_title">
        <h2>Gambar</h2>
    </div>

    <div class="row">  
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/slider-foto/create" class="btn btn-primary" id="tambahfotoslider"
                                data-bs-toggle="modal" data-bs-target="#modal-inputfotoslider"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="sliderTableBody">
                                    @foreach ($foto as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            @if (!empty($f->foto_slider))
                                                <img src="{{ asset($f->foto_slider) }}"  style="max-width: 50%;">
                                            @else
                                                <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto"  style="max-width: 100px;">
                                            @endif
                                    </td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('backend.slider-foto.delete', $f->id) }}"
                                                    method="POST">
                                                    <a href="{{ route('backend.slider-foto.edit', $f->id) }}"
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
