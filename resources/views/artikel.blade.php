@extends('layouts.app')

@section('content')

{{-- ================= HERO ARTIKEL ================= --}}
<section class="py-4" style="background:linear-gradient(110deg,#EAF5FA,#FFFFFF);overflow:hidden;">
    <div class="container py-3">
        <div class="row align-items-center g-4">

            {{-- KONTEN KIRI --}}
            <div class="col-lg-7">
                <span class="small fw-bold text-uppercase"
                      style="color:#146C94;letter-spacing:2px;">
                    <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                    Artikel Kami
                </span>

                <h1 class="fw-bold mt-3"
                    style="color:#0B2638;font-size:clamp(30px,4vw,44px);line-height:1.25;">
                    Jelajahi Artikel
                    <span style="color:#146C94;">Inspiratif.</span>
                </h1>

                <p class="mt-3 mb-4"
                   style="color:#536779;line-height:1.8;max-width:540px;">
                    Temukan informasi, wawasan, dan tips seputar teknologi
                    digital untuk menambah pengetahuan dan mengikuti
                    perkembangan dunia digital.
                </p>

                <a href="#daftar-artikel"
                   class="btn rounded-2 px-4 py-2 text-white fw-semibold"
                   style="background:#0B2638;">
                    Baca Artikel
                    <i class="bi bi-arrow-down ms-2"></i>
                </a>
            </div>

            {{-- CARD KANAN: UKURAN SAMA DENGAN LAYANAN --}}
            <div class="col-lg-5">
                <div class="rounded-3 p-4 p-lg-5 text-white"
                     style="background:linear-gradient(135deg,#0B2638,#146C94);border-left:4px solid #19A7CE;">

                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-4"
                         style="width:60px;height:60px;background:rgba(102,213,238,.15);">
                        <i class="bi bi-journal-richtext"
                           style="font-size:32px;color:#66D5EE;"></i>
                    </div>

                    <h3 class="fw-bold mb-3" style="color:#FFFFFF;">
                        Wawasan Digital
                    </h3>

                    <p class="mb-0"
                       style="color:#DDF1F8;line-height:1.8;">
                        Informasi dan inspirasi untuk membantu Anda memahami
                        teknologi, inovasi, dan perkembangan dunia digital.
                    </p>

                    <div class="mt-4"
                         style="height:3px;width:50px;background:#66D5EE;"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= DAFTAR ARTIKEL ================= --}}
