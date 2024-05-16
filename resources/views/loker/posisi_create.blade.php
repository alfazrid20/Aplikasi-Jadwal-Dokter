@extends('backend.layouts')
@section('title', 'Job Position')
@section('content')

    <div class="page_title">
        <h2>Tambah Data</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.posisi.store') }}">
                                @csrf
                                <label class="col-sm-2 control-label">Posisi</label>
                                <div class="col-sm-6">
                                    <input type="text" name="posisi" class="form-control" placeholder="Posisi"
                                        value="{{ old('posisi') }}">
                                </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="{{ route('backend.posisi.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
