@extends('layouts.app')

@section('content')

<section class="py-5">
    <div class="container">

        <div class="mb-4">
            <span class="small fw-bold"
                  style="color:#FF5722;letter-spacing:2px;">
                DOKUMENTASI KAMI
            </span>

            <h2 class="fw-bold mt-2 mb-2" style="color:#102A43;">
                Jelajahi Semua Galeri
            </h2>

            <p class="text-secondary mb-0">
                Kumpulan dokumentasi dan karya pilihan kami.
            </p>
        </div>

        <div class="row g-4">

            @forelse ($galeris as $galeri)
                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        <img
                            src="{{ asset('storage/' . $galeri->gambar) }}"
                            alt="{{ $galeri->judul }}"
                            class="card-img-top"
                            style="height:230px;object-fit:cover;"
                            loading="lazy"
                        >

                        <div class="card-body p-4">

                            <span class="badge rounded-pill px-3 py-2"
                                  style="background:#DDF3F3;color:#087F8C;">
                                {{ $galeri->kategori ?: 'Dokumentasi' }}
                            </span>

                            <h5 class="fw-bold mt-3 mb-2"
                                style="color:#102A43;">
                                {{ $galeri->judul }}
                            </h5>

                            @if ($galeri->tanggal)
                                <p class="text-secondary small mb-0">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($galeri->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                </p>
                            @endif

                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-images fs-1 text-secondary"></i>
                    <h5 class="mt-3" style="color:#102A43;">
                        Belum Ada Galeri
                    </h5>
                    <p class="text-secondary mb-0">
                        Dokumentasi yang ditambahkan admin akan muncul di sini.
                    </p>
                </div>
            @endforelse

        </div>

        <div class="text-center mt-5">
            <a href="{{ route('galeri') }}"
               class="btn rounded-pill px-4 py-3 text-white"
               style="background:#FF5722;">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali ke Halaman Galeri
            </a>
        </div>

    </div>
</section>

@endsection