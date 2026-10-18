<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light text-secondary" style="font-size:14px;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h3 class="fw-bold mb-1" style="color:#103B55;">Tambah Artikel</h3>
                    <p class="mb-0">Tambahkan artikel dan informasi terbaru.</p>
                </div>
                <a href="{{ route('admin.artikel') }}" class="btn btn-outline-secondary">
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
                        <i class="bi bi-file-earmark-plus me-2" style="color:#146C94;"></i>
                        Formulir Artikel
                    </h6>
                    <small>Lengkapi informasi artikel yang akan diterbitkan.</small>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Artikel</label>
                            <input type="text" name="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul') }}" placeholder="Masukkan judul artikel" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanggal Artikel</label>
                            <input type="date" name="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', date('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Isi Artikel</label>
                            <textarea name="isi" rows="5"
                                class="form-control @error('isi') is-invalid @enderror"
                                placeholder="Tuliskan isi artikel di sini" required>{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Gambar Artikel</label>
                            <input type="file" name="gambar"
                                class="form-control @error('gambar') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-secondary">JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</small>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <button type="submit" class="btn text-white px-4" style="background:#146C94;">
                            <i class="bi bi-save me-1"></i> Simpan Artikel
                        </button>
                        <a href="{{ route('admin.artikel') }}" class="btn btn-light border px-4">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>