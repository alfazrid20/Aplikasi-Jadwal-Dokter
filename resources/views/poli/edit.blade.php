@extends('backend.layouts')
@section('title', 'Edit Data Poli')
@section('content')
    <div class="page_title">
        <h2>Edit Data Poli</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.data-poli.update', ['id' => $polis->id]) }}">
                                @csrf
                                @method('PUT')
                                <label class="col-sm-2 control-label">Nama Poli</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama" class="form-control" placeholder="Ubah Nama Poli"
                                        value="{{ old('nama', $polis->nama) }}">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kode Poli</label>
                            <div class="col-sm-2">
                                <input type="text" name="kodepoli" class="form-control" placeholder="Kode Poli"
                                    value="{{ old('kodepoli', $polis->kodepoli) }}">
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="{{ URL::previous() }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
