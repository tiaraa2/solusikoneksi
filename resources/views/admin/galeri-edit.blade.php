<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Galeri | Solusi Koneksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light text-secondary" style="font-size:14px;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h3 class="fw-bold mb-1" style="color:#103B55;">
                        Edit Galeri
                    </h3>
                    <p class="mb-0">Perbarui informasi dokumentasi perusahaan.</p>
                </div>

                <a href="{{ route('admin.galeri.index') }}"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            {{-- NOTIFIKASI --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
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

            {{-- FORM EDIT --}}
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white p-3">
                    <h6 class="fw-bold mb-1" style="color:#103B55;">
                        <i class="bi bi-pencil-square me-2" style="color:#146C94;"></i>
                        Formulir Edit Galeri
                    </h6>
                    <small>Ubah informasi galeri sesuai kebutuhan.</small>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('admin.galeri.update', $galeri->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- JUDUL --}}
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">
                                Judul Galeri
                            </label>

                            <input type="text"
                                   name="judul"
                                   id="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $galeri->judul) }}"
                                   placeholder="Masukkan judul galeri"
                                   required>

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- KATEGORI --}}
                        <div class="mb-3">
                            <label for="kategori" class="form-label fw-semibold">
                                Kategori Galeri
                            </label>

                            <select name="kategori"
                                    id="kategori"
                                    class="form-select @error('kategori') is-invalid @enderror"
                                    required>
                                <option value="">Pilih kategori</option>

                                @foreach (['Kegiatan', 'Dokumentasi', 'Acara', 'Prestasi', 'Lainnya'] as $kategori)
                                    <option value="{{ $kategori }}"
                                        @selected(old('kategori', $galeri->kategori) == $kategori)>
                                        {{ $kategori }}
                                    </option>
                                @endforeach
                            </select>

                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TANGGAL --}}
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                Tanggal Galeri
                            </label>

                            <input type="date"
                                   name="tanggal"
                                   id="tanggal"
                                   class="form-control @error('tanggal') is-invalid @enderror"
                                   value="{{ old('tanggal', $galeri->tanggal ? \Illuminate\Support\Carbon::parse($galeri->tanggal)->format('Y-m-d') : '') }}">

                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- GAMBAR LAMA --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Gambar Saat Ini
                            </label>

                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $galeri->gambar) }}"
                                     alt="{{ $galeri->judul }}"
                                     class="img-thumbnail rounded-3"
                                     style="width:180px;height:130px;object-fit:cover;">
                            </div>
                        </div>

                        {{-- GAMBAR BARU --}}
                        <div class="mb-4">
                            <label for="gambar" class="form-label fw-semibold">
                                Ganti Gambar (Opsional)
                            </label>

                            <input type="file"
                                   name="gambar"
                                   id="gambar"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   accept=".jpg,.jpeg,.png,.webp">

                            <small class="text-secondary">
                                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                                Kosongkan jika tidak ingin mengganti gambar.
                            </small>

                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- PREVIEW GAMBAR BARU --}}
                            <div class="mt-3">
                                <img id="preview-gambar"
                                     src=""
                                     alt="Preview gambar baru"
                                     class="img-thumbnail rounded-3 d-none"
                                     style="width:180px;height:130px;object-fit:cover;">
                            </div>
                        </div>

                        <hr>

                        {{-- TOMBOL --}}
                        <button type="submit"
                                class="btn text-white px-4"
                                style="background:#146C94;">
                            <i class="bi bi-save me-1"></i>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.galeri.index') }}"
                           class="btn btn-light border px-4">
                            Batal
                        </a>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('gambar').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-gambar');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        } else {
            preview.src = '';
            preview.classList.add('d-none');
        }
    });
</script>

</body>
</html>