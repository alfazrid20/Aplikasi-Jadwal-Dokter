@extends('backend.layouts')
@section('title', 'Edit Data Slider')
@section('content')

    <div class="page_title">
        <h2>Edit Data Slider</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <form class="form-horizontal" method="POST" action="{{ route('backend.slider.update', $slider->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Judul</label>
                                <div class="col-sm-6">
                                    <input type="text" name="judul" class="form-control" placeholder="Judul"
                                        value="{{ old('judul', $slider->judul) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Konten</label>
                                <div class="col-sm-6">
                                    <textarea name="konten" class="form-control">{{ old('konten', $slider->konten) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-6">
                                    <input type="file" name="gambar" class="form-control" placeholder="Gambar"
                                        value="{{ old('gambar', $slider->gambar) }}">
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
