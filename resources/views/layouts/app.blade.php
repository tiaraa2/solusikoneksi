<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Home') - PT Solusi Koneksi Anda</title>

    {{-- Bootstrap 5.3.8 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        :root {
            --navy: #0B2638;
            --blue: #146C94;
            --cyan: #19A7CE;
            --cyan-light: #66D5EE;
            --blue-light: #DDF1F8;
            --text-muted: #52636D;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: var(--text-muted);
            background: #fff;
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--navy);
        }

        section {
            scroll-margin-top: 80px;
        }

        /* Warna utama */
        .bg-ska {
            background: var(--navy);
        }

        .warna-ska {
            color: var(--blue);
        }

        /* Navbar */
        .navbar .nav-link {
            color: #fff;
            padding: 12px;
            transition: .2s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--cyan-light);
        }

        /* Hero */
        .hero,
        .hero-section {
            background: linear-gradient(120deg, var(--navy), var(--blue));
            color: #fff;
            padding: 70px 0;
        }

        .hero h1,
        .hero-section h1 {
            color: #fff;
            font-size: clamp(28px, 3vw, 40px);
            font-weight: 700;
            line-height: 1.2;
        }

        .hero p,
        .hero-section p {
            line-height: 1.8;
        }

        .hero-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 16px;
        }

        /* Judul section */
        .section-title {
            color: var(--navy);
            font-weight: 700;
        }

        .section-label {
            color: var(--blue);
            font-weight: 700;
            letter-spacing: .5px;
        }

        .section-line {
            width: 65px;
            height: 3px;
            background: var(--cyan);
            margin: 12px auto 30px;
        }

        /* Tombol */
        .btn-ska {
            background: var(--blue);
            color: #fff;
            border: 1px solid var(--blue);
        }

        .btn-ska:hover {
            background: var(--navy);
            border-color: var(--navy);
            color: #fff;
        }

        .btn-primary {
            --bs-btn-bg: var(--blue);
            --bs-btn-border-color: var(--blue);
            --bs-btn-hover-bg: var(--navy);
            --bs-btn-hover-border-color: var(--navy);
        }

        .btn-info {
            --bs-btn-bg: var(--cyan);
            --bs-btn-border-color: var(--cyan);
            --bs-btn-hover-bg: var(--blue);
            --bs-btn-hover-border-color: var(--blue);
            --bs-btn-color: #fff;
            --bs-btn-hover-color: #fff;
        }

        .btn-outline-primary {
            --bs-btn-color: var(--blue);
            --bs-btn-border-color: var(--blue);
            --bs-btn-hover-bg: var(--blue);
            --bs-btn-hover-border-color: var(--blue);
            --bs-btn-hover-color: #fff;
        }

        /* Semua card */
        .service-card,
        .custom-card,
        section .card {
            height: 100%;
            border: 1px solid var(--blue-light);
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 14px rgba(11, 38, 56, .06);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .service-card:hover,
        .custom-card:hover,
        section .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(11, 38, 56, .12);
        }

        .service-card h5,
        .custom-card h5,
        .custom-card h6,
        section .card h5,
        section .card h6 {
            color: var(--navy);
            font-weight: 700;
        }

        .service-card p,
        .custom-card p,
        section .card p {
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* Ikon */
        .service-icon {
            color: var(--blue);
            font-size: 35px;
        }

        .icon-box {
            display: inline-flex;
            width: 48px;
            height: 48px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: var(--blue-light);
            color: var(--blue);
        }

        /* Gambar card */
        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Card layanan bergambar */
        .service-image {
            position: relative;
            height: 270px;
            overflow: hidden;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s ease;
        }

        .service-card:hover .service-image img,
        .custom-card:hover .service-image img {
            transform: scale(1.03);
        }

        .service-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 16px;
            color: #fff;
            background: linear-gradient(
                0deg,
                rgba(6, 20, 31, .96),
                transparent 95%
            );
        }

        .service-overlay h5 {
            color: #fff;
        }

        .service-overlay p {
            color: #e7edf1;
        }

        /* Link */
        .custom-link {
            color: var(--blue);
            font-weight: 600;
            text-decoration: none;
        }

        .custom-link:hover {
            color: var(--cyan);
        }

        /* Modal */
        .modal-content {
            overflow: hidden;
            border: 1px solid var(--blue-light);
            border-radius: 16px;
        }

        .modal-header {
            background: var(--navy);
            color: #fff;
        }

        .modal-header .modal-title {
            color: #fff;
        }

        /* CTA */
        .cta-box {
            border-radius: 18px;
            background: linear-gradient(120deg, var(--navy), var(--blue));
        }

        /* Footer */
        footer {
            background: var(--navy);
            color: #fff;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            color: var(--cyan-light);
        }

        /* Responsif */
        @media (max-width: 991.98px) {
            .hero-image {
                height: 280px;
            }
        }

        @media (max-width: 767.98px) {
            .hero,
            .hero-section {
                padding: 45px 0;
            }

            .hero-image {
                height: 260px;
            }

            .service-image {
                height: 250px;
            }
        }

        @media (max-width: 575.98px) {
            .hero-image {
                height: 230px;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
