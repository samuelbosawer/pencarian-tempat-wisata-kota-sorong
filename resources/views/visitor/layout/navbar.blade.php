<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="/visitor/assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->


                    <ul class="nav">
                        <li>
                            <a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                Beranda
                            </a>
                        </li>

                        <li>
                            <a class="{{ Route::is('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">
                                Tentang
                            </a>
                        </li>

                        <li>
                            <a class="{{ Route::is('wisata') ? 'active' : '' }}" href="{{ route('wisata') }}">
                                Wisata
                            </a>
                        </li>

                        <li>
                            <a class="{{ Route::is('kategori*') ? 'active' : '' }}" href="{{ route('kategori') }}">
                                Kategori
                            </a>

                        </li>

                        <li>
                            <a class="{{ Route::is('rekomendasi') ? 'active' : '' }}" href="{{ route('rekomendasi') }}">
                                Rekomendasi
                            </a>
                        </li>

                        @if (Auth::check() != null)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-bolder" href="#" id="userDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="text-dark" href="{{ route('dashboard.home') }}">
                                            Welcome {{ Auth::user()->email }}
                                        </a>
                                    </li>
                                    @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('usaha'))
                                        <li>
                                            <a class="text-dark" href="{{ route('dashboard.home') }}">
                                                Dashboard
                                            </a>
                                        </li>
                                    @endif

                                    @if (Auth::user()->hasRole('pengunjung'))
                                        <li>
                                            <a class="text-dark" href="{{ route('profile') }}">
                                                Profil
                                            </a>
                                        </li>
                                    @endif

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class=" text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('daftar') }}">Daftar</a></li>
                        @endif

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
