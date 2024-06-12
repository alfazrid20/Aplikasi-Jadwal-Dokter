@extends('backend.layouts')
@section('title', 'Tambah Data Manajemen')
@section('content')

    <div class="page_title">
        <h2>Tambah Data Manajemen</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.staff.store') }}" enctype="multipart/form-data">
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

                                <label class="col-sm-2 control-label required">Nama</label>
                                <div class="col-sm-6 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Nama dan Gelar ditulis Lengkap" value="{{ old('nama') }}">
                                    </div>
                                </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Tanggal Lahir</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                </div>
                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir"
                                    value="{{ old('tgl_lahir') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Jenis Kelamin</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-child"></i></span>
                                </div>
                                <select name="jenis_kelamin" class="form-control" id="statusSelect">
                                    <option value="" selected disabled>Jenis Kelamin</option>
                                    <option value="LAKI-LAKI" {{ old('jenis_kelamin') == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                                    <option value="PEREMPUAN" {{ old('jenis_kelamin') == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Alamat</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-home"></i></span>
                                </div>
                                <textarea name="alamat" id="alamat" cols="30" rows="10">{{ old('alamat') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Facebook</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                                </div>
                                <input type="text" name="fb" class="form-control" placeholder="Masukkan Link Facebook Anda"
                                    value="{{ old('fb', '#') }}">
                            </div>
                            <small class="col-sm-6 col-sm-offset-2"><i style="color: red">Link boleh diisi, boleh tidak. Jika tidak diisi, biarkan saja bertanda "#".</i></small>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Instagram</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                </div>
                                <input type="text" name="ig" class="form-control" placeholder="Masukkan Link Instagram Anda"
                                    value="{{ old('ig', '#') }}">
                            </div>
                            <small class="col-sm-6 col-sm-offset-2"><i style="color: red">Link boleh diisi, boleh tidak. Jika tidak diisi, biarkan saja bertanda "#".</i></small>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Instagram</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                </div>
                                <input type="text" name="ig" class="form-control" placeholder="Masukkan Link Instagram Anda"
                                    value="{{ old('ig') }}">
                            </div>
                        </div>
                                               

                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Jabatan</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-mortar-board"></i></span>
                                </div>
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan"
                                    value="{{ old('jabatan') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Departemen</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-institution"></i></span>
                                </div>
                                <input type="text" name="departemen" class="form-control" placeholder="Departemen"
                                    value="{{ old('departemen') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label required">Foto</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                                </div>
                                <input type="file" name="foto" class="form-control" placeholder="foto"
                                    value="{{ old('foto') }}">
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


