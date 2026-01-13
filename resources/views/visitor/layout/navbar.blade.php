<!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="/visitor/assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li ><a href="{{ route('home') }}">Beranda</a></li>
                            <li><a class="" href="{{ route('tentang') }}">Tentang</a></li>
                            <li><a href="{{ route('wisata') }}">Wisata</a></li>
                            <li><a href="{{ route('rekomendasi') }}">Rekomendasi</a></li>


                             @if (Auth::check() != null)
                            <li>
                                <a class="fw-bolder" href="{{ route('dashboard.home') }}">Welcome {{ Auth::user()->email }}</a>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('daftar') }}">Daftar Akun</a></li>
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