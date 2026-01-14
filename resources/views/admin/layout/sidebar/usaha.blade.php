<li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == null) active @endif">
    <a href="{{ route('dashboard.home') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
    </a>
</li>

 <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'user') active @endif">
            <a href="{{ route('dashboard.user') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Data User</div>
            </a>
        </li>

 <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'wisata') active @endif">
            <a href="{{ route('dashboard.wisata') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-alt"></i>
                <div data-i18n="Analytics">Data Wisata</div>
            </a>
        </li>

    <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'penilaian') active @endif">
            <a href="{{ route('dashboard.penilaian') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message"></i>
                <div data-i18n="Analytics"> Penilaian Tempat </div>
            </a>
    </li>


    <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'rekomendasi') active @endif">
            <a href="{{ route('dashboard.rekomendasi') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-star"></i>
                <div data-i18n="Analytics">Rekomendasi MOORA</div>
            </a>
    </li>

