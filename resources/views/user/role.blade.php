@extends('backend.layouts')
@section('title', 'Data User')
@section('content')
    <div class="page_title">
        <h2>Data Role User</h2>
    </div>

    <!-- Menampilkan daftar role -->
    <div class="row">
        <div class="col-md-6" style="margin-top: 5%">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Role</h5>
                    <form action="{{ route('backend.role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="role">Nama Role</label>
                            <input type="text" class="form-control" id="role" name="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Role</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{--  <div class="col-md-6" style="margin-top: 5%">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Permission</h5>
                    <form action="{{ route('backend.permission.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="permission">Nama Permission</label>
                            <input type="text" class="form-control" id="permission" name="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-6" style="margin-top: 2%">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Permission</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Permission</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $key => $permission)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $permission->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  --}}
        
        
    </div>

    
@endsection
