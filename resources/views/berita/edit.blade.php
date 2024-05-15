@extends('backend.layouts')
@section('title', 'Edit Data Berita')
@section('content')

<div class="page_title">
    <h2>Edit Data Berita</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table_section padding_infor_info">
                    <div class="form-group">
                        <form class="form-horizontal" method="POST" action="{{ route('backend.data-berita.update', $berita->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="{{ $berita->tanggal }}">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Judul Berita</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-file-text"></i></span>
                            </div>
                            <input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="{{ $berita->judul_berita }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Gambar</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-file-image-o"></i></span>
                            </div>
                            <input type="file" name="gambar" class="form-control" placeholder="Gambar">
                            @if (!empty($berita->gambar))
                                <img src="{{ asset($berita->gambar) }}" alt="Gambar Berita" style="max-width: 100px;">
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto" style="max-width: 100px;">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                            </div>
                            <select name="kategori_id" class="selectize-kategori form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $d)
                                <option value="{{ $d->id }}" {{ $d->id == $berita->kategori_id ? 'selected' : '' }}>{{ $d->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Isi</label>
                        <div class="col-12">
                            <textarea name="isi" id="editor" class="form-control bigger-textarea" rows="3">{{ $berita->isi }}</textarea>
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <a href="{{ route('backend.data-berita.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
