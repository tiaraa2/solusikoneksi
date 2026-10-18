<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Masuk | PT Solusi Koneksi Anda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light text-secondary" style="font-size:14px;">

    @include('admin.sidebar')

    <main class="container-fluid p-3 p-lg-4"
          style="margin-left:250px; width:calc(100% - 250px); padding-bottom:100px !important;">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <small class="fw-semibold" style="color:#19A7CE; letter-spacing:1.5px;">
                    ADMINISTRASI / KONTAK
                </small>

                <h3 class="fw-bold mt-2 mb-1" style="color:#103B55;">
                    Pesan Masuk
                </h3>

                <p class="text-secondary mb-0">
                    Kelola pesan dari pengunjung website perusahaan.
                </p>
            </div>

            <div class="bg-white border rounded-3 px-3 py-2">
                <i class="bi bi-person-circle me-2" style="color:#146C94;"></i>
                <span class="fw-semibold" style="color:#103B55;">
                    {{ auth()->user()->name }}
                </span>
            </div>
        </div>

        {{-- NOTIFIKASI SUKSES --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- NOTIFIKASI ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <div class="fw-semibold mb-2">Terjadi kesalahan:</div>

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- JUDUL DAFTAR PESAN --}}
        <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:46px; height:46px; background:#DDF1F8; color:#146C94;">
                            <i class="bi bi-envelope-fill fs-4"></i>
                        </div>

                        <div>
                            <h5 class="fw-bold mb-1" style="color:#103B55;">
                                Daftar Pesan Pengunjung
                            </h5>

                            <small class="text-secondary">
                                Semua pesan yang dikirim melalui formulir kontak website.
                            </small>
                        </div>
                    </div>

                    <span class="badge rounded-pill px-3 py-2"
                          style="background:#DDF1F8; color:#146C94;">
                        <i class="bi bi-envelope me-1"></i>
                        {{ $pesans->total() }} Pesan
                    </span>

                </div>
            </div>
        </div>

        {{-- TABEL PESAN --}}
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

            <div class="card-header bg-white border-bottom p-3">
                <h6 class="fw-bold mb-1" style="color:#103B55;">
                    <i class="bi bi-list-ul me-2" style="color:#146C94;"></i>
                    Data Pesan Pengunjung
                </h6>

                <small class="text-secondary">
                    Klik alamat email untuk langsung menulis balasan melalui Gmail.
                </small>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead>
                            <tr style="background:#EAF5FA; color:#103B55;">
                                <th class="ps-4 py-3">No.</th>
                                <th class="py-3">Nama Pengunjung</th>
                                <th class="py-3">Email</th>
                                <th class="py-3">Isi Pesan</th>
                                <th class="py-3">Tanggal Masuk</th>
                                <th class="text-center py-3 pe-4">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($pesans as $pesan)
                                <tr>
                                    {{-- NOMOR --}}
                                    <td class="ps-4">
                                        {{ $pesans->firstItem() + $loop->index }}
                                    </td>

                                    {{-- NAMA --}}
                                    <td class="fw-semibold text-nowrap"
                                        style="color:#103B55; min-width:150px;">
                                        {{ $pesan->nama }}
                                    </td>

                                    {{-- EMAIL: KLIK UNTUK MEMBUKA GMAIL --}}
                                    <td style="min-width:180px;">
                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($pesan->email) }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="text-decoration-none"
                                           style="color:#146C94;"
                                           title="Kirim email ke {{ $pesan->email }}">
                                            <i class="bi bi-envelope me-1"></i>
                                            {{ $pesan->email }}
                                        </a>
                                    </td>

                                    {{-- ISI PESAN --}}
                                    <td style="min-width:200px; max-width:380px; overflow-wrap:anywhere;">
                                        {{ $pesan->pesan }}
                                    </td>

                                    {{-- TANGGAL --}}
                                    <td class="text-nowrap">
                                        {{ $pesan->created_at
                                            ? $pesan->created_at->locale('id')->translatedFormat('d M Y')
                                            : '-' }}
                                    </td>

                                    {{-- AKSI HAPUS --}}
                                    <td class="text-center pe-4">
                                        <form
                                            action="{{ route('admin.kontak.destroy', $pesan->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus pesan"
                                                    aria-label="Hapus pesan">
                                                <i class="bi bi-trash me-1"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="mb-3" style="color:#19A7CE;">
                                            <i class="bi bi-inbox" style="font-size:42px;"></i>
                                        </div>

                                        <h6 class="fw-bold" style="color:#103B55;">
                                            Belum Ada Pesan
                                        </h6>

                                        <p class="text-secondary mb-0">
                                            Pesan dari pengunjung akan muncul di halaman ini.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>

            {{-- PAGINATION --}}
            @if ($pesans->hasPages())
                <div class="card-footer bg-white border-0 p-3">
                    {{ $pesans->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>

    </main>

    {{-- FOOTER --}}
    <footer class="position-fixed bottom-0 end-0 bg-white border-top px-4 py-3"
            style="left:250px; z-index:100;">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <small class="text-secondary">
                &copy; {{ date('Y') }} PT Solusi Koneksi Anda
            </small>

            <small style="color:#146C94;">
                <i class="bi bi-shield-check me-1"></i>
                Corporate Management System
            </small>
        </div>

    </footer>

    {{-- RESPONSIVE --}}
    <style>
        @media (max-width: 991.98px) {
            main {
                margin-left: 0 !important;
                width: 100% !important;
            }

            footer {
                left: 0 !important;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>