<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | PT Solusi Koneksi Anda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-white overflow-hidden">

<div class="container-fluid p-0">
    <div class="row g-0 vh-100 overflow-hidden">

        {{-- BAGIAN KIRI: FOTO --}}
        <div class="col-md-6 position-relative overflow-hidden"
             style="height:100vh;">

            <img src="{{ asset('images/login-bg.jpg') }}"
                 alt="Foto perusahaan"
                 class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">

            <div class="position-absolute bottom-0 start-0 w-100 p-4 p-lg-5 text-white"
                 style="background:linear-gradient(transparent,rgba(9,29,49,.9));">

                <span class="small fw-semibold text-uppercase">
                    Technology & Innovation
                </span>

                <h1 class="fw-bold mt-3 mb-3">
                    Hubungkan Ide,<br>
                    Wujudkan Solusi.
                </h1>

                <p class="mb-0">
                    Membangun solusi digital yang inovatif untuk
                    mendukung kebutuhan teknologi Anda.
                </p>
            </div>
        </div>

        {{-- BAGIAN KANAN: LOGIN --}}
        <div class="col-md-6 d-flex flex-column bg-white"
             style="height:100vh;">

            <div class="flex-grow-1 d-flex align-items-center justify-content-center p-3">

                <div class="w-100" style="max-width:340px;">

                    {{-- JUDUL --}}
                    <div class="text-center mb-3">

                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-3 mb-2"
                             style="background:#E5F6F7;">

                            <i class="bi bi-shield-lock fs-3"
                               style="color:#087F8C;"></i>
                        </div>

                        <h2 class="fw-bold mb-1" style="color:#102A43;">
                            Selamat Datang!
                        </h2>

                        <p class="text-secondary small mb-0">
                            Masuk ke akun administrator Anda.
                        </p>
                    </div>

                    {{-- PESAN ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger small py-2 mb-3">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- PESAN BERHASIL --}}
                    @if (session('status'))
                        <div class="alert alert-success small py-2 mb-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- FORM LOGIN --}}
                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email"
                                   class="form-label small fw-semibold mb-1">
                                Alamat Email
                            </label>

                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="form-control py-2"
                                   placeholder="nama@email.com"
                                   value="{{ old('email') }}"
                                   autocomplete="username"
                                   required
                                   autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password"
                                   class="form-label small fw-semibold mb-1">
                                Password
                            </label>

                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control py-2"
                                   placeholder="Masukkan password"
                                   autocomplete="current-password"
                                   required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox"
                                   name="remember"
                                   value="1"
                                   id="remember"
                                   class="form-check-input">

                            <label for="remember"
                                   class="form-check-label small text-secondary">
                                Ingat saya
                            </label>
                        </div>

                        {{-- TOMBOL LOGIN --}}
                        <button type="submit"
                                class="btn w-100 text-white fw-semibold py-2"
                                style="background:#102A43;">
                            Masuk ke Dashboard
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>

                        {{-- KEMBALI KE WEBSITE --}}
                        <a href="{{ url('home') }}"
                           class="btn btn-outline-secondary w-100 mt-2 py-2">
                            <i class="bi bi-arrow-left me-2"></i>
                            Kembali ke Website
                        </a>
                    </form>

                    <p class="text-center text-secondary small mt-3 mb-0">
                        Akses khusus administrator
                    </p>

                </div>
            </div>

            {{-- FOOTER --}}
            <div class="text-center border-top py-2">
                <small class="text-secondary">
                    &copy; {{ date('Y') }} PT Solusi Koneksi Anda
                </small>
            </div>

        </div>
    </div>
</div>

</body>
</html>