@extends('backend.layouts')
@section('title', 'Tambah Detail Kamar')
@section('content')

    <div class="page_title">
        <h2>Tambah Detail Kamar</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.detail-kamar.store') }}" enctype="multipart/form-data">
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

                                <label class="col-sm-2 control-label required">Nama Kamar</label>
                                <div class="col-sm-6 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-bed"></i></span>
                                        <input type="text" name="nama_kamar" class="form-control"
                                            placeholder="Nama Kamar" value="{{ old('nama_kamar') }}">
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Jenis Kamar</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-bed"></i></span>
                                </div>
                                <select type="text" name="jenis_ruang_id" class="selectize-jenis"
                                    placeholder="Jenis Kamar" required>
                                    <option value="">Jenis Kamar</option>
                                    @foreach ($jeniskamar as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama_ruang }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Tempat Tidur</label>
                            <div class="col-sm-2 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-bed"></i></span>
                                </div>
                                <input type="text" name="tempat_tidur" class="form-control" placeholder="Jumlah Tempat Tidur"
                                    value="{{ old('tempat_tidur') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Kamar Mandi</label>
                            <div class="col-sm-4 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-child"></i></span>
                                </div>
                                <input type="text" name="kamar_mandi" class="form-control" placeholder="Jumlah Kamar Mandi"
                                    value="{{ old('kamar_mandi') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Foto Kamar</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                                </div>
                                <input type="file" name="foto_kamar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Harga</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-money"></i></span>
                                </div>
                                <input type="text" name="harga" class="form-control" placeholder="Misal, Rp. 1.000.000"
                                    value="{{ old('harga') }}">
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

