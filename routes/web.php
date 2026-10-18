<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Artikel;
use App\Models\Galeri;

use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\CompanyProfileController as AdminCompanyProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\PesanController;


// ================= HALAMAN PUBLIK =================

// HOME
Route::get('/', function () {
    try {
        $produks = Service::latest()->get();
        $artikels = Artikel::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(6)->get();
    } catch (\Throwable $e) {
        report($e);

        $produks = collect();
        $artikels = collect();
        $galeris = collect();
    }

    return view('home', compact(
        'produks',
        'artikels',
        'galeris'
    ));
})->name('home');


// /home menuju halaman utama
Route::get('/home', function () {
    return redirect()->route('home');
});


// ================= PROFIL PUBLIK =================

Route::get('/profil', [CompanyProfileController::class, 'profil'])
    ->name('profil');


// ================= LAYANAN PUBLIK =================

Route::get('/layanan', function () {
    $produks = Service::latest()->get();

    return view('layanan', compact('produks'));
})->name('layanan');


// ================= ARTIKEL PUBLIK =================

Route::get('/artikel', function () {
    $artikels = Artikel::latest()->get();

    return view('artikel', compact('artikels'));
})->name('artikel');


// ================= GALERI PUBLIK =================

Route::get('/galeri', function () {
    $galeris = Galeri::latest()->get();

    return view('galeri', compact('galeris'));
})->name('galeri');

Route::get('/galeri/semua', function () {
    $galeris = Galeri::latest()->get();

    return view('galeri-semua', compact('galeris'));
})->name('galeri.semua');


// ================= KONTAK PUBLIK =================

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak/kirim', [PesanController::class, 'store'])
    ->name('kontak.kirim');


// ================= LOGIN =================

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.process');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ================= ADMIN =================

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        // PROFIL
        Route::get('/profil', [AdminCompanyProfileController::class, 'index'])
            ->name('profil');

        Route::put('/profil', [AdminCompanyProfileController::class, 'update'])
            ->name('profil.update');


        // LAYANAN
        Route::get('/layanan', [ServiceController::class, 'index'])
            ->name('layanan.index');

        Route::get('/layanan-tambah', [ServiceController::class, 'create'])
            ->name('layanan.create');

        Route::post('/layanan-tambah', [ServiceController::class, 'store'])
            ->name('layanan.store');

        Route::get('/layanan/{service}/edit', [ServiceController::class, 'edit'])
            ->name('layanan.edit');

        Route::put('/layanan/{service}', [ServiceController::class, 'update'])
            ->name('layanan.update');

        Route::delete('/layanan/{service}', [ServiceController::class, 'destroy'])
            ->name('layanan.destroy');


        // ARTIKEL
        Route::get('/artikel', [ArtikelController::class, 'index'])
            ->name('artikel');

        Route::get('/artikel/tambah', [ArtikelController::class, 'create'])
            ->name('artikel.create');

        Route::post('/artikel', [ArtikelController::class, 'store'])
            ->name('artikel.store');

        Route::get('/artikel/{artikel}/edit', [ArtikelController::class, 'edit'])
            ->name('artikel.edit');

        Route::put('/artikel/{artikel}', [ArtikelController::class, 'update'])
            ->name('artikel.update');

        Route::delete('/artikel/{artikel}', [ArtikelController::class, 'destroy'])
            ->name('artikel.destroy');


        // GALERI
        Route::resource('galeri', GaleriController::class)
            ->except(['show']);


        // PESAN KONTAK
        Route::get('/kontak', [PesanController::class, 'index'])
            ->name('kontak');

        Route::delete('/kontak/{pesan}', [PesanController::class, 'destroy'])
            ->name('kontak.destroy');
    });
