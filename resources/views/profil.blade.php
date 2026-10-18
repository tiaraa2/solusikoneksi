@extends('layouts.app')

@section('content')

{{-- ================= HERO PROFIL ================= --}}
<section class="py-4" style="background:linear-gradient(110deg,#EAF5FA,#FFFFFF);overflow:hidden;">
    <div class="container py-3">
        <div class="row align-items-center g-4">

            <div class="col-lg-7">
                <span class="small fw-bold text-uppercase"
                      style="color:#146C94;letter-spacing:2px;">
                    <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                    Profil Perusahaan
                </span>

                <h1 class="fw-bold mt-3"
                    style="color:#0B2638;font-size:clamp(30px,4vw,44px);line-height:1.25;">
                    Mengenal Lebih Dekat
                    <span style="color:#146C94;">PT Solusi Koneksi Anda.</span>
                </h1>

                <p class="mt-3 mb-4"
                   style="color:#536779;line-height:1.8;max-width:540px;">
                    Kami hadir sebagai mitra teknologi informasi yang menyediakan
                    solusi digital inovatif untuk membantu memenuhi kebutuhan
                    pelanggan dan mendukung perkembangan bisnis.
                </p>

                <a href="#tentang-kami"
                   class="btn rounded-2 px-4 py-2 text-white fw-semibold"
                   style="background:#0B2638;">
                    Kenali Perusahaan <i class="bi bi-arrow-down ms-2"></i>
                </a>
            </div>

            <div class="col-lg-5">
                <div class="rounded-3 p-4 p-lg-5 text-white"
                     style="background:linear-gradient(135deg,#0B2638,#146C94);border-left:4px solid #19A7CE;">

                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-4"
                         style="width:60px;height:60px;background:rgba(102,213,238,.15);">
                        <i class="bi bi-buildings"
                           style="font-size:32px;color:#66D5EE;"></i>
                    </div>

                    <h3 class="fw-bold mb-3" style="color:#FFFFFF;">
                        Mitra Digital Anda
                    </h3>

                    <p class="mb-0"
                       style="color:#DDF1F8;line-height:1.8;">
                        Menghadirkan teknologi dan layanan digital yang
                        inovatif, berkualitas, dan sesuai dengan kebutuhan
                        pelanggan.
                    </p>

                    <div class="mt-4"
                         style="height:3px;width:50px;background:#66D5EE;"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- TENTANG PERUSAHAAN --}}
