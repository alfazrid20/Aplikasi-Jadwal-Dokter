@extends('backend.layouts')
@section('title', 'Data Slider')
@section('content')
    <div class="page_title">
        <h2>Data Slider</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/slider/create" class="btn btn-primary" id="tambahslider"
                                data-bs-toggle="modal" data-bs-target="#modal-inputslider"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Slider</th>
                                        <th>Konten</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="sliderTableBody">
                                    @foreach ($slider as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->konten }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('backend.slider.delete', $data->id) }}"
                                                    method="POST">
                                                    <a href="{{ route('backend.slider.edit', $data->id) }}"
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
