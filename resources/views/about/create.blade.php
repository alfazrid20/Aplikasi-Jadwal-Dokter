@extends('backend.layouts')
@section('title', 'Tambah Fasiitas')
@section('content')

    <div class="page_title">
        <h2>Tambah Fasilitas</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.about.store') }}" enctype="multipart/form-data">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <label class="col-sm-2 control-label">Fasilitas</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama_fasilitas" class="form-control" placeholder="Fasilitas"
                                        value="{{ old('nama_fasilitas') }}">
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gambar</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-file-image-o"></i></span>
                                        </div>
                                        <input type="file" name="gambar" class="form-control" placeholder="Gambar">
                                    </div>
                                </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="/backend/about" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
