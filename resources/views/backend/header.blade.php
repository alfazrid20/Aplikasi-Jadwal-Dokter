<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
            <div class="logo_section">
            </div>
            <div class="right_topbar">
                <div class="icon_info">

                    <ul class="user_profile_dd">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                @if (!empty(Auth::user()->foto))
                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Pengguna"
                                    class="img-responsive rounded-circle" style="max-width: 30px; height: 30px;">
                                @else
                                    <img src="{{ asset('assets/img/nophoto.png') }}" alt="Tidak Ada Foto"
                                    class="img-responsive rounded-circle" style="max-width: 30px; height: 30px;">
                                @endif
                                <span class="name_user">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/backend/profileuser/">My Profile</a>
                                <a class="dropdown-item" href="/backend/panduan/">
                                    <span>Panduan</span> <i class="fa fa-book"></i>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span>Logout</span> <i class="fa fa-sign-out"></i>
                                    </a>
                                </form>
                            </div>                            
                        </li>
                    </ul>
               
            </div>
        </div>
    </nav>
</div>

@push('myscript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').click(function() {
                $(this).next('.dropdown-menu').toggle();
            });

            // Menyembunyikan dropdown saat klik di luar dropdown
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.dropdown-toggle').length) {
                    $('.dropdown-menu').hide();
                }
            });
        });
    </script>
@endpush
