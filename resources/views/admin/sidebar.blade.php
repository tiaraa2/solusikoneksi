<aside class="position-fixed top-0 start-0 vh-100 d-flex flex-column
    text-white overflow-y-auto"
    style="width:250px;background:#0D1B35;z-index:1000;
    scrollbar-width:none;-ms-overflow-style:none;">

    {{-- LOGO --}}
    <div class="d-flex align-items-center gap-3 p-3 mb-3">
        <img src="{{ asset('images/logo.png') }}"
             alt="Logo Solusi Koneksi"
             style="width:45px;height:45px;object-fit:contain;
             background:white;border-radius:8px;padding:3px;">

        <div>
            <div class="fw-bold fs-5">Solusi Koneksi</div>
            <small style="color:#A9BBD8;font-size:14px;">
                Admin Panel
            </small>
        </div>
    </div>

    {{-- MENU --}}
    <div class="px-3">
        <div class="text-uppercase mb-2 px-2"
             style="color:#849AB9;font-size:13px;letter-spacing:1px;">
            Menu
        </div>

        @php
            $menus = [
                [
                    'Dashboard',
                    'bi-speedometer2',
                    'admin.dashboard',
                    'admin.dashboard',
                ],
                [
                    'Profil Perusahaan',
                    'bi-building',
                    'admin.profil',
                    'admin.profil*',
                ],
                [
                    'Layanan',
                    'bi-gear',
                    'admin.layanan.index',
                    'admin.layanan*',
                ],
                [
                    'Artikel',
                    'bi-file-earmark-text',
                    'admin.artikel',
                    'admin.artikel*',
                ],
                [
                    'Galeri',
                    'bi-images',
                    'admin.galeri.index',
                    'admin.galeri*',
                ],
                [
                    'Kontak',
                    'bi-envelope',
                    'admin.kontak',
                    'admin.kontak',
                ],
            ];
        @endphp

        @foreach ($menus as $menu)
            <a href="{{ Route::has($menu[2]) ? route($menu[2]) : '#' }}"
               class="d-flex align-items-center gap-3 p-3 mb-1 rounded-2
               text-decoration-none text-white"
               style="{{ request()->routeIs($menu[3])
                   ? 'background:#234779;'
                   : 'background:transparent;' }}">

                <i class="bi {{ $menu[1] }} fs-5"></i>
                <span>{{ $menu[0] }}</span>
            </a>
        @endforeach
    </div>

    {{-- BAGIAN BAWAH --}}
    <div class="mt-auto p-3">

        {{-- LIHAT WEBSITE --}}
        <a href="{{ Route::has('home') ? route('home') : url('/') }}"
           class="d-flex align-items-center gap-3 p-3 mb-2
           text-decoration-none text-white fs-6">
            <i class="bi bi-globe fs-5"></i>
            <span>Lihat Website</span>
        </a>

        <hr style="border-color:#344763;">

        {{-- INFORMASI ADMIN --}}
        <div class="d-flex align-items-center gap-3 mb-3 px-2">
            <i class="bi bi-person-circle fs-3"></i>

            <div class="overflow-hidden">
                <div class="fw-semibold text-truncate">
                    {{ auth()->user()->name ?? 'Administrator' }}
                </div>

                <small style="color:#A9BBD8;font-size:13px;">
                    Administrator
                </small>
            </div>
        </div>

        {{-- LOGOUT --}}
        @if (Route::has('logout'))
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                        class="btn w-100 text-white text-start p-3 fs-6"
                        style="background:#172F54;">
                    <i class="bi bi-box-arrow-left me-2 fs-5"></i>
                    Keluar
                </button>
            </form>
        @endif

    </div>
</aside>