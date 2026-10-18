@extends('layouts.app')

@section('content')

{{-- ================= HERO KONTAK ================= --}}
<section class="py-4" style="background:linear-gradient(110deg,#EAF5FA,#FFFFFF);overflow:hidden;">
    <div class="container py-3">
        <div class="row align-items-center g-4">

            {{-- KONTEN KIRI --}}
            <div class="col-lg-7">
                <span class="small fw-bold text-uppercase"
                      style="color:#146C94;letter-spacing:2px;">
                    <span style="display:inline-block;width:25px;height:2px;background:#146C94;vertical-align:middle;margin-right:8px;"></span>
                    Kontak Kami
                </span>

                <h1 class="fw-bold mt-3"
                    style="color:#0B2638;font-size:clamp(30px,4vw,44px);line-height:1.25;">
                    Mari Bangun
                    <span style="color:#146C94;">Kerja Sama.</span>
                </h1>

                <p class="mt-3 mb-4"
                   style="color:#536779;line-height:1.8;max-width:540px;">
                    Punya pertanyaan atau ingin menggunakan layanan kami?
                    Hubungi PT Solusi Koneksi Anda untuk berdiskusi dan
                    menemukan solusi teknologi yang sesuai dengan kebutuhan Anda.
                </p>

                <a href="#form-kontak"
                   class="btn rounded-2 px-4 py-2 text-white fw-semibold"
                   style="background:#0B2638;">
                    Kirim Pesan
                    <i class="bi bi-arrow-down ms-2"></i>
                </a>
            </div>

            {{-- CARD KANAN --}}
            <div class="col-lg-5">
                <div class="rounded-3 p-4 p-lg-5 text-white"
                     style="min-height:340px;background:linear-gradient(135deg,#0B2638,#146C94);border-left:4px solid #19A7CE;">

                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-4"
                         style="width:60px;height:60px;background:rgba(102,213,238,.15);">
                        <i class="bi bi-chat-dots"
                           style="font-size:32px;color:#66D5EE;"></i>
                    </div>

                    <h3 class="fw-bold mb-3" style="color:#FFFFFF;">
                        Kami Siap Membantu
                    </h3>

                    <p class="mb-0"
                       style="color:#DDF1F8;line-height:1.8;">
                        Sampaikan pertanyaan, kebutuhan, atau ide Anda.
                        Kami siap mendengarkan dan membantu menemukan
                        solusi yang tepat.
                    </p>

                    <div class="mt-4"
                         style="height:3px;width:50px;background:#66D5EE;"></div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ================= HALAMAN KONTAK ================= --}}
