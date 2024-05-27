@extends('backend.layouts')
@section('title', 'Tambah Data Slider')
@section('content')

    <div class="page_title">
        <h2>Tambah Data Slider</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <form class="form-horizontal" method="POST" action="{{ route('backend.slider.store') }}">
                            @csrf
                        <div class="form-group">
                                <label class="col-sm-2 control-label">Judul</label>
                                <div class="col-sm-6">
                                    <input type="text" name="judul" class="form-control" placeholder="Judul"
                                        value="{{ old('judul') }}">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Konten</label>
                            <div class="col-sm-6">
                                <textarea name="konten" class="form-control">{{ old('konten') }}</textarea>
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
