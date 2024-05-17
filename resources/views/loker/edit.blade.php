@extends('backend.layouts')
@section('title', 'Edit Loker')
@section('content')

<div class="page_title">
    <h2>Edit Loker</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table_section padding_infor_info">
                    <form class="form-horizontal" method="POST" action="{{ route('backend.loker.update', $loker->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Posisi</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="posisi" class="form-control" placeholder="Posisi" value="{{ old('posisi', $loker->posisi) }}">
                                @if ($errors->has('posisi'))
                                    <span class="text-danger">{{ $errors->first('posisi') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-12 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-file-text"></i></span>
                                </div>
                                <textarea name="deskripsi" id="editor2" class="form-control bigger-textarea" rows="6">{{ old('deskripsi', $loker->deskripsi) }}</textarea>
                                @if ($errors->has('deskripsi'))
                                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Persyaratan</label>
                            <div class="col-12 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-pencil"></i></span>
                                </div>
                                <textarea name="persyaratan" id="editor3" class="form-control bigger-textarea" rows="6">{{ old('persyaratan', $loker->persyaratan) }}</textarea>
                                @if ($errors->has('persyaratan'))
                                    <span class="text-danger">{{ $errors->first('persyaratan') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Batas Waktu</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <input type="date" name="batas_waktu" class="form-control" placeholder="Batas Waktu" value="{{ old('batas_waktu', $loker->batas_waktu) }}">
                                @if ($errors->has('batas_waktu'))
                                    <span class="text-danger">{{ $errors->first('batas_waktu') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-file-image-o"></i></span>
                                </div>
                                <input type="file" name="foto_loker" class="form-control" placeholder="Foto">
                                @if ($errors->has('foto_loker'))
                                    <span class="text-danger">{{ $errors->first('foto_loker') }}</span>
                                @endif
                                @if ($loker->foto_loker)
                                    <div class="mt-2">
                                        <img src="{{ asset($loker->foto_loker) }}" alt="Current Image" style="max-width: 200px;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-info"></i></span>
                                </div>
                                <select name="status_loker" class="form-control">
                                    <option value="" disabled {{ old('status_loker', $loker->status_loker) == '' ? 'selected' : '' }}>Pilih Status</option>
                                    <option value="Buka" {{ old('status_loker', $loker->status_loker) == 'Buka' ? 'selected' : '' }}>Buka</option>
                                    <option value="Tutup" {{ old('status_loker', $loker->status_loker) == 'Tutup' ? 'selected' : '' }}>Tutup</option>
                                </select>
                                @if ($errors->has('status_loker'))
                                    <span class="text-danger">{{ $errors->first('status_loker') }}</span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="box-footer text-right">
                            <a href="{{ route('backend.loker.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
