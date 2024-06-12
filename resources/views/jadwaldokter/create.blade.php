@extends('backend.layouts')
@section('title', 'Buat Jadwal Dokter')
@section('content')

    <div class="page_title">
        <h2>Buat Jadwal Dokter</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST" action="{{ route('backend.jadwal-dokter.store') }}" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label class="col-sm-2 control-label required">Poli</label>
                                    <div class="col-sm-6">
                                        <select type="text" name="poli_id" class="selectize-poli"
                                            placeholder="Pilih poli" required>
                                            <option value="" selected disabled>Cari Poli</option>
                                            @foreach ($polis as $poli)
                                                <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label required">Nama Dokter</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <select type="text" name="dokter_id" class="form-control selectize-dokter"
                                                placeholder="Pilih Dokter" required>
                                                <option value="" selected disabled>Pilih Dokter</option>
                                                @foreach ($dokters as $dokter)
                                                    <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label required">Hari</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        <select name="hari" class="form-control">
                                            <option value="" selected disabled>Pilih Hari</option>
                                            <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                                            <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                            <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                            <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                            <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                            <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                            <option value="Minggu" {{ old('hari') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                            <option value="On Duty" {{ old('hari') == 'On Duty' ? 'selected' : '' }}>On Duty</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jam Pelayanan</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                        </div>
                                        <input type="time" name="jam_mulai" class="form-control" placeholder="Jam Mulai" value="{{ old('jam_mulai') }}">
                                        &nbsp;&nbsp;
                                        <input type="time" name="jam_selesai" class="form-control" placeholder="Jam Selesai" value="{{ old('jam_selesai') }}">
                                    </div>
                                </div>
                                              
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Foto Dokter</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                                        </div>
                                        <input type="file" name="foto_dokter" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
                                        </div>
                                        <select name="keterangan" class="form-control" id="keteranganSelect">
                                            <option value="" selected disabled>Pilih Keterangan</option>
                                            <option value="Tersedia"
                                                {{ old('keterangan') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="Dalam Perjalanan"
                                                {{ old('keterangan') == 'Dalam Perjalanan' ? 'selected' : '' }}>Dalam
                                                Perjalanan</option>
                                            <option value="Tidak Tersedia"
                                                {{ old('keterangan') == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak
                                                Tersedia</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="keteranganBadge"></div>

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
        $('.selectize-poli').select2({
            placeholder: 'Cari Poli', 
            allowClear: true, 
            minimumInputLength: 1 
        });

        $('.selectize-dokter').select2({
            placeholder: 'Cari Dokter', 
            allowClear: true, // 
            minimumInputLength: 1 
        });

        $(document).ready(function() {
            $('#keteranganSelect').change(function() {
                var selectedOption = $(this).val();
                var badgeColor = '';

                if (selectedOption === 'Tersedia') {
                    badgeColor = 'primary';
                } else if (selectedOption === 'Dalam Perjalanan') {
                    badgeColor = 'info';
                } else if (selectedOption === 'Tidak Tersedia') {
                    badgeColor = 'danger';
                }

                var badgeHtml = '<span class="badge badge-' + badgeColor + '">' + selectedOption +
                '</span>';
                $('#keteranganBadge').html(badgeHtml);
            });
        });
    </script>
@endpush
