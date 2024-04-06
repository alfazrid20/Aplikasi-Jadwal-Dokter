@extends('backend.layouts')
@section('content')
    <div class="page_title">
        <h2>Edit Data Dokter</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <form class="form-horizontal" method="POST"
                            action="{{ route('backend.data-dokter.update', ['id' => $dokter->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 control-label">Nama Dokter</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Ubah Nama Dokter" value="{{ old('nama', $dokter->nama) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="poli_id" class="col-sm-2 control-label">Spesialis</label>
                                <div class="col-sm-6">
                                    <select name="poli_id" class="form-control" id="poli_id" required>
                                        @foreach ($data['polis'] as $poli)
                                            <option value="{{ $poli->id }}"
                                                {{ $dokter->poli_id == $poli->id ? 'selected' : '' }}>
                                                {{ $poli->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ URL::previous() }}" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
