@extends('backend.layouts')
@section('title', 'Profile')
@section('content')
    <div class="page_title">
        <h2>Profile</h2>
    </div>

        <div class="row column1">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>User profile</h2>
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
                                <div class="contact_inner">
                                    <h3>{{ Auth::user()->name }}</h3>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa fa-envelope-o"></i> : {{ Auth::user()->email }}
                                            <hr>
                                        </li>
                                        <li>
                                            <i class="fa fa-building-o"></i> : {{ Auth::user()->role }}
                                            <hr>
                                        </li>
                                    </ul>
                                    <div class="edit_profile_button text-right">
                                        <a href="#" onclick="editProfile('{{ route('backend.profileuser.edit', ['id' => Auth::user()->id]) }}')" class="btn btn-primary">Edit Profile</a>
                                    </div>
                                </div>                                
                            </div>
                          </div>
                         <!-- end user profile section -->
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-2"></div>
          </div>
          <!-- end row -->
       </div>
@endsection

@push('myscript')
    <script>
        function editProfile(url) {
            window.location.href = url;
        }
    </script>
@endpush
      