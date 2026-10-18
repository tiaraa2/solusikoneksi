<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Layanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-size: 14px;
        }

        .foto-layanan {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .table th {
            white-space: nowrap;
        }
    </style>
</head>

<body class="bg-light">

@include('admin.sidebar')

<main class="container-fluid p-3 p-lg-4"
      style="margin-left:250px; width:calc(100% - 250px);">

    <div class="bg-white rounded-4 shadow-sm border p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h4 class="fw-bold mb-1">
                    <i class="bi bi-grid-1x2-fill text-info me-2"></i>
                    Data Layanan
                </h4>
                <p class="text-secondary mb-0 small">
                    Kelola layanan yang tersedia di perusahaan.
                </p>
            </div>

            <a href="{{ route('admin.layanan.create') }}"
               class="btn btn-info">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Layanan
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No.</th>
                            <th>Foto</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($services as $layanan)
                            <tr>
                                <td class="ps-4">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    @if($layanan->foto)
                                        <img
                                            src="{{ asset('storage/' . $layanan->foto) }}"
                                            alt="{{ $layanan->nama_layanan }}"
                                            class="foto-layanan">
                                    @else
                                        <span class="text-secondary small">
                                            Belum ada foto
                                        </span>
                                    @endif
                                </td>

                                <td class="fw-semibold">
                                    {{ $layanan->nama_layanan }}
                                </td>

                                <td>
                                    {{ \Illuminate\Support\Str::limit($layanan->deskripsi, 70) }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('admin.layanan.edit', $layanan) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.layanan.destroy', $layanan) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-outline-danger"
                                                    type="submit"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-secondary"></i>
                                    <p class="text-secondary mt-2 mb-3">
                                        Belum ada data layanan.
                                    </p>
                                    <a href="{{ route('admin.layanan.create') }}"
                                       class="btn btn-sm btn-info">
                                        <i class="bi bi-plus-lg me-1"></i>
                                        Tambah Layanan
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>