<section id="tentang-kami" class="py-5" style="background:#FFFFFF;">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="position-relative">
                    <img src="{{ asset($konten['gambar'] ?: 'images/perusahaan.jpg') }}"
                         alt="Tentang perusahaan"
                         class="w-100 rounded-3"
                         style="height:340px;object-fit:cover;border:1px solid #E1E8EF;"
                         onerror="this.onerror=null;this.src='{{ asset('images/logo.png') }}';">

                    <div class="position-absolute bottom-0 end-0 m-3 p-3 rounded-3 text-white"
                         style="background:linear-gradient(135deg,#0B2638,#146C94);">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                 style="width:45px;height:45px;background:#146C94;">
                                <i class="bi bi-lightbulb fs-4" style="color:#66D5EE;"></i>
                            </div>

                            <div>
                                <div class="fw-bold">Digital Innovation</div>
                                <small style="color:#DDF1F8;">Ide menjadi solusi nyata</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <span class="small fw-bold text-uppercase"
                      style="color:#146C94;letter-spacing:2px;">
                    <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                    Tentang Perusahaan
                </span>

                <h2 class="fw-bold mt-3 mb-4"
                    style="color:#0B2638;line-height:1.3;font-size:clamp(26px,3vw,36px);">
                    {{ $konten['tentang_judul'] }}
                </h2>

                <p style="color:#536779;line-height:1.9;">
                    <strong style="color:#146C94;">
                        {{ $profil->nama_perusahaan ?? 'PT Solusi Koneksi Anda' }}
                    </strong>
                    {{ $konten['tentang_paragraf_1'] }}
                </p>

                <p style="color:#536779;line-height:1.9;">
                    {{ $konten['tentang_paragraf_2'] }}
                </p>

                <div class="d-flex gap-3 align-items-center mt-4 p-3 rounded-3"
                     style="background:#F0F7FA;border-left:4px solid #19A7CE;">
                    <i class="bi bi-check-circle-fill fs-4" style="color:#146C94;"></i>

                    <p class="mb-0 fw-semibold"
                       style="color:#0B2638;line-height:1.8;">
                        {{ $konten['tentang_komitmen'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VISI DAN MISI --}}
<section class="py-5" style="background:#F1F7FA;">
    <div class="container py-lg-3">
        <div class="mb-4">
            <span class="small fw-bold text-uppercase"
                  style="color:#146C94;letter-spacing:2px;">
                <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                Arah dan Tujuan
            </span>

            <h2 class="fw-bold mt-2 mb-2"
                style="color:#0B2638;font-size:clamp(26px,3vw,34px);">
                Visi & Misi Perusahaan
            </h2>

            <p class="mb-0" style="color:#536779;">
                Landasan dalam menjalankan dan mengembangkan perusahaan.
            </p>
        </div>

        <div class="row g-3 align-items-stretch">

            {{-- VISI --}}
            <div class="col-lg-5">
                <div class="h-100 p-4 rounded-3 text-white"
                     style="background:linear-gradient(135deg,#0B2638,#123F59);border-left:4px solid #19A7CE;">

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle"
                             style="width:48px;height:48px;background:#146C94;">
                            <i class="bi bi-eye fs-3" style="color:#66D5EE;"></i>
                        </div>

                        <h5 class="fw-bold mb-0" style="color:#FFFFFF;">
                            Visi Kami
                        </h5>
                    </div>

                    <h5 class="fw-bold mb-3" style="color:#FFFFFF;">
                        {{ $konten['visi_judul'] }}
                    </h5>

                    <p class="mb-0"
                       style="color:#DDF1F8;line-height:1.8;">
                        {{ $konten['visi_deskripsi'] }}
                    </p>

                    <div class="mt-4"
                         style="height:3px;width:45px;background:#66D5EE;"></div>
                </div>
            </div>

            {{-- MISI --}}
            <div class="col-lg-7">
                <div class="h-100 p-4 rounded-3"
                     style="background:#FFFFFF;border:1px solid #DCE8EF;">

                    <h5 class="fw-bold mb-3" style="color:#146C94;">
                        <i class="bi bi-list-check me-2"></i>Misi Kami
                    </h5>

                    @foreach($konten['misi'] as $misi)
                        <div class="d-flex gap-3 align-items-start mt-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                 style="width:42px;height:42px;flex-shrink:0;background:#E5F2F8;color:#146C94;">
                                <i class="bi {{ $misi['ikon'] }} fs-5"></i>
                            </div>

                            <div>
                                <h6 class="fw-bold mb-1" style="color:#0B2638;">
                                    {{ $misi['judul'] }}
                                </h6>

                                <p class="small mb-0"
                                   style="color:#536779;line-height:1.7;">
                                    {{ $misi['deskripsi'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- NILAI PERUSAHAAN --}}
<section class="py-5" style="background:#FFFFFF;">
    <div class="container py-lg-4">
        <div class="row align-items-end g-3 mb-4">
            <div class="col-lg-8">
                <span class="small fw-bold text-uppercase"
                      style="color:#146C94;letter-spacing:2px;">
                    <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                    Nilai Perusahaan
                </span>

                <h2 class="fw-bold mt-2 mb-2"
                    style="color:#0B2638;font-size:clamp(26px,3vw,34px);">
                    {{ $konten['nilai_judul'] }}
                </h2>

                <p class="mb-0" style="color:#536779;">
                    Nilai-nilai yang menjadi pedoman dalam setiap langkah kami.
                </p>
            </div>

            <div class="col-lg-4">
                <p class="mb-0" style="color:#536779;line-height:1.8;">
                    {{ $konten['nilai_keterangan'] }}
                </p>
            </div>
        </div>

        <div class="row g-3">
            @foreach($konten['nilai'] as $nilai)
                <div class="col-6 col-lg-3">
                    <div class="h-100 p-3 p-lg-4 rounded-3"
                         style="background:#FFFFFF;border:1px solid #DCE8EF;transition:transform .2s,box-shadow .2s;"
                         onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 20px rgba(11,38,56,.08)'"
                         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">

                        <div class="d-flex align-items-center justify-content-center rounded-circle mb-3"
                             style="width:46px;height:46px;background:#E5F2F8;color:#146C94;">
                            <i class="bi {{ $nilai['ikon'] }} fs-4"></i>
                        </div>

                        <h6 class="fw-bold mb-2" style="color:#0B2638;">
                            {{ $nilai['judul'] }}
                        </h6>

                        <p class="small mb-0"
                           style="color:#536779;line-height:1.8;">
                            {{ $nilai['deskripsi'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
