@extends('backend.layouts')
@section('title', 'Data Poli')
@section('content')
    <div class="page_title">
        <h2>Data Poli</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table_section padding_infor_info">
                        <div class="mb-3">
                            <a href="/backend/data-poli/create" class="btn btn-primary" id="tambahpoli" data-bs-toggle="modal"
                                data-bs-target="#modal-inputpoli"><i class="fa fa-plus"></i> Tambah Data </a>
                        </div>
                        <form action="/backend/data-poli" method="GET" id="searchForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                placeholder="Cari Poli" style="width: 45%; margin-right: 5%;"
                                                value="{{ Request('nama') }}">
                                            <button class="btn btn-primary" type="submit" id="button-addon3"><i
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
                                        <th>Nama Poli</th>
                                        <th>Kode Poli</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="poliTableBody">
                                    @foreach ($polis as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->kodepoli }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('backend.data-poli.delete', $d->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('backend.data-poli.edit', $d->id) }}"
                                                            class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                        {{-- <a href="{{ url('/backend/data-poli/edit' . $d->id) }}"
                                                            class="btn btn-success"></a> --}}
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash text-white"></i></button>
                                                    </form>

                                                    {{-- <form id="hapus_{{ $d->id }}" method="POST"
                                                        action="/backend/data-poli/{{ $d->id }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="#" class="edit btn btn-info btn-sm" nama=""></a>
                                                        <button type="button" class="btn btn-danger btn-sm hapus"
                                                            data-id="{{ $d->id }}"></button>
                                                    </form> --}}
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
    document.getElementById('button-addon2').addEventListener('click', function() {
        document.getElementById('searchForm').submit();
    });
</script>
@endpush
