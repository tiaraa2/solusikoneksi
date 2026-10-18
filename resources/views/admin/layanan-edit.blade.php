<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light text-secondary" style="font-size:14px;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h3 class="fw-bold mb-1" style="color:#103B55;">Edit Layanan</h3>
                    <p class="mb-0">Perbarui informasi layanan perusahaan.</p>
                </div>
                <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

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
                        <i class="bi bi-pencil-square me-2" style="color:#146C94;"></i>
                        Formulir Edit Layanan
                    </h6>
                    <small>Ubah informasi sesuai kebutuhan.</small>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.layanan.update', $service->id) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Layanan</label>
                            <input type="text" name="nama_layanan"
                                class="form-control @error('nama_layanan') is-invalid @enderror"
                                value="{{ old('nama_layanan', $service->nama_layanan) }}"
                                placeholder="Masukkan nama layanan" required>
                            @error('nama_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi Layanan</label>
                            <textarea name="deskripsi" rows="4"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Jelaskan layanan perusahaan" required>{{ old('deskripsi', $service->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Ganti Foto (Opsional)</label>
                            <input type="file" name="foto"
                                class="form-control @error('foto') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-secondary">
                                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                                Kosongkan jika tidak ingin mengganti foto.
                            </small>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <button type="submit" class="btn text-white px-4" style="background:#146C94;">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.layanan.index') }}" class="btn btn-light border px-4">
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