<section id="daftar-artikel" class="py-5" style="background:#FFFFFF;">
    <div class="container py-lg-3">

        {{-- JUDUL --}}
        <div class="mb-4">
            <span class="small fw-bold text-uppercase"
                  style="color:#146C94;letter-spacing:2px;">
                <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                Bacaan Terbaru
            </span>

            <h2 class="fw-bold mt-3 mb-2" style="color:#0B2638;">
                Artikel & Informasi
            </h2>

            <p class="mb-0" style="color:#536779;">
                Berbagai informasi menarik untuk menambah wawasan digital.
            </p>
        </div>

        {{-- GRID ARTIKEL --}}
        <div class="row g-4">

            @forelse($artikels as $artikel)
                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 border-0 rounded-3 overflow-hidden"
                         style="background:#FFFFFF;box-shadow:0 5px 22px rgba(11,38,56,.08);transition:transform .25s,box-shadow .25s;"
                         onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 14px 30px rgba(11,38,56,.14)'"
                         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 5px 22px rgba(11,38,56,.08)'">

                        {{-- GAMBAR --}}
                        <div class="position-relative">
                            @if($artikel->gambar)
                                <img src="{{ asset('storage/'.$artikel->gambar) }}"
                                     alt="{{ $artikel->judul }}"
                                     class="w-100"
                                     style="height:210px;object-fit:cover;"
                                     loading="lazy">
                            @else
                                <div class="d-flex align-items-center justify-content-center"
                                     style="height:210px;background:#EAF5FA;color:#146C94;">
                                    <i class="bi bi-file-earmark-text"
                                       style="font-size:60px;"></i>
                                </div>
                            @endif

                            <span class="position-absolute bottom-0 start-0 m-3 badge rounded-2 px-3 py-2"
                                  style="background:#146C94;color:#FFFFFF;">
                                {{ $artikel->kategori ?? 'Informasi' }}
                            </span>
                        </div>

                        {{-- ISI CARD --}}
                        <div class="card-body p-4 d-flex flex-column">

                            <small class="mb-3" style="color:#66869A;">
                                <i class="bi bi-calendar3 me-1"
                                   style="color:#146C94;"></i>

                                {{ $artikel->tanggal
                                    ? \Carbon\Carbon::parse($artikel->tanggal)->locale('id')->translatedFormat('d M Y')
                                    : '-' }}
                            </small>

                            <h5 class="fw-bold mb-3"
                                style="color:#0B2638;line-height:1.5;">
                                {{ $artikel->judul }}
                            </h5>

                            <p class="small mb-4"
                               style="color:#536779;line-height:1.8;">
                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags(
                                        $artikel->isi
                                        ?? $artikel->konten
                                        ?? $artikel->deskripsi
                                        ?? ''
                                    ),
                                    125
                                ) }}
                            </p>

                            <div class="mt-auto pt-3"
                                 style="border-top:1px solid #EAF1F5;">

                                <button type="button"
                                        class="btn p-0 border-0 bg-transparent fw-semibold"
                                        style="color:#146C94;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#artikelModal{{ $artikel->id }}">
                                    Baca Selengkapnya
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- MODAL DETAIL ARTIKEL --}}
                <div class="modal fade"
                     id="artikelModal{{ $artikel->id }}"
                     tabindex="-1"
                     aria-labelledby="judulArtikel{{ $artikel->id }}"
                     aria-hidden="true">

                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content border-0 rounded-3 overflow-hidden"
                             style="box-shadow:0 20px 60px rgba(11,38,56,.2);">

                            <div class="modal-header text-white"
                                 style="background:#0B2638;">

                                <h5 class="modal-title fw-bold"
                                    id="judulModal{{ $artikel->id }}">
                                    <i class="bi bi-journal-richtext me-2"
                                       style="color:#66D5EE;"></i>
                                    Detail Artikel
                                </h5>

                                <button type="button"
                                        class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body p-4 p-md-5">

                                @if($artikel->gambar)
                                    <img src="{{ asset('storage/'.$artikel->gambar) }}"
                                         alt="{{ $artikel->judul }}"
                                         class="w-100 rounded-3 mb-4"
                                         style="max-height:350px;object-fit:cover;"
                                         loading="lazy">
                                @endif

                                <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                                    <span class="badge rounded-2 px-3 py-2"
                                          style="background:#DDF1F8;color:#146C94;">
                                        {{ $artikel->kategori ?? 'Informasi' }}
                                    </span>

                                    <small style="color:#66869A;">
                                        <i class="bi bi-calendar3 me-1"></i>

                                        {{ $artikel->tanggal
                                            ? \Carbon\Carbon::parse($artikel->tanggal)->locale('id')->translatedFormat('d F Y')
                                            : '-' }}
                                    </small>
                                </div>

                                <h2 id="judulArtikel{{ $artikel->id }}"
                                    class="fw-bold mb-4"
                                    style="color:#0B2638;line-height:1.4;">
                                    {{ $artikel->judul }}
                                </h2>

                                <div style="color:#536779;font-size:15px;line-height:1.95;overflow-wrap:anywhere;">
                                    {!! nl2br(e(
                                        $artikel->isi
                                        ?? $artikel->konten
                                        ?? $artikel->deskripsi
                                        ?? 'Isi artikel belum tersedia.'
                                    )) !!}
                                </div>

                            </div>

                            <div class="modal-footer border-0 px-4 pb-4">
                                <button type="button"
                                        class="btn rounded-2 px-4 text-white"
                                        style="background:#0B2638;"
                                        data-bs-dismiss="modal">
                                    Tutup Artikel
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            @empty
                {{-- ARTIKEL KOSONG --}}
                <div class="col-12">
                    <div class="text-center rounded-3 p-5"
                         style="background:#F4F7FA;border:1px solid #D7ECF5;">

                        <i class="bi bi-journal-x display-3"
                           style="color:#146C94;"></i>

                        <h5 class="fw-bold mt-3" style="color:#0B2638;">
                            Belum Ada Artikel
                        </h5>

                        <p class="mb-0" style="color:#536779;">
                            Artikel terbaru akan ditampilkan di halaman ini.
                        </p>
                    </div>
                </div>
            @endforelse

        </div>

        {{-- PAGINATION --}}
        @if(method_exists($artikels, 'links') && $artikels->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $artikels->links() }}
            </div>
        @endif

    </div>
</section>


{{-- ================= TOPIK ARTIKEL ================= --}}
<section class="py-5"
         style="background:linear-gradient(180deg,#EAF5FA,#DDF1F8);">

    <div class="container py-lg-3">

        <div class="mb-4">
            <span class="small fw-bold text-uppercase"
                  style="color:#146C94;letter-spacing:2px;">
                <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                Jelajahi Wawasan
            </span>

            <h2 class="fw-bold mt-3 mb-2" style="color:#0B2638;">
                Topik yang Bisa Anda Pelajari
            </h2>

            <p class="mb-0" style="color:#536779;">
                Mulai pelajari berbagai topik menarik seputar dunia digital.
            </p>
        </div>

        @php
            $topik = [
                ['bi-globe2', 'Website', 'Informasi tentang website dan pengembangannya.'],
                ['bi-phone', 'Aplikasi', 'Mengenal aplikasi dan manfaatnya.'],
                ['bi-code-slash', 'Pemrograman', 'Wawasan seputar coding dan teknologi.'],
                ['bi-shield-check', 'Teknologi', 'Perkembangan teknologi digital.'],
            ];
        @endphp

        <div class="row g-3">
            @foreach($topik as $item)
                <div class="col-6 col-lg-3">

                    <div class="h-100 rounded-3 p-3 p-md-4"
                         style="background:#FFFFFF;border:1px solid #D7ECF5;box-shadow:0 5px 18px rgba(11,38,56,.06);transition:transform .2s;"
                         onmouseover="this.style.transform='translateY(-5px)'"
                         onmouseout="this.style.transform='translateY(0)'">

                        <div class="rounded-3 d-flex align-items-center justify-content-center mb-3"
                             style="width:55px;height:55px;background:#DDF1F8;color:#146C94;">
                            <i class="bi {{ $item[0] }}"
                               style="font-size:27px;"></i>
                        </div>

                        <h6 class="fw-bold" style="color:#0B2638;">
                            {{ $item[1] }}
                        </h6>

                        <p class="small mb-0"
                           style="color:#536779;line-height:1.8;">
                            {{ $item[2] }}
                        </p>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection