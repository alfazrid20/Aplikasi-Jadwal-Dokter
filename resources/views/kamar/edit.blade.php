@extends('backend.layouts')
@section('title', 'Edit Ketersediaan Kamar')
@section('content')

    <div class="page_title">
        <h2>Edit Ketersediaan Kamar</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.kamar.update', $kamar->id) }}">
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

                                <label class="col-sm-2 control-label required">Nama Kamar</label>
                                <div class="col-sm-6 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-bed"></i></span>
                                        <input type="text" name="nama_kamar" class="form-control"
                                            placeholder="Nama Kamar" value="{{ $kamar->nama_kamar }}">
                                    </div>
                                </div>
                                <label class="col-sm-2 control-label required">Jenis Kamar</label>
                                <div class="col-sm-6 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-bed"></i></span>
                                    </div>
                                    <select type="text" name="jenis_ruang_id" class="selectize-jenis"
                                        placeholder="Jenis Kamar" required>
                                        <option value="" selected disabled>Jenis Kamar</option>
                                        @foreach ($jeniskamar as $jenis)
                                            <option value="{{ $jenis->id }}" {{ $kamar->jenis_ruang_id == $jenis->id ? 'selected' : '' }}>{{ $jenis->nama_ruang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label required">Posisi</label>
                                <div class="col-sm-6 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-location-arrow"></i></span>
                                    </div>
                                    <input type="text" name="posisi" class="form-control" placeholder="Posisi Ruangan"
                                        value="{{ $kamar->posisi }}">
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label required">Status</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-info"></i></span>
                                        </div>
                                        <select name="status" class="form-control" id="statusSelect">
                                            <option value="" disabled>Status</option>
                                            <option value="TERISI" {{ $kamar->status == 'TERISI' ? 'selected' : '' }}>TERISI</option>
                                            <option value="KOSONG" {{ $kamar->status == 'KOSONG' ? 'selected' : '' }}>KOSONG</option>
                                        </select>
                                        <div id="statusBadge"></div> <!-- Tempat badge akan ditampilkan -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label required">Jumlah Pasien</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-users"></i></span>
                                        </div>
                                        <input type="text" name="jumlah_pasien" class="form-control" placeholder="Jumlah Pasien"
                                            value="{{$kamar->jumlah_pasien}}">
                                    </div>
                                </div>

                                <div class="col-sm-6 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-location-arrow"></i></span>
                                    </div>
                                    <input type="text" name="posisi" class="form-control" placeholder="Posisi Ruangan"
                                        value="{{ $kamar->posisi }}">
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label required">Tanggal Masuk</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            @if (!empty($kamar->tanggal_masuk))
                                                <input type="text" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                                    value="{{ date('d-m-Y', strtotime($kamar->tanggal_masuk)) }}">
                                            @else
                                                <input type="text" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="00-00-2024">
                                            @endif
                                        </div>
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
    </div>

@endsection

@push('myscript')
    <script>
        $(document).ready(function() {
            $('#statusSelect').change(function() {
                var selectedOption = $(this).val();
                var badgeColor = '';

                if (selectedOption === 'TERISI') {
                    badgeColor = 'primary';
                } else if (selectedOption === 'KOSONG') {
                    badgeColor = 'danger';
                }

                var badgeHtml = '<span class="badge badge-' + badgeColor + '">' + selectedOption +
                '</span>';
                $('#statusBadge').html(badgeHtml);
            });
        });
    </script>
@endpush
