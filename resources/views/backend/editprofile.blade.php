@extends('backend.layouts')
@section('title', 'Edit Profile')
@section('content')
    <div class="page_title">
        <h2>Edit Profile</h2>
    </div>

    <div class="row column1">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Edit User Profile</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <!-- user profile section --> 
                        <!-- profile image -->
                        <div class="col-lg-12">
                            <div class="full dis_flex center_text">
                                <div class="profile_img">
                                    @if (!empty(Auth::user()->foto))
                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Pengguna"
                                    class="img-responsive rounded-circle" width="180">
                                    @else
                                    <img src="{{ asset('assets/img/nophoto.png') }}" alt="Tidak Ada Foto"
                                    class="img-responsive rounded-circle" width="180">
                                    @endif
                                </div>
                                <div class="profile_contant">
                                    <form method="POST" action="{{ route('backend.profileuser.update', ['id' => Auth::user()->id]) }}" enctype="multipart/form-data">                                        @csrf
                                        @method('PUT')
                                        <div class="contact_inner">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Profile Picture:</label>
                                                <input type="file" name="foto" id="foto" class="form-control-file">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <a href="{{ route('backend.profileuser') }}" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end user profile section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- end row -->
@endsection
