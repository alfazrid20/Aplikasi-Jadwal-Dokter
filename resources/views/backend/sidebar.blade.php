<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="#"><img class="logo_icon img-responsive" src="{{ asset('frontend/images/logo.png') }}"
                        alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img">
                    @if (!empty(Auth::user()->foto))
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Pengguna" class="avatar"
                            style="width: 80px; height: 80px;">
                    @else
                        <img src="{{ asset('assets/img/nophoto.png') }}" alt="Tidak Ada Foto"
                            class="avatar rounded-circle" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="user_info">
                    <h6>{{ Auth::user()->name }}</h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>Menu</h4>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="/backend/dashboard" aria-expanded="false"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>

            <li><a href="/backend/data-poli"><i class="fa fa-book"></i> <span>Data Poli</span></a></li>
            <li><a href="/backend/data-dokter"><i class="fa fa-folder"></i> <span>Data Dokter</span></a></li>
            <li class="dropdown">
                <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-bed"></i><span>Ketersediaan Tempat Tidur</span></a>
                <ul class="collapse list-unstyled" id="element">
                  <li><a href="/backend/kamar">Semua Kamar</a></li>
                  <li><a href="/backend/detail-kamar">Detail Kamar</a></li>
                </ul>
              </li>
              
            <li><a href="/backend/jadwal-dokter"><i class="fa fa-calendar "></i> <span>Jadwal Dokter</span></a></li>
            <li><a href="/backend/user"><i class="fa fa-users "></i> <span>Users</span></a></li>
        </ul>
    </div>
</nav>
