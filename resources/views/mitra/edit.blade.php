@extends('backend.layouts')
@section('title', 'Edit Mitra')
@section('content')

<div class="page_title">
    <h2>Edit Mitra</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table_section padding_infor_info">
                    <form class="form-horizontal" method="POST" action="{{ route('backend.mitra.update', $mitra->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mitra</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Mitra" value="{{ $mitra->nama }}">
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-file-image-o"></i></span>
                                </div>
                                <input type="file" name="gambar" class="form-control" placeholder="gambar">
                                @if ($errors->has('gambar'))
                                    <span class="text-danger">{{ $errors->first('gambar') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="box-footer text-right"> 
                            <a href="{{ route('backend.mitra.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
