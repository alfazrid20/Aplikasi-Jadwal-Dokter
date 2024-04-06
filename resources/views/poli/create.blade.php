@extends('backend.layouts')
@section('title', 'Tambah Data Poli')
@section('content')

    <div class="page_title">
        <h2>Tambah Data Poli</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.jadwal-dokter.store') }}">
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

                                <label class="col-sm-2 control-label">Nama Poli</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Poli"
                                        value="{{ old('nama') }}">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kode Poli</label>
                            <div class="col-sm-2">
                                <input type="text" name="kodepoli" class="form-control" placeholder="Kode Poli"
                                    value="{{ old('kodepoli') }}">
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <a href="{{ URL::previous() }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
