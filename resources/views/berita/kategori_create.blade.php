@extends('backend.layouts')
@section('title', 'Tambah Data Kategori')
@section('content')

    <div class="page_title">
        <h2>Tambah Data Kategori</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.kategori.store') }}">
                                @csrf
                                <label class="col-sm-2 control-label">Nama Kategori</label>
                                <div class="col-sm-6">
                                    <input type="text" name="kategori" class="form-control" placeholder="Nama Kategori"
                                        value="{{ old('kategori') }}">
                                </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="{{ route('backend.kategori.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
