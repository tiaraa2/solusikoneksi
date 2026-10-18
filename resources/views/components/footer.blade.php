<footer class="pt-5 text-white border-top border-4"
        style="background:#103B55;border-color:#19A7CE !important;">

    <div class="container-fluid px-4 px-lg-5 pb-4">
        <div class="row g-4">

            {{-- INFORMASI PERUSAHAAN --}}
            <div class="col-lg-4 col-md-6">

                {{-- LOGO BULAT TRANSPARAN --}}
                <div class="d-flex align-items-center gap-3 mb-3">

                    <div class="rounded-circle bg-white bg-opacity-75
                                d-flex align-items-center justify-content-center
                                shadow-sm flex-shrink-0"
                         style="width:75px;height:75px;">

                        <img src="{{ asset('images/logo.png') }}"
                             alt="Logo PT Solusi Koneksi Anda"
                             class="img-fluid rounded-circle"
                             style="width:90%;height:90%;object-fit:contain;">
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1 text-white">
                            PT SOLUSI KONEKSI ANDA
                        </h5>

                        <small class="text-white-50">
                            Solusi Teknologi untuk Masa Depan
                        </small>
                    </div>

                </div>

                <p class="small lh-lg mb-3 text-white-50">
                    Kami menyediakan solusi teknologi dan layanan digital
                    untuk membantu kebutuhan bisnis Anda agar lebih efektif
                    dan berkembang.
                </p>

                {{-- MEDIA SOSIAL --}}
                <div class="d-flex gap-2">

                    <a href="https://www.instagram.com/"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Instagram"
                       class="btn text-white d-flex align-items-center
                              justify-content-center"
                       style="background:#146C94;width:40px;height:40px;">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://www.facebook.com/"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Facebook"
                       class="btn text-white d-flex align-items-center
                              justify-content-center"
                       style="background:#146C94;width:40px;height:40px;">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://www.linkedin.com/"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="LinkedIn"
                       class="btn text-white d-flex align-items-center
                              justify-content-center"
                       style="background:#146C94;width:40px;height:40px;">
                        <i class="bi bi-linkedin"></i>
                    </a>

                </div>
            </div>

            {{-- NAVIGASI --}}
            <div class="col-lg-2 col-md-6">

                <h6 class="fw-bold mb-4 text-white">NAVIGASI</h6>

                <ul class="list-unstyled d-flex flex-column gap-3 mb-0">

                    <li>
                        <a href="{{ route('home') }}"
                           class="text-white-50 text-decoration-none">
                            <i class="bi bi-chevron-right me-2"></i>
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('profil') }}"
                           class="text-white-50 text-decoration-none">
                            <i class="bi bi-chevron-right me-2"></i>
                            Profil Perusahaan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('layanan') }}"
                           class="text-white-50 text-decoration-none">
                            <i class="bi bi-chevron-right me-2"></i>
                            Produk &amp; Layanan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('artikel') }}"
                           class="text-white-50 text-decoration-none">
                            <i class="bi bi-chevron-right me-2"></i>
                            Artikel
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('galeri') }}"
                           class="text-white-50 text-decoration-none">
                            <i class="bi bi-chevron-right me-2"></i>
                            Galeri
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kontak') }}"
                           class="text-white-50 text-decoration-none">
                            <i class="bi bi-chevron-right me-2"></i>
                            Kontak Kami
                        </a>
                    </li>

                </ul>
            </div>

            {{-- KONTAK --}}
            <div class="col-lg-3 col-md-6">

                <h6 class="fw-bold mb-4 text-white">HUBUNGI KAMI</h6>

                <div class="d-flex align-items-start gap-3 mb-3">
                    <i class="bi bi-envelope-fill fs-5 text-info"></i>
                    <a href="mailto:info@solusikoneksi.com"
                       class="text-white-50 text-decoration-none">
                        info@solusikoneksi.com
                    </a>
                </div>

                <div class="d-flex align-items-start gap-3 mb-3">
                    <i class="bi bi-whatsapp fs-5 text-info"></i>
                    <a href="https://wa.me/6281200000000"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="text-white-50 text-decoration-none">
                        0812-0000-0000
                    </a>
                </div>

                <div class="d-flex align-items-start gap-3 mb-4">
                    <i class="bi bi-geo-alt-fill fs-5 text-info"></i>
                    <span class="text-white-50">
                        Jl. Raya Pajajaran No. 88 F,
                        Kota Bogor 16153
                    </span>
                </div>

                <a href="https://wa.me/6281200000000"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn text-white fw-semibold px-4 py-2"
                   style="background:#19A7CE;">

                    <i class="bi bi-chat-dots-fill me-2"></i>
                    Hubungi Sekarang
                </a>

            </div>

            {{-- JAM LAYANAN --}}
            <div class="col-lg-3 col-md-6">

                <h6 class="fw-bold mb-4 text-white">JAM LAYANAN</h6>

                <p class="small mb-2 text-white-50">
                    <i class="bi bi-clock-fill me-2 text-info"></i>
                    Senin – Jumat
                </p>

                <p class="small mb-3 text-white-50">
                    <i class="bi bi-clock me-2 text-info"></i>
                    08.00 – 17.00 WIB
                </p>

                <p class="small lh-lg mb-0 text-white-50">
                    Silakan hubungi kami untuk informasi lebih lanjut
                    mengenai produk dan layanan perusahaan.
                </p>

            </div>

        </div>
    </div>

    {{-- COPYRIGHT --}}
    <div class="py-3 text-center"
         style="background:#0B2B40;border-top:1px solid rgba(255,255,255,.12);">

        <div class="container-fluid px-4 px-lg-5">

            <p class="small mb-0 text-white">
                &copy; {{ date('Y') }} PT Solusi Koneksi Anda.
                All Rights Reserved.
            </p>

        </div>
    </div>

</footer>
