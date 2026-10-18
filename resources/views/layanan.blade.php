@extends('layouts.app')

@section('content')

{{-- ================= HERO PRODUK ================= --}}
<section class="py-4" style="background:linear-gradient(110deg,#EAF5FA,#FFFFFF);overflow:hidden;">
    <div class="container py-3">
        <div class="row align-items-center g-4">

            <div class="col-lg-7">
                <span class="small fw-bold text-uppercase"
                      style="color:#146C94;letter-spacing:2px;">
                    <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                    Produk Digital Kami
                </span>

                <h1 class="fw-bold mt-3"
                    style="color:#0B2638;font-size:clamp(30px,4vw,44px);line-height:1.25;">
                    Solusi Digital untuk
                    <span style="color:#146C94;">Kebutuhan Anda.</span>
                </h1>

                <p class="mt-3 mb-4"
                   style="color:#536779;line-height:1.8;max-width:540px;">
                    Temukan produk digital yang membantu kebutuhan teknologi
                    dan mendukung perkembangan bisnis Anda.
                </p>

                <a href="#daftar-produk"
                   class="btn rounded-2 px-4 py-2 text-white fw-semibold"
                   style="background:#0B2638;">
                    Lihat Produk <i class="bi bi-arrow-down ms-2"></i>
                </a>
            </div>

            <div class="col-lg-5">
                <div class="rounded-3 p-4 p-lg-5 text-white"
                     style="background:linear-gradient(135deg,#0B2638,#146C94);border-left:4px solid #19A7CE;">

                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-4"
                         style="width:60px;height:60px;background:rgba(102,213,238,.15);">
                        <i class="bi bi-box-seam"
                           style="font-size:32px;color:#66D5EE;"></i>
                    </div>

                    <h3 class="fw-bold mb-3" style="color:#FFFFFF;">
                        Solusi dalam Satu Tempat
                    </h3>

                    <p class="mb-0"
                       style="color:#DDF1F8;line-height:1.8;">
                        Produk digital yang dirancang untuk membantu
                        kebutuhan teknologi dan mendukung aktivitas bisnis Anda.
                    </p>

                    <div class="mt-4"
                         style="height:3px;width:50px;background:#66D5EE;"></div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ================= DAFTAR PRODUK ================= --}}
<section id="daftar-produk" class="py-5" style="background:#FFFFFF;">
    <div class="container py-lg-3">

        <div class="mb-4">
            <span class="small fw-bold text-uppercase"
                  style="color:#146C94;letter-spacing:2px;">
                <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                Produk Kami
            </span>

            <h2 class="fw-bold mt-3 mb-2" style="color:#0B2638;">
                Daftar Produk
            </h2>

            <p class="mb-0" style="color:#536779;">
                Temukan produk digital yang sesuai dengan kebutuhan Anda.
            </p>
        </div>

        @if($produks->count())
            <div class="row g-4">

                @foreach($produks as $produk)
                    {{-- 4 CARD SEJAJAR DI DESKTOP --}}
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-0 rounded-3 overflow-hidden"
                             style="background:#FFFFFF;box-shadow:0 5px 22px rgba(11,38,56,.08);transition:transform .25s,box-shadow .25s;"
                             onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 14px 30px rgba(11,38,56,.14)'"
                             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 5px 22px rgba(11,38,56,.08)'">

                            {{-- FOTO PRODUK --}}
                            @if($produk->foto)
                                <img src="{{ asset('storage/'.$produk->foto) }}"
                                     alt="{{ $produk->nama_layanan }}"
                                     class="w-100"
                                     style="height:190px;object-fit:cover;"
                                     loading="lazy">
                            @else
                                <div class="d-flex align-items-center justify-content-center"
                                     style="height:190px;background:#EAF5FA;">
                                    <i class="bi bi-box-seam"
                                       style="font-size:55px;color:#146C94;"></i>
                                </div>
                            @endif

                            {{-- INFORMASI PRODUK --}}
                            <div class="card-body p-3">
                                <span class="badge rounded-2 px-2 py-2"
                                      style="background:#DDF1F8;color:#146C94;font-size:10px;">
                                    <i class="bi bi-grid me-1"></i>
                                    PRODUK DIGITAL
                                </span>

                                <h5 class="fw-bold mt-3 mb-2"
                                    style="color:#0B2638;font-size:16px;">
                                    {{ $produk->nama_layanan }}
                                </h5>

                                <p class="small mb-0"
                                   style="color:#536779;line-height:1.7;">
                                    {{ $produk->deskripsi }}
                                </p>
                            </div>

                            <div class="mx-3 mb-3"
                                 style="height:2px;background:#DDF1F8;"></div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            {{-- PRODUK KOSONG --}}
            <div class="text-center rounded-3 p-5"
                 style="background:#F4F7FA;border:1px solid #D7ECF5;">

                <i class="bi bi-box-seam display-3"
                   style="color:#146C94;"></i>

                <h5 class="fw-bold mt-3" style="color:#0B2638;">
                    Belum Ada Produk
                </h5>

                <p class="mb-0" style="color:#536779;">
                    Produk belum tersedia. Silakan tambahkan data melalui halaman admin.
                </p>
            </div>
        @endif

    </div>
