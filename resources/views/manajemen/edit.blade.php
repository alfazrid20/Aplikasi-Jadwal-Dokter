@extends('backend.layouts')
@section('title', 'Edit Data Manajemen')
@section('content')

<div class="page_title">
    <h2>Edit Data Manajemen</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table_section padding_infor_info">
                    <div class="form-group">
                        <form class="form-horizontal" method="POST" action="{{ route('backend.staff.update', $staff->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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
                                           placeholder="Nama dan Gelar ditulis Lengkap" value="{{ old('nama', $staff->nama) }}">
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
                                   value="{{ old('tgl_lahir', $staff->tgl_lahir) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required">Jenis Kelamin</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-child"></i></span>
                            </div>
                            <select name="jenis_kelamin" class="form-control" id="statusSelect">
                                <option value="" disabled>Jenis Kelamin</option>
                                <option value="LAKI-LAKI" {{ old('jenis_kelamin', $staff->jenis_kelamin) == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                                <option value="PEREMPUAN" {{ old('jenis_kelamin', $staff->jenis_kelamin) == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label required">Alamat</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                            </div>
                            <textarea name="alamat" id="alamat" cols="30" rows="10">{{ old('alamat', $staff->alamat) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label required">No Handphone</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone-square"></i></span>
                            </div>
                            <input type="tel" name="no_telepon" class="form-control" placeholder="No Handphone"
                                   value="{{ old('no_telepon', $staff->no_telepon) }}" pattern="[0-9]*" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="13">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label required">Jabatan</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-mortar-board"></i></span>
                            </div>
                            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan"
                                   value="{{ old('jabatan', $staff->jabatan) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label required">Departemen</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-institution"></i></span>
                            </div>
                            <input type="text" name="departemen" class="form-control" placeholder="Departemen"
                                   value="{{ old('departemen', $staff->departemen) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label required">Foto</label>
                        <div class="col-sm-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                            </div>
                            <input type="file" name="foto" class="form-control" placeholder="foto">
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
