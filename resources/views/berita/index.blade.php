@extends('backend.layouts')
@section('title', 'Data Berita')
@section('content')
    <div class="page_title">
        <h2>Data Berita</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/data-berita/create" class="btn btn-primary" id="tambahberita"
                                data-bs-toggle="modal" data-bs-target="#modal-inputberita"><i class="fa fa-plus"></i> Tambah
                                Data </a>
                        </div>
                        <form action="/backend/data-berita" method="GET" id="searchForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="date" name="tanggalberita" id="tanggalberita" class="form-control"
                                                placeholder="Tanggal Berita" style="width: 45%;" value="{{ Request('tanggalberita') }}">
                                            <button class="btn btn-primary" type="submit" id="button-addon8"><i
                                                    class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Judul Berita</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th>Isi Berita</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="beritaTableBody">
                                    @foreach ($berita as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->tanggal }}</td>
                                        <td>{{ $d->judul_berita }}</td>
                                        <td>
                                            @if (!empty($d->gambar))
                                                <img src="{{ asset($d->gambar) }}" alt="Gambar Berita" style="max-width: 100%;">
                                            @else
                                                <img src="{{ asset('placeholder.jpg') }}" alt="Tidak Ada Foto"  style="max-width: 100px;">
                                            @endif
                                        </td>
                                        <td>{{ $d->kategori->kategori }}</td>
                                        <td class="text-wrap">{!! $d->isi !!}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('backend.data-berita.delete', $d->id) }}"
                                                    method="POST">
                                                    <a href="{{ route('backend.data-berita.edit', $d->id) }}"
                                                        class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash text-white"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        document.getElementById('tanggalberita').addEventListener('change', function(event) {
            // Memeriksa apakah tanggal berita sudah diisi
            var tanggalBerita = this.value;
            if (tanggalBerita.trim() === '') {
                window.location.href = '/backend/data-berita';
            }
        });
    </script>
@endpush
