<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil Perusahaan | PT Solusi Koneksi Anda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light text-secondary" style="font-size:14px;">

    @include('admin.sidebar')

    <main class="p-3 p-lg-4" style="margin-left:250px; padding-bottom:100px !important;">

        {{-- Header --}}
        <section class="bg-white border rounded-3 p-4 mb-4">
            <div class="small fw-semibold mb-2" style="color:#19A7CE; letter-spacing:1.5px;">
                ADMINISTRASI / PROFIL PERUSAHAAN
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                     style="width:48px; height:48px; background:#DDF1F8; color:#146C94;">
                    <i class="bi bi-building fs-4"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1" style="color:#103B55;">
                        Edit Profil Perusahaan
                    </h3>
                    <p class="text-secondary mb-0">
                        Perbarui informasi profil PT Solusi Koneksi Anda.
                    </p>
                </div>
            </div>
        </section>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="fw-bold mb-2">Data belum berhasil disimpan.</div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Tentang perusahaan --}}
            <section class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom p-3 p-lg-4">
                    <h5 class="fw-bold mb-1" style="color:#103B55;">
                        <i class="bi bi-building me-2" style="color:#146C94;"></i>
                        Tentang Perusahaan
                    </h5>
                    <small class="text-secondary">Informasi utama perusahaan</small>
                </div>

                <div class="card-body p-3 p-lg-4">
                    <input type="hidden" name="konten[gambar]"
                           value="{{ old('konten.gambar', $konten['gambar'] ?? '') }}">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Tentang</label>
                        <input type="text" name="konten[tentang_judul]"
                               class="form-control"
                               value="{{ old('konten.tentang_judul', $konten['tentang_judul'] ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Paragraf Pertama</label>
                        <textarea name="konten[tentang_paragraf_1]"
                                  class="form-control" rows="4">{{ old('konten.tentang_paragraf_1', $konten['tentang_paragraf_1'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Paragraf Kedua</label>
                        <textarea name="konten[tentang_paragraf_2]"
                                  class="form-control" rows="4">{{ old('konten.tentang_paragraf_2', $konten['tentang_paragraf_2'] ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="form-label fw-semibold">Komitmen Perusahaan</label>
                        <textarea name="konten[tentang_komitmen]"
                                  class="form-control" rows="3">{{ old('konten.tentang_komitmen', $konten['tentang_komitmen'] ?? '') }}</textarea>
                    </div>
                </div>
            </section>

            {{-- Visi --}}
            <section class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom p-3 p-lg-4">
                    <h5 class="fw-bold mb-1" style="color:#103B55;">
                        <i class="bi bi-eye me-2" style="color:#146C94;"></i>
                        Visi Perusahaan
                    </h5>
                    <small class="text-secondary">Arah dan tujuan perusahaan</small>
                </div>

                <div class="card-body p-3 p-lg-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Visi</label>
                        <input type="text" name="konten[visi_judul]"
                               class="form-control"
                               value="{{ old('konten.visi_judul', $konten['visi_judul'] ?? '') }}">
                    </div>

                    <div>
                        <label class="form-label fw-semibold">Deskripsi Visi</label>
                        <textarea name="konten[visi_deskripsi]"
                                  class="form-control" rows="4">{{ old('konten.visi_deskripsi', $konten['visi_deskripsi'] ?? '') }}</textarea>
                    </div>
                </div>
            </section>

            {{-- Misi --}}
            <section class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom p-3 p-lg-4">
                    <h5 class="fw-bold mb-1" style="color:#103B55;">
                        <i class="bi bi-bullseye me-2" style="color:#146C94;"></i>
                        Misi Perusahaan
                    </h5>
                    <small class="text-secondary">Daftar misi yang dijalankan perusahaan</small>
                </div>

                <div class="card-body p-3 p-lg-4">
                    @foreach (($konten['misi'] ?? []) as $i => $misi)
                        <div class="rounded-3 border p-3 mb-3"
                             style="background:#F5FAFC; border-color:#D7ECF5 !important;">

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <span class="badge rounded-pill"
                                      style="background:#146C94;">
                                    {{ $i + 1 }}
                                </span>
                                <span class="fw-semibold" style="color:#103B55;">
                                    Misi {{ $i + 1 }}
                                </span>
                            </div>

                            <input type="hidden"
                                   name="konten[misi][{{ $i }}][ikon]"
                                   value="{{ old("konten.misi.$i.ikon", $misi['ikon'] ?? '') }}">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul Misi</label>
                                <input type="text"
                                       name="konten[misi][{{ $i }}][judul]"
                                       class="form-control"
                                       value="{{ old("konten.misi.$i.judul", $misi['judul'] ?? '') }}">
                            </div>

                            <div>
                                <label class="form-label fw-semibold">Deskripsi Misi</label>
                                <textarea name="konten[misi][{{ $i }}][deskripsi]"
                                          class="form-control" rows="3">{{ old("konten.misi.$i.deskripsi", $misi['deskripsi'] ?? '') }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Nilai perusahaan --}}
            <section class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom p-3 p-lg-4">
                    <h5 class="fw-bold mb-1" style="color:#103B55;">
                        <i class="bi bi-gem me-2" style="color:#146C94;"></i>
                        Nilai Perusahaan
                    </h5>
                    <small class="text-secondary">Nilai yang menjadi pedoman perusahaan</small>
                </div>

                <div class="card-body p-3 p-lg-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Nilai</label>
                        <input type="text" name="konten[nilai_judul]"
                               class="form-control"
                               value="{{ old('konten.nilai_judul', $konten['nilai_judul'] ?? '') }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Keterangan Nilai</label>
                        <textarea name="konten[nilai_keterangan]"
                                  class="form-control" rows="3">{{ old('konten.nilai_keterangan', $konten['nilai_keterangan'] ?? '') }}</textarea>
                    </div>

                    @foreach (($konten['nilai'] ?? []) as $i => $nilai)
                        <div class="rounded-3 border p-3 mb-3"
                             style="background:#F5FAFC; border-color:#D7ECF5 !important;">

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <span class="badge rounded-pill"
                                      style="background:#146C94;">
                                    {{ $i + 1 }}
                                </span>
                                <span class="fw-semibold" style="color:#103B55;">
                                    Nilai {{ $i + 1 }}
                                </span>
                            </div>

                            <input type="hidden"
                                   name="konten[nilai][{{ $i }}][ikon]"
                                   value="{{ old("konten.nilai.$i.ikon", $nilai['ikon'] ?? '') }}">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul Nilai</label>
                                <input type="text"
                                       name="konten[nilai][{{ $i }}][judul]"
                                       class="form-control"
                                       value="{{ old("konten.nilai.$i.judul", $nilai['judul'] ?? '') }}">
                            </div>

                            <div>
                                <label class="form-label fw-semibold">Deskripsi Nilai</label>
                                <textarea name="konten[nilai][{{ $i }}][deskripsi]"
                                          class="form-control" rows="3">{{ old("konten.nilai.$i.deskripsi", $nilai['deskripsi'] ?? '') }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>

                <button type="submit" class="btn text-white px-4"
                        style="background:#146C94; border-color:#146C94;">
                    <i class="bi bi-save me-1"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </main>

    {{-- Footer --}}
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

    <style>
        .form-control:focus {
            border-color: #19A7CE;
            box-shadow: 0 0 0 .2rem rgba(25,167,206,.15);
        }

        @media (max-width: 991.98px) {
            main { margin-left: 0 !important; }
            footer { left: 0 !important; }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>