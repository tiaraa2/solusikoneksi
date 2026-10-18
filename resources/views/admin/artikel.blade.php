<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Artikel | Solusi Koneksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background: #F1F5FA;
            font-size: 14px;
        }

        .foto-artikel {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
        }

        .table th {
            white-space: nowrap;
        }

        main {
            margin-left: 250px;
            padding-bottom: 90px !important;
        }

        @media (max-width: 768px) {
            main {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    @include('admin.sidebar')

    <main class="container-fluid p-3 p-lg-4"
      style="margin-left:250px; width:calc(100% - 250px);">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1" style="color:#10264A;">
                    Data Artikel
                </h3>
                <p class="text-secondary mb-0">
                    Kelola artikel dan informasi perusahaan.
                </p>
            </div>

            <div class="bg-white border rounded-3 px-3 py-2">
                <i class="bi bi-person-circle me-2" style="color:#234779;"></i>
                <span class="fw-semibold">{{ auth()->user()->name }}</span>
            </div>
        </div>

        {{-- JUDUL DAN TOMBOL --}}
        <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-3"
                             style="width:45px;height:45px;background:#E6EEF9;color:#234779;">
                            <i class="bi bi-file-earmark-text fs-4"></i>
                        </div>

                        <div>
                            <h5 class="fw-bold mb-1" style="color:#10264A;">
                                Daftar Artikel
                            </h5>
                            <small class="text-secondary">
                                Daftar artikel yang tersimpan di website.
                            </small>
                        </div>
                    </div>

                    <a href="{{ route('admin.artikel.create') }}"
                       class="btn text-white"
                       style="background:#234779;">
                        <i class="bi bi-plus-lg me-1"></i>
                        Tambah Artikel
                    </a>
                </div>
            </div>
        </div>

        {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- TABEL ARTIKEL --}}
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">No.</th>
                                <th>Gambar</th>
                                <th>Judul Artikel</th>
                                <th>Tanggal</th>
                                <th>Isi Artikel</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($artikels as $artikel)
                                <tr>
                                    <td class="ps-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        @if ($artikel->gambar)
                                            <img src="{{ asset('storage/' . $artikel->gambar) }}"
                                                 alt="{{ $artikel->judul }}"
                                                 class="foto-artikel">
                                        @else
                                            <span class="text-secondary small">
                                                Belum ada gambar
                                            </span>
                                        @endif
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $artikel->judul }}
                                    </td>

                                    <td class="text-nowrap">
                                        {{ $artikel->tanggal
                                            ? \Carbon\Carbon::parse($artikel->tanggal)->locale('id')->translatedFormat('d M Y')
                                            : '-' }}
                                    </td>

                                    <td>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi ?? ''), 70) }}
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.artikel.edit', $artikel->id) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('admin.artikel.destroy', $artikel->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-inbox fs-1 text-secondary"></i>
                                        <p class="text-secondary mt-2 mb-0">
                                            Belum ada data artikel.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </main>

    {{-- FOOTER --}}
    <footer class="position-fixed bottom-0"
            style="left:250px;right:0;background:#fff;border-top:1px solid #DCE5F2;z-index:10;">
        <div class="px-4 py-3 d-flex justify-content-between align-items-center">
            <small class="text-secondary">
                &copy; {{ date('Y') }} Solusi Koneksi
            </small>
            <small style="color:#234779;">Admin Panel</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>