</section>


{{-- ================= TAHAPAN PENGERJAAN ================= --}}
<section id="tahapan" class="py-5"
         style="background:linear-gradient(180deg,#EAF5FA,#DDF1F8);">

    <div class="container py-lg-3">

        <div class="mb-4">
            <span class="small fw-bold text-uppercase"
                  style="color:#146C94;letter-spacing:2px;">
                <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                Alur Kerja
            </span>

            <h2 class="fw-bold mt-3 mb-2" style="color:#0B2638;">
                Tahapan Pengerjaan
            </h2>

            <p class="mb-0" style="color:#536779;">
                Proses kerja terstruktur untuk menghasilkan produk berkualitas.
            </p>
        </div>

        @php
            $tahapan = [
                ['bi-chat-dots', 'Konsultasi', 'Membahas kebutuhan dan tujuan proyek.'],
                ['bi-clipboard-check', 'Perencanaan', 'Menyusun konsep dan rencana pengerjaan.'],
                ['bi-code-slash', 'Pengembangan', 'Membangun produk sesuai kebutuhan.'],
                ['bi-search', 'Pengujian', 'Memeriksa fungsi dan kualitas produk.'],
                ['bi-rocket-takeoff', 'Implementasi', 'Menyiapkan produk agar siap digunakan.'],
                ['bi-headset', 'Pemeliharaan', 'Memberikan dukungan setelah produk digunakan.'],
            ];
        @endphp

        <div class="row g-3">
            @foreach($tahapan as $index => $t)
                <div class="col-6 col-md-4 col-xl-2">
                    <div class="position-relative h-100 rounded-3 p-3"
                         style="background:#FFFFFF;border:1px solid #D7ECF5;box-shadow:0 5px 18px rgba(11,38,56,.06);min-height:185px;transition:transform .2s,box-shadow .2s;"
                         onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 10px 24px rgba(11,38,56,.12)'"
                         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 5px 18px rgba(11,38,56,.06)'">

                        <span class="position-absolute top-0 end-0 m-2 rounded-circle d-flex align-items-center justify-content-center"
                              style="width:27px;height:27px;background:#DDF1F8;color:#146C94;font-size:11px;font-weight:700;">
                            {{ sprintf('%02d', $index + 1) }}
                        </span>

                        <div class="mb-3" style="color:#146C94;">
                            <i class="bi {{ $t[0] }}" style="font-size:30px;"></i>
                        </div>

                        <h6 class="fw-bold mb-2"
                            style="color:#0B2638;font-size:14px;">
                            {{ $t[1] }}
                        </h6>

                        <p class="mb-0"
                           style="color:#536779;font-size:11px;line-height:1.7;">
                            {{ $t[2] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
