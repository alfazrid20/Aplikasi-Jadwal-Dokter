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
                                        class="avatar rounded-circle" style="max-width: 30px; height: 30px;">
                                @else
                                    <img src="{{ asset('assets/img/nophoto.png') }}" alt="Tidak Ada Foto"
                                        class="avatar rounded-circle" style="max-width: 30px; height: 30px;">
                                @endif
                                {{-- <img class="img-responsive rounded-circle" src="{{ asset('assets/images/layout_img/user_img.jpg') }}" alt="#" /> --}}
                                <span class="name_user">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <span style="color: blue">Logout</span>
                                        <i class="fa fa-sign-out"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>

                </div>
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
