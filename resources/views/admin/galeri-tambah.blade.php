<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Galeri | Solusi Koneksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light text-secondary" style="font-size:14px;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h3 class="fw-bold mb-1" style="color:#103B55;">Tambah Galeri</h3>
                    <p class="mb-0">Tambahkan dokumentasi perusahaan ke galeri website.</p>
                </div>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali data:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white p-3">
                    <h6 class="fw-bold mb-1" style="color:#103B55;">
                        <i class="bi bi-images me-2" style="color:#146C94;"></i>
                        Formulir Galeri
                    </h6>
                    <small>Lengkapi informasi dokumentasi perusahaan.</small>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">Judul Galeri</label>
                            <input type="text" name="judul" id="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul') }}" placeholder="Masukkan judul galeri" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label fw-semibold">Kategori Galeri</label>
                            <select name="kategori" id="kategori"
                                class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="">Pilih kategori</option>
                                @foreach (['Kegiatan', 'Dokumentasi', 'Acara', 'Prestasi', 'Lainnya'] as $kategori)
                                    <option value="{{ $kategori }}" @selected(old('kategori') == $kategori)>
                                        {{ $kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">Tanggal Galeri</label>
                            <input type="date" name="tanggal" id="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', date('Y-m-d')) }}">
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="form-label fw-semibold">Gambar Galeri</label>
                            <input type="file" name="gambar" id="gambar"
                                class="form-control @error('gambar') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp" required>
                            <small class="text-secondary">JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</small>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <button type="submit" class="btn text-white px-4" style="background:#146C94;">
                            <i class="bi bi-save me-1"></i> Simpan Galeri
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border px-4">
                            Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>