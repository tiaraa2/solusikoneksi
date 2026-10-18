<nav class="navbar navbar-expand-lg sticky-top bg-white border-bottom shadow-sm py-3">
    <div class="container-fluid px-4 px-lg-5">

        {{-- LOGO DAN NAMA PERUSAHAAN --}}
        <a href="{{ route('login') }}"
           class="d-flex align-items-center gap-3 text-decoration-none">

            {{-- LOGO BULAT --}}
            <div class="rounded-circle bg-white bg-opacity-75 border shadow-sm
                        d-flex align-items-center justify-content-center
                        flex-shrink-0"
                 style="width:75px;height:75px;">

                <img src="{{ asset('images/logo.png') }}"
                     alt="Logo PT Solusi Koneksi Anda"
                     class="img-fluid rounded-circle"
                     style="width:90%;height:90%;object-fit:contain;">
            </div>

            {{-- NAMA PERUSAHAAN --}}
            <div>
                <h5 class="mb-1 fw-bold text-dark">
                    PT SOLUSI KONEKSI ANDA
                </h5>

                <p class="mb-0 small text-secondary">
                    Solusi Teknologi untuk Masa Depan
                </p>
            </div>
        </a>

        {{-- TOMBOL MENU MOBILE --}}
        <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSKA"
                aria-controls="navbarSKA"
                aria-expanded="false"
                aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- NAVIGASI --}}
        <div class="collapse navbar-collapse" id="navbarSKA">
            <ul class="navbar-nav ms-auto align-items-lg-center
                       gap-lg-2 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a href="{{ route('home') }}"
                       class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active text-info' : 'text-secondary' }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profil') }}"
                       class="nav-link fw-semibold {{ request()->routeIs('profil') ? 'active text-info' : 'text-secondary' }}">
                        Perusahaan
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('layanan') }}"
                       class="nav-link fw-semibold {{ request()->routeIs('layanan') ? 'active text-info' : 'text-secondary' }}">
                        Layanan
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('artikel') }}"
                       class="nav-link fw-semibold {{ request()->routeIs('artikel') ? 'active text-info' : 'text-secondary' }}">
                        Artikel
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('galeri') }}"
                       class="nav-link fw-semibold {{ request()->routeIs('galeri') ? 'active text-info' : 'text-secondary' }}">
                        Galeri
                    </a>
                </li>

                <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                    <a href="{{ route('kontak') }}"
                       class="btn btn-info text-white rounded-pill
                              px-4 py-2 fw-semibold">
                        Mari Terhubung
                        <i class="bi bi-arrow-up-right ms-1"></i>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>