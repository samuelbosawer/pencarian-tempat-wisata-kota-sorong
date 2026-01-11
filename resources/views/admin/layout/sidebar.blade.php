 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="{{ route('dashboard.home') }}" class="app-brand-link">
             <span class="app-brand-logo demo">
                 <img width="50px" src="{{ asset('assets/img/logo.png') }}" alt="" srcset="">
             </span>
             <span class=" menu-text fw-bolder ms-2">AP Wisata </span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboard -->



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


         <li class="menu-item @if ((Request::segment(1) == 'dashboard' && Request::segment(2) == 'wisata') || Request::segment(2) == 'kategori') active open @endif">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons bx bx-map-alt"></i>
                 <div data-i18n="Misc">Data Wisata</div>
             </a>
             <ul class="menu-sub">
                 <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'kategori') active @endif">
                     <a href="{{ route('dashboard.kategori') }}" class="menu-link">
                         <div data-i18n="Error">Kategori Wisata</div>
                     </a>
                 </li>
                 <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'wisata') active @endif">
                     <a href="{{ route('dashboard.wisata') }}" class="menu-link">
                         <div data-i18n="Under Maintenance"> Tempat Wisata</div>
                     </a>
                 </li>
             </ul>
         </li>

           <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'kriteria') active @endif">
             <a href="{{ route('dashboard.kriteria') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-collection"></i>
                 <div data-i18n="Analytics">Data Kriteria</div>
             </a>
         </li>


           <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'skala') active @endif">
             <a href="{{ route('dashboard.skala') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-box"></i>
                 <div data-i18n="Analytics">Data Skala Penilaian</div>
             </a>
         </li>

         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'penilaian') active @endif">
             <a href="{{ route('dashboard.penilaian') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-message"></i>
                 <div data-i18n="Analytics">Data Penilaian</div>
             </a>
         </li>








         <li class="menu-item ">
             <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-door-open"></i>
                 <div data-i18n="Analytics">Keluar </div>
             </a>
         </li>


         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>


     </ul>
 </aside>
 <!-- / Menu -->
