@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="text-white" style="background:linear-gradient(120deg,#0B2638,#146C94)">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge rounded-pill border border-info text-info px-3 py-2 mb-3">
                    <i class="bi bi-buildings me-1"></i> PT SOLUSI KONEKSI ANDA
                </span>

                <h1 class="fw-bold mb-3" style="font-size:clamp(32px,3.5vw,46px);line-height:1.2;color:#FFFFFF">
                    Membangun Solusi Digital
                    <span class="d-block" style="color:#66D5EE">untuk Masa Depan.</span>
                </h1>

                <p class="mb-3" style="color:#FFFFFF;line-height:1.8;max-width:470px">
                    Kami membantu perusahaan berkembang melalui website,
                    aplikasi, desain kreatif, dan sistem informasi yang sesuai kebutuhan.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('layanan') }}" class="btn btn-info text-white btn-sm px-3 py-2">
                        Jelajahi Produk <i class="bi bi-arrow-up-right ms-1"></i>
                    </a>

                    <a href="{{ route('kontak') }}" class="btn btn-outline-light btn-sm px-3 py-2">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="position-relative mx-auto" style="max-width:500px">
                    <img src="{{ asset('images/perusahaan.jpg') }}"
                         alt="PT Solusi Koneksi Anda"
                         class="img-fluid w-100 rounded-4 border border-3 border-white shadow"
                         style="height:380px;object-fit:cover"
                         onerror="this.onerror=null;this.src='{{ asset('images/hero.jpg') }}';">

                    <div class="position-absolute bottom-0 start-0 m-3 bg-white rounded-3 shadow p-2 d-flex align-items-center gap-2">
                        <span class="rounded-3 p-2" style="background:#DDF1F8;color:#0B2638">
                            <i class="bi bi-lightning-charge-fill fs-4"></i>
                        </span>

                        <div>
                            <div class="fw-bold small" style="color:#0B2638">Teknologi untuk Bisnis</div>
                            <div style="color:#0B2638;font-size:11px">Ide menjadi solusi nyata.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PROFIL SINGKAT --}}
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-5">
                <span class="fw-bold small" style="color:#146C94">
                    TENTANG KAMI
                </span>

                <div class="my-3">
                    <div class="rounded-3 d-inline-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;background:#DDF1F8;color:#146C94">
                        <i class="bi bi-buildings fs-3"></i>
                    </div>
                </div>

                <h2 class="fw-bold mt-2 mb-3" style="color:#0B2638">
                    Solusi Digital untuk Kebutuhan Anda
                </h2>

                <p class="text-secondary" style="line-height:1.8">
                    PT Solusi Koneksi Anda berfokus pada pengembangan solusi
                    teknologi yang membantu bisnis bekerja lebih efektif,
                    kreatif, dan terintegrasi.
                </p>

                <a href="{{ route('kontak') }}"
                   class="text-decoration-none fw-semibold"
                   style="color:#146C94">
                    Kenali Kami <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="col-lg-7">
                <div class="row g-3">
                    @php
                        $keunggulan = [
                            ['bi-bullseye','Berorientasi Solusi','Mengutamakan kebutuhan dan tujuan klien.'],
                            ['bi-lightbulb','Inovasi Digital','Mengembangkan ide menjadi solusi bermanfaat.'],
                            ['bi-shield-check','Kualitas Pekerjaan','Memperhatikan kualitas dan fungsi produk.'],
                            ['bi-people','Kolaborasi','Bekerja sama untuk hasil yang sesuai kebutuhan.'],
                        ];
                    @endphp

                    @foreach ($keunggulan as $item)
                        <div class="col-sm-6">
                            <div class="h-100 rounded-3 p-3 border">
                                <div class="rounded-3 d-inline-flex p-2 mb-3"
                                     style="background:#DDF1F8;color:#146C94">
                                    <i class="bi {{ $item[0] }} fs-5"></i>
                                </div>
                                <h6 class="fw-bold" style="color:#0B2638">{{ $item[1] }}</h6>
                                <p class="text-secondary small mb-0">{{ $item[2] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PRODUK KAMI --}}
<section class="py-5" style="background:#F4F8FA">
    <div class="container">
        <div class="text-center mx-auto mb-4" style="max-width:600px">
            <span class="fw-bold small" style="color:#146C94">
                PRODUK KAMI
            </span>

            <h2 class="fw-bold mt-2" style="color:#0B2638">
                Produk Digital Unggulan
            </h2>

            <p class="text-secondary">
                Produk digital untuk mendukung kebutuhan bisnis dan organisasi.
            </p>
        </div>

        <div class="row g-3">
            @forelse (($produks ?? collect())->take(4) as $produk)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 border-0 rounded-3 overflow-hidden"
                         style="background:#FFFFFF;box-shadow:0 5px 22px rgba(11,38,56,.08);">

                        @if($produk->foto)
                            <img src="{{ asset('storage/'.$produk->foto) }}"
                                 alt="{{ $produk->nama_layanan }}"
                                 class="w-100"
                                 style="height:190px;object-fit:cover"
                                 loading="lazy">
                        @else
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:190px;background:#EAF5FA">
                                <i class="bi bi-box-seam"
                                   style="font-size:55px;color:#146C94"></i>
                            </div>
                        @endif

                        <div class="card-body p-3">
                            <span class="badge rounded-2 px-2 py-2"
                                  style="background:#DDF1F8;color:#146C94;font-size:10px">
                                <i class="bi bi-grid me-1"></i>
                                PRODUK DIGITAL
                            </span>

                            <h5 class="fw-bold mt-3 mb-2"
                                style="color:#0B2638;font-size:16px">
                                {{ $produk->nama_layanan }}
                            </h5>

                            <p class="small mb-0"
                               style="color:#536779;line-height:1.7">
                                {{ \Illuminate\Support\Str::limit($produk->deskripsi, 100) }}
                            </p>
                        </div>

                        <div class="mx-3 mb-3"
                             style="height:2px;background:#DDF1F8"></div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center rounded-3 p-4"
                         style="background:#FFFFFF;border:1px solid #D7ECF5">
                        <i class="bi bi-box-seam fs-2" style="color:#146C94"></i>
                        <p class="mb-0 mt-2" style="color:#536779">
                            Belum ada produk yang tersedia.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('layanan') }}"
               class="btn btn-outline-primary btn-sm px-3">
                Lihat Semua Produk <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ARTIKEL --}}
