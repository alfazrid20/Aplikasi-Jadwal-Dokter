@extends('backend.layouts')
@section('title', 'Tambah Gambar')
@section('content')

    <div class="page_title">
        <h2>Tambah Gambar</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <form class="form-horizontal" method="POST" action="{{ route('backend.slider-foto.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                                <label class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-6">
                                    <input type="file" name="foto_slider" class="form-control"
                                        value="{{ old('foto_slider') }}">
                                </div>
                        </div>
                        
                        <div class="box-footer text-right">
                            <a href="{{ route('backend.slider.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
