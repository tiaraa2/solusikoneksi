@extends('layouts.app')

@section('content')

{{-- ================= HERO GALERI ================= --}}
<section class="py-4" style="background:linear-gradient(110deg,#EAF5FA,#FFFFFF);overflow:hidden;">
    <div class="container py-3">
        <div class="row align-items-center g-4">

            {{-- KONTEN KIRI --}}
            <div class="col-lg-7">
                <span class="small fw-bold text-uppercase"
                      style="color:#146C94;letter-spacing:2px;">
                    <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                    Galeri Kami
                </span>

                <h1 class="fw-bold mt-3"
                    style="color:#0B2638;font-size:clamp(30px,4vw,44px);line-height:1.25;">
                    Cerita dalam
                    <span style="color:#146C94;">Setiap Karya.</span>
                </h1>

                <p class="mt-3 mb-4"
                   style="color:#536779;line-height:1.8;max-width:540px;">
                    Lihat dokumentasi kegiatan, proses kerja, dan hasil karya
                    PT Solusi Koneksi Anda dalam menghadirkan solusi teknologi
                    serta layanan digital.
                </p>

                <a href="#daftar-galeri"
                   class="btn rounded-2 px-4 py-2 text-white fw-semibold"
                   style="background:#0B2638;">
                    Jelajahi Galeri
                    <i class="bi bi-arrow-down ms-2"></i>
                </a>
            </div>

            {{-- CARD KANAN --}}
            <div class="col-lg-5">
                <div class="rounded-3 p-4 p-lg-5 text-white"
                     style="min-height:340px;background:linear-gradient(135deg,#0B2638,#146C94);border-left:4px solid #19A7CE;">

                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-4"
                         style="width:60px;height:60px;background:rgba(102,213,238,.15);">
                        <i class="bi bi-images"
                           style="font-size:32px;color:#66D5EE;"></i>
                    </div>

                    <h3 class="fw-bold mb-3" style="color:#FFFFFF;">
                        Momen dan Karya Kami
                    </h3>

                    <p class="mb-0"
                       style="color:#DDF1F8;line-height:1.8;">
                        Dokumentasi yang merekam aktivitas, kreativitas,
                        dan perjalanan kami dalam mengembangkan solusi digital.
                    </p>

                    <div class="mt-4"
                         style="height:3px;width:50px;background:#66D5EE;"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= DAFTAR GALERI ================= --}}
<section id="koleksi" class="py-5" style="background:#FFFFFF;">
    <div class="container py-3">

        <div class="mb-4">
            <span class="small fw-bold" style="color:#19A7CE;letter-spacing:2px;">
                KOLEKSI KAMI
            </span>

            <h2 class="fw-bold mt-2 mb-2" style="color:#0B2638;">
                Semua Galeri & Dokumentasi
            </h2>

            <p class="mb-0" style="color:#536779;">
                Temukan berbagai momen dan karya yang telah kami abadikan.
            </p>
        </div>

        <div class="row g-4">
            @forelse ($galeris as $galeri)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 border-0 rounded-3 overflow-hidden"
                         style="box-shadow:0 5px 20px rgba(11,38,56,.08);">

                        <img
                            src="{{ asset('storage/' . $galeri->gambar) }}"
                            alt="{{ $galeri->judul }}"
                            class="card-img-top"
                            style="height:230px;object-fit:cover;"
                            loading="lazy"
                        >

                        <div class="card-body p-4">
                            <span class="badge rounded-1 px-3 py-2"
                                  style="background:#DDF1F8;color:#146C94;">
                                {{ $galeri->kategori ?: 'Dokumentasi' }}
                            </span>

                            <h5 class="fw-bold mt-3 mb-2" style="color:#0B2638;">
                                {{ $galeri->judul }}
                            </h5>

                            @if ($galeri->tanggal)
                                <p class="small mb-0" style="color:#536779;">
                                    <i class="bi bi-calendar3 me-1"
                                       style="color:#19A7CE;"></i>
                                    {{ \Carbon\Carbon::parse($galeri->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 pb-3">
                            <div style="height:1px;background:#E5EEF3;"></div>
                            <p class="small mt-3 mb-0" style="color:#146C94;">
                                <i class="bi bi-camera me-2"></i>
                                Dokumentasi Galeri
                            </p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center rounded-3 py-5"
                         style="background:#F3F9FC;">
                        <i class="bi bi-images fs-1" style="color:#19A7CE;"></i>

                        <h5 class="fw-bold mt-3" style="color:#0B2638;">
                            Belum Ada Galeri
                        </h5>

                        <p class="mb-0" style="color:#536779;">
                            Dokumentasi yang ditambahkan admin akan muncul di sini.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination jika tersedia --}}
        @if (method_exists($galeris, 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $galeris->links() }}
            </div>
        @endif
    </div>
</section>

@endsection