<section class="py-5" style="background:#F4F8FA" id="artikel">
    <div class="container">
        <div class="text-center mx-auto mb-4" style="max-width:600px">
            <span class="fw-bold small" style="color:#146C94">ARTIKEL</span>
            <h2 class="fw-bold mt-2" style="color:#0B2638">
                Informasi dan Wawasan Digital
            </h2>
            <p class="text-secondary">
                Informasi seputar teknologi dan perkembangan digital.
            </p>
        </div>

        <div class="row g-3">
            @forelse (($artikels ?? collect())->take(3) as $artikel)
                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                        @if (!empty($artikel->gambar))
                            <img src="{{ asset('storage/'.$artikel->gambar) }}"
                                 alt="{{ $artikel->judul }}"
                                 class="w-100"
                                 style="height:190px;object-fit:cover"
                                 loading="lazy">
                        @else
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:190px;background:#DDF1F8">
                                <i class="bi bi-newspaper fs-1" style="color:#146C94"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="d-flex justify-content-between gap-2 mb-2">
                                <span class="small" style="color:#146C94">
                                    {{ $artikel->kategori ?? 'Informasi' }}
                                </span>

                                @if (!empty($artikel->tanggal))
                                    <span class="text-secondary small">
                                        {{ $artikel->tanggal }}
                                    </span>
                                @endif
                            </div>

                            <h6 class="fw-bold" style="color:#0B2638">
                                {{ $artikel->judul }}
                            </h6>

                            <p class="small text-secondary">
                                {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi ?? $artikel->konten ?? $artikel->deskripsi ?? ''), 110) }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center border rounded-3 p-4 text-secondary">
                        <i class="bi bi-newspaper fs-2" style="color:#19A7CE"></i>
                        <p class="mb-0 mt-2">Belum ada artikel tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('artikel') }}"
               class="btn btn-outline-primary btn-sm px-3">
                Semua Artikel <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- GALERI --}}
<section class="py-5" id="galeri">
    <div class="container">
        <div class="text-center mx-auto mb-4" style="max-width:600px">
            <span class="fw-bold small" style="color:#146C94">GALERI</span>
            <h2 class="fw-bold mt-2" style="color:#0B2638">
                Karya dan Dokumentasi Kami
            </h2>
            <p class="text-secondary">
                Dokumentasi kegiatan dan hasil pekerjaan yang tersedia di galeri.
            </p>
        </div>

        <div class="row g-3">
            @forelse (($galeris ?? collect())->take(3) as $galeri)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                        <img src="{{ asset('storage/'.$galeri->gambar) }}"
                             alt="{{ $galeri->judul }}"
                             class="w-100"
                             style="height:200px;object-fit:cover"
                             loading="lazy">

                        <div class="card-body">
                            <span class="small fw-bold" style="color:#146C94">
                                {{ $galeri->kategori ?? 'Dokumentasi' }}
                            </span>

                            <h6 class="fw-bold mt-2 mb-2" style="color:#0B2638">
                                {{ $galeri->judul }}
                            </h6>

                            <small class="text-secondary">
                                <i class="bi bi-calendar3 me-1" style="color:#19A7CE"></i>
                                {{ $galeri->created_at
                                    ? $galeri->created_at->locale('id')->translatedFormat('d F Y')
                                    : '-' }}
                            </small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center border rounded-3 p-4 text-secondary">
                        <i class="bi bi-images fs-2" style="color:#19A7CE"></i>
                        <p class="mb-0 mt-2">Dokumentasi belum tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('galeri') }}"
               class="btn btn-outline-primary btn-sm px-3">
                Lihat Semua Galeri
            </a>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5">
    <div class="container">
        <div class="rounded-4 p-4 p-lg-5 d-flex flex-column flex-md-row
                    align-items-md-center justify-content-between gap-3"
             style="background:linear-gradient(120deg,#0B2638,#146C94)">
            <div class="text-white">
                <span class="fw-bold small" style="color:#66D5EE">
                    MARI BERKOLABORASI
                </span>

                <h2 class="fw-bold mt-2" style="color:#FFFFFF">
                    Punya rencana proyek digital?
                </h2>

                <p class="mb-0" style="color:#FFFFFF">
                    Diskusikan kebutuhan Anda dan temukan solusi yang tepat bersama kami.
                </p>
            </div>

            <a href="{{ route('kontak') }}"
               class="btn btn-info text-white px-4 py-2 flex-shrink-0">
                Mulai Konsultasi <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

@endsection