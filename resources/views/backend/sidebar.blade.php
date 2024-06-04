@php
$role = Auth::check() ? Auth::user()->role : '';
$route = Request::path();
$route = explode('/',$route);
@endphp

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
                    <small class="form-text text-white">{{ Auth::user()->role }}</small>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>Menu</h4>
        <ul class="list-unstyled components">
            <li class="">
                <a href="/backend/dashboard" aria-expanded="false"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>
            @if($role == 'IT' || $role == 'Humas' || $role == 'Marketing' || $role == 'HRD' || $role == 'Admin')
            <li class="">
                <a href="/backend/slider" aria-expanded="false"><i class="fa fa-play-circle"></i> <span>Slider</span></a>
            </li>
            @endif
            @if($role == 'IT' || $role == 'Humas' || $role == 'Marketing' || $role == 'HRD' || $role == 'Admin')
            <li class="">
                <a href="/backend/about" aria-expanded="false"><i class="fa fa-building-o"></i> <span>Fasilitas Pelayanan</span></a>
            </li>
            @endif
            @if($role == 'IT' || $role == 'Humas' || $role == 'Marketing' || $role == 'HRD' || $role == 'Admin')
            <li class="">
                <a href="/backend/mitra" aria-expanded="false"><i class="fa fa-globe"></i> <span>Mitra</span></a>
            </li>
            @endif
            @if($role == 'IT' || $role == 'CS')
            <li><a href="/backend/data-poli"><i class="fa fa-book"></i> <span>Data Poli</span></a></li>
            @endif
            @if($role == 'IT' || $role == 'CS')
            <li><a href="/backend/data-dokter"><i class="fa fa-folder"></i> <span>Data Dokter</span></a></li>
            @endif
            @if($role == 'IT' || $role == 'CS')
            <li class="dropdown">
                <a href="#element_bed" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-bed"></i><span>Ketersediaan Tempat Tidur</span>
                </a>
                <ul class="collapse list-unstyled" id="element_bed">
                    <li><a href="/backend/kamar"><i class="fa fa-bed"></i>Semua Kamar</a></li>
                    <li><a href="/backend/detail-kamar"><i class="fa fa-bed"></i>Detail Kamar</a></li>
                </ul>
            </li> 
            @endif
            @if($role == 'IT' || $role == 'CS')
            <li><a href="/backend/jadwal-dokter"><i class="fa fa-calendar"></i> <span>Jadwal Dokter</span></a></li> 
            @endif
            @if($role == 'IT' || $role == 'HRD' || $role == 'Admin' || $role == 'Humas' || $role == 'Marketing')
            <li class="dropdown">
                <a href="#element_berita" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-newspaper-o"></i><span>Berita</span>
                </a>
                <ul class="collapse list-unstyled" id="element_berita">
                    <li>
                        <a href="/backend/data-berita"><i class="fa fa-pencil-square-o"></i> <span>Data Berita</span></a>
                    </li>
                    <li>
                        <a href="/backend/kategori"><i class="fa fa-tasks"></i> <span>Kategori</span></a>
                    </li>
                </ul>
            </li>
            @endif
            @if($role == 'IT' || $role == 'HRD' || $role == 'Humas')
            <li class="dropdown">
                <a href="#element_job" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-tty"></i><span>Lowongan Pekerjaan</span>
                </a>
                <ul class="collapse list-unstyled" id="element_job">
                    <li>
                        <a href="/backend/loker"><i class="fa fa-university  "></i> <span>Data Lowongan</span></a>
                    </li>
                    <li>
                        <a href="/backend/lamaran"><i class="fa fa-archive"></i> <span>Data Pelamar</span></a>
                    </li>
                    {{--  <li>
                        <a href="/backend/posisi"><i class="fa fa-briefcase"></i> <span>Posisi</span></a>
                    </li>  --}}
                </ul>
            </li>
            @endif
            @if($role == 'IT' || $role == 'Admin')
            <li class="dropdown">
                <a href="#element_user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-users"></i><span>User</span>
                </a>
                <ul class="collapse list-unstyled" id="element_user">
                    <li>
                        <a href="/backend/user"><i class="fa fa-user "></i> <span>Users</span></a>
                    </li>
                    <li>
                        <a href="/backend/role"><i class="fa fa-tags "></i> <span>Roles</span></a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</nav>