<section class="py-5" style="background:#FFFFFF;">
    <div class="container">

        {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show small rounded-3" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger small rounded-3">
                @foreach ($errors->all() as $error)
                    <div><i class="bi bi-exclamation-circle me-2"></i>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- JUDUL --}}
        <div class="text-center mb-5">
            <span class="small fw-bold text-uppercase"
                  style="color:#146C94;letter-spacing:2px;">
                HUBUNGI KAMI
            </span>

            <h2 class="fw-bold mt-2 mb-3"
                style="color:#0B2638;">
                Mari Bekerja Sama
            </h2>

            <p class="text-secondary mb-0 mx-auto"
               style="max-width:600px;line-height:1.8;">
                Kami terbuka untuk pertanyaan, konsultasi, dan peluang kerja sama.
                Silakan hubungi kami melalui informasi atau formulir berikut.
            </p>
        </div>

        <div class="row g-4 align-items-stretch">

            {{-- KOLOM KIRI: INFORMASI DAN MAPS --}}
            <div class="col-lg-5">

                <div class="rounded-4 p-4 h-100"
                     style="border:1px solid #DDF1F8;background:#FFFFFF;">

                    <h5 class="fw-bold mb-4" style="color:#0B2638;">
                        <i class="bi bi-info-circle me-2"
                           style="color:#146C94;"></i>
                        Informasi Kontak
                    </h5>

                    {{-- ALAMAT --}}
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:42px;height:42px;background:#EAF5FA;">
                            <i class="bi bi-geo-alt-fill"
                               style="color:#146C94;font-size:18px;"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold mb-1" style="color:#0B2638;">
                                Alamat
                            </h6>
                            <p class="small text-secondary mb-0" style="line-height:1.7;">
                                Jl. Raya Pajajaran No. 88 F,
                                Kota Bogor 16153
                            </p>
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:42px;height:42px;background:#EAF5FA;">
                            <i class="bi bi-envelope-fill"
                               style="color:#146C94;font-size:18px;"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold mb-1" style="color:#0B2638;">
                                Email
                            </h6>
                            <p class="small text-secondary mb-0">
                                solusikoneksianda@gmail.com
                            </p>
                        </div>
                    </div>

                    {{-- TELEPON --}}
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:42px;height:42px;background:#EAF5FA;">
                            <i class="bi bi-telephone-fill"
                               style="color:#146C94;font-size:18px;"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold mb-1" style="color:#0B2638;">
                                Telepon / WhatsApp
                            </h6>
                            <p class="small text-secondary mb-0">
                                0812-0000-0000
                            </p>
                        </div>
                    </div>

                    {{-- JAM OPERASIONAL --}}
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:42px;height:42px;background:#EAF5FA;">
                            <i class="bi bi-clock-fill"
                               style="color:#146C94;font-size:18px;"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold mb-1" style="color:#0B2638;">
                                Jam Operasional
                            </h6>
                            <p class="small text-secondary mb-0">
                                Senin - Jumat: 08.00 - 17.00
                            </p>
                        </div>
                    </div>

                    {{-- GOOGLE MAPS --}}
                    <div class="mt-4">
                        <h6 class="fw-bold mb-3" style="color:#0B2638;">
                            <i class="bi bi-map me-2" style="color:#146C94;"></i>
                            Lokasi Kami
                        </h6>

                        <div class="rounded-3 overflow-hidden"
                             style="height:210px;border:1px solid #DDF1F8;">
                            <iframe
                                src="https://maps.google.com/maps?q=Jl.%20Raya%20Pajajaran%20No.%2088%20F%20Kota%20Bogor%2016153&z=16&output=embed"
                                width="100%"
                                height="100%"
                                style="border:0;display:block;"
                                allowfullscreen
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Lokasi PT Solusi Koneksi Anda">
                            </iframe>
                        </div>

                        <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Raya+Pajajaran+No.+88+F+Kota+Bogor+16153"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="small text-decoration-none fw-semibold d-inline-block mt-3"
                           style="color:#146C94;">
                            Buka Google Maps
                            <i class="bi bi-arrow-up-right ms-1"></i>
                        </a>
                    </div>

                </div>
            </div>


            {{-- KOLOM KANAN: FORM PESAN --}}
            <div class="col-lg-7" id="form-kontak">

                <div class="rounded-4 p-4 p-lg-5 h-100"
                     style="border:1px solid #DDF1F8;background:#FFFFFF;">

                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-3"
                         style="width:48px;height:48px;background:#EAF5FA;">
                        <i class="bi bi-chat-square-text-fill"
                           style="font-size:22px;color:#146C94;"></i>
                    </div>

                    <h4 class="fw-bold mb-2" style="color:#0B2638;">
                        Kirim Pesan
                    </h4>

                    <p class="text-secondary small mb-4" style="line-height:1.7;">
                        Isi formulir di bawah ini. Pastikan informasi yang
                        dimasukkan sudah benar sebelum mengirim pesan.
                    </p>

                    <form action="{{ route('kontak.kirim') }}" method="POST">
                        @csrf

                        {{-- NAMA DAN EMAIL --}}
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">
                                <label for="nama"
                                       class="form-label fw-semibold small"
                                       style="color:#0B2638;">
                                    Nama Lengkap
                                </label>

                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    class="form-control rounded-3 py-2"
                                    placeholder="Masukkan nama Anda"
                                    value="{{ old('nama') }}"
                                    maxlength="255"
                                    autocomplete="name"
                                    required
                                    style="border-color:#D5E5ED;">
                            </div>

                            <div class="col-md-6">
                                <label for="email"
                                       class="form-label fw-semibold small"
                                       style="color:#0B2638;">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control rounded-3 py-2"
                                    placeholder="nama@email.com"
                                    value="{{ old('email') }}"
                                    maxlength="255"
                                    autocomplete="email"
                                    required
                                    style="border-color:#D5E5ED;">
                            </div>

                        </div>

                        {{-- PESAN --}}
                        <div class="mb-4">
                            <label for="pesan"
                                   class="form-label fw-semibold small"
                                   style="color:#0B2638;">
                                Pesan Anda
                            </label>

                            <textarea
                                id="pesan"
                                name="pesan"
                                class="form-control rounded-3"
                                rows="7"
                                maxlength="5000"
                                placeholder="Tuliskan pertanyaan atau kebutuhan Anda..."
                                required
                                style="border-color:#D5E5ED;resize:vertical;">{{ old('pesan') }}</textarea>
                        </div>

                        {{-- TOMBOL KIRIM --}}
                        <button type="submit"
                                class="btn w-100 text-white fw-semibold rounded-3 py-2"
                                style="background:#0B2638;border:0;">
                            <i class="bi bi-send-fill me-2"></i>
                            Kirim Pesan
                        </button>

                        <p class="small text-secondary text-center mt-3 mb-0">
                            <i class="bi bi-shield-check me-1" style="color:#146C94;"></i>
                            Pastikan email Anda aktif agar mudah dihubungi.
                        </p>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
