<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Solusi Koneksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body style="background:#F1F5FA;">

    @include('admin.sidebar')

    <main class="p-4" style="margin-left:250px;padding-bottom:85px !important;">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1" style="color:#10264A;">
                    Dashboard
                </h3>
                <p class="text-secondary mb-0">
                    Ringkasan pengelolaan website perusahaan
                </p>
            </div>

            <div class="rounded-3 px-3 py-2 bg-white"
                 style="border:1px solid #DCE5F2;">
                <i class="bi bi-person-circle me-2"
                   style="color:#234779;"></i>
                <span class="fw-semibold">
                    {{ auth()->user()->name }}
                </span>
            </div>
        </div>

        <!-- WELCOME -->
        <div class="rounded-4 p-4 mb-4 text-white position-relative overflow-hidden"
             style="background:#12315B;">

            <div class="position-relative" style="z-index:1;">
                <span class="badge rounded-pill mb-3"
                      style="background:#294C7B;color:#DCE9FC;">
                    ADMIN PANEL
                </span>

                <h3 class="fw-bold mb-2">
                    Selamat Datang, {{ auth()->user()->name }}!
                </h3>

                <p class="mb-0" style="color:#D2DFF2;">
                    Kelola informasi dan konten website Solusi Koneksi dengan mudah.
                </p>
            </div>

            <i class="bi bi-grid-1x2-fill position-absolute"
               style="font-size:120px;right:25px;bottom:-25px;color:#234779;"></i>
        </div>

        <!-- JUDUL MENU -->
        <div class="d-flex align-items-center mb-3">
            <div class="rounded-2 me-2"
                 style="width:5px;height:25px;background:#315F9D;">
            </div>

            <h5 class="fw-bold mb-0" style="color:#10264A;">
                Menu Website
            </h5>
        </div>

        <!-- DAFTAR MENU -->
        @php
            $menus = [
                [
                    'Profil Perusahaan',
                    'Informasi perusahaan',
                    'building',
                    'admin.profil'
                ],
                [
                    'Layanan',
                    'Kelola layanan perusahaan',
                    'grid',
                    'admin.layanan.index'
                ],
                [
                    'Artikel',
                    'Berita dan artikel',
                    'file-earmark-text',
                    'admin.artikel'
                ],
                [
                    'Galeri',
                    'Dokumentasi perusahaan',
                    'images',
                    'admin.galeri.index'
                ],
                [
                    'Kontak',
                    'Informasi kontak perusahaan',
                    'envelope',
                    'admin.kontak'
                ],
            ];
        @endphp

        <div class="row g-3">
            @foreach ($menus as $menu)
                <div class="col-md-6 col-xl-4">

                    <a href="{{ Route::has($menu[3]) ? route($menu[3]) : '#' }}"
                       class="d-block p-3 rounded-3 text-decoration-none text-dark h-100"
                       style="background:white;border:1px solid #DCE5F2;transition:0.2s;">

                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3"
                                 style="width:48px;height:48px;background:#E6EEF9;color:#234779;">
                                <i class="bi bi-{{ $menu[2] }} fs-4"></i>
                            </div>

                            <i class="bi bi-arrow-up-right ms-auto"
                               style="color:#5275A5;"></i>
                        </div>

                        <h6 class="fw-bold mb-1">
                            {{ $menu[0] }}
                        </h6>

                        <small class="text-secondary">
                            {{ $menu[1] }}
                        </small>
                    </a>

                </div>
            @endforeach
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="position-fixed bottom-0"
            style="left:250px;right:0;background:white;
            border-top:1px solid #DCE5F2;z-index:10;">

        <div class="px-4 py-3 d-flex justify-content-between align-items-center">
            <small class="text-secondary">
                &copy; {{ date('Y') }} Solusi Koneksi
            </small>

            <small style="color:#234779;">
                Admin Panel
            </small>
        </div>
    </footer>

</body>
</html>