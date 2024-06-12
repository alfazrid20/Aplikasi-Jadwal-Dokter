@extends('backend.layouts')
@section('title', 'Edit Gambar')
@section('content')

    <div class="page_title">
        <h2>Edit Gambar</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <form class="form-horizontal" method="POST" action="{{ route('backend.slider-foto.update', $foto->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-6">
                                    @if($foto->foto_slider)
                                        <img src="{{ asset($foto->foto_slider) }}" alt="Gambar Slider" style="max-width: 100%; height: auto;">
                                    @else
                                        <p>Tidak ada gambar yang tersedia</p>
                                    @endif
                                    <input type="file" name="foto_slider" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('backend.slider-foto.index') }}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
