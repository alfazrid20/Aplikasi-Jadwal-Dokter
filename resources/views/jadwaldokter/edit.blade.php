@extends('backend.layouts')
@section('title', 'Edit Jadwal Dokter')
@section('content')

    <div class="page_title">
        <h2>Edit Jadwal Dokter</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="form-group">
                            <form class="form-horizontal" method="POST"
                                action="{{ route('backend.jadwal-dokter.update', ['id' => $jadwal->id]) }}" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label class="col-sm-2 control-label required">Poli</label>
                                    <div class="col-sm-6">
                                        <select type="text" name="poli_id" class="selectize-poli"
                                            placeholder="Pilih poli" required>
                                            <option value="" selected disabled>Cari Poli</option>
                                            @foreach ($polis as $poli)
                                                <option value="{{ $poli->id }}"
                                                    {{ $jadwal->poli_id == $poli->id ? 'selected' : '' }}>
                                                    {{ $poli->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label required">Nama Dokter</label>
                                    <div class="col-sm-6">
                                        <select type="text" name="dokter_id" class="selectize-dokter"
                                            placeholder="Pilih Dokter" required>
                                            <option value="" selected disabled>Pilih Dokter</option>
                                            @foreach ($dokters as $dokter)
                                                <option value="{{ $dokter->id }}"
                                                    {{ $jadwal->dokter_id == $dokter->id ? 'selected' : '' }}>
                                                    {{ $dokter->nama }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                            <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin
                                            </option>
                                            <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa
                                            </option>
                                            <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu
                                            </option>
                                            <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis
                                            </option>
                                            <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat
                                            </option>
                                            <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu
                                            </option>
                                            <option value="Minggu" {{ $jadwal->hari == 'Minggu' ? 'selected' : '' }}>Minggu
                                            </option>
                                            <option value="On Duty" {{ $jadwal->hari == 'On Duty' ? 'selected' : '' }}>On
                                                Duty</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jam Pelayanan</label>
                                    <div class="col-sm-6 input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                        </div>
                                        <input type="time" name="jam_mulai" class="form-control" placeholder="Jam Mulai" value="{{ $jadwal->jam_mulai}}">
                                        &nbsp;&nbsp;
                                        <input type="time" name="jam_selesai" class="form-control" placeholder="Jam Selesai" value="{{$jadwal->jam_selesai}}">
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
                                                {{ $jadwal->keterangan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="Dalam Perjalanan"
                                                {{ $jadwal->keterangan == 'Dalam Perjalanan' ? 'selected' : '' }}>Dalam
                                                Perjalanan</option>
                                            <option value="Tidak Tersedia"
                                                {{ $jadwal->keterangan == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak
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
        // Inisialisasi Select2 pada elemen select
        $('.selectize-poli').select2({
            placeholder: 'Cari Poli', // Teks placeholder
            allowClear: true, // Memungkinkan untuk menghapus pilihan yang telah dipilih
            minimumInputLength: 1 // Menentukan panjang minimum input sebelum pencarian dimulai
        });

        $('.selectize-dokter').select2({
            placeholder: 'Cari Dokter', // Teks placeholder
            allowClear: true, // Memungkinkan untuk menghapus pilihan yang telah dipilih
            minimumInputLength: 1 // Menentukan panjang minimum input sebelum pencarian dimulai
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
                    badgeColor = 'warning';
                }

                var badgeHtml = '<span class="badge badge-' + badgeColor + ' custom-badge">' +
                    selectedOption + '</span>';
                $('#keteranganBadge').html(badgeHtml);
            });
        });
    </script>
@endpush
