<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    private function defaultKonten(): array
    {
        return [
            'hero_deskripsi' => 'PT Solusi Koneksi Anda hadir sebagai mitra teknologi informasi yang menyediakan solusi digital inovatif, efektif, dan sesuai dengan kebutuhan pelanggan.',
            'hero_judul' => 'Mitra Digital Anda',
            'hero_keterangan' => 'Menghadirkan teknologi dan layanan digital untuk mendukung kebutuhan serta perkembangan bisnis.',
            'gambar' => 'images/perusahaan.jpg',

            'tentang_judul' => 'Menghadirkan Teknologi yang Lebih Bermakna.',
            'tentang_paragraf_1' => 'Berfokus pada solusi teknologi informasi dan layanan digital untuk membantu kebutuhan pelanggan.',
            'tentang_paragraf_2' => 'Kami mengutamakan inovasi, kualitas, dan kolaborasi untuk menghadirkan solusi yang efektif serta memberikan nilai guna bagi perkembangan bisnis dan kebutuhan digital.',
            'tentang_komitmen' => 'Berkomitmen memberikan solusi yang relevan, terpercaya, dan berorientasi pada pelanggan.',

            'visi_judul' => 'Menjadi Mitra Teknologi Terpercaya',
            'visi_deskripsi' => 'Menjadi perusahaan teknologi informasi yang inovatif dan terpercaya dalam menghadirkan solusi digital untuk memenuhi kebutuhan pelanggan.',

            'misi' => [
                [
                    'ikon' => 'bi-lightbulb',
                    'judul' => 'Mengembangkan Inovasi',
                    'deskripsi' => 'Menghadirkan solusi digital sesuai kebutuhan pelanggan.',
                ],
                [
                    'ikon' => 'bi-award',
                    'judul' => 'Menjaga Kualitas',
                    'deskripsi' => 'Mengutamakan kualitas dan efektivitas dalam setiap layanan.',
                ],
                [
                    'ikon' => 'bi-people',
                    'judul' => 'Membangun Kepercayaan',
                    'deskripsi' => 'Menjalin hubungan baik melalui komunikasi dan tanggung jawab.',
                ],
            ],

            'nilai_judul' => 'Prinsip yang Menjadi Pegangan',
            'nilai_keterangan' => 'Nilai yang mendasari cara kami bekerja dan melayani pelanggan.',

            'nilai' => [
                [
                    'ikon' => 'bi-lightning-charge',
                    'judul' => 'Inovatif',
                    'deskripsi' => 'Terus mencari ide dan pendekatan baru.',
                ],
                [
                    'ikon' => 'bi-shield-check',
                    'judul' => 'Terpercaya',
                    'deskripsi' => 'Menjaga tanggung jawab dan kepercayaan.',
                ],
                [
                    'ikon' => 'bi-gem',
                    'judul' => 'Berkualitas',
                    'deskripsi' => 'Mengutamakan hasil dan layanan terbaik.',
                ],
                [
                    'ikon' => 'bi-diagram-3',
                    'judul' => 'Kolaboratif',
                    'deskripsi' => 'Membangun kerja sama yang positif.',
                ],
            ],
        ];
    }

    private function getProfil(): CompanyProfile
    {
        $profil = CompanyProfile::first();

        if (!$profil) {
            $profil = CompanyProfile::create([
                'nama_perusahaan' => 'PT Solusi Koneksi Anda',
                'bidang_usaha' => 'Teknologi Informasi',
                'deskripsi' => 'Solusi teknologi informasi dan layanan digital.',
            ]);
        }

        return $profil;
    }

    public function index()
    {
        $profil = $this->getProfil();

        $kontenTersimpan = is_array($profil->konten)
            ? $profil->konten
            : [];

        $konten = array_replace_recursive(
            $this->defaultKonten(),
            $kontenTersimpan
        );

        return view('admin.profil', compact('profil', 'konten'));
    }

    public function update(Request $request)
    {
        $profil = $this->getProfil();

        $kontenLama = array_replace_recursive(
            $this->defaultKonten(),
            is_array($profil->konten) ? $profil->konten : []
        );

        $data = $request->validate([
            // Data perusahaan tidak harus dikirim oleh form edit konten.
            'nama_perusahaan' => 'sometimes|required|string|max:255',
            'bidang_usaha' => 'sometimes|nullable|string|max:255',
            'deskripsi' => 'sometimes|nullable|string',
            'alamat' => 'sometimes|nullable|string',
            'email' => 'sometimes|nullable|email|max:255',
            'telepon' => 'sometimes|nullable|string|max:30',

            // Tentang perusahaan.
            'konten.tentang_judul' => 'required|string|max:255',
            'konten.tentang_paragraf_1' => 'required|string',
            'konten.tentang_paragraf_2' => 'required|string',
            'konten.tentang_komitmen' => 'required|string',

            // Visi.
            'konten.visi_judul' => 'required|string|max:255',
            'konten.visi_deskripsi' => 'required|string',

            // Misi.
            'konten.misi' => 'required|array|size:3',
            'konten.misi.*.ikon' => 'required|string|max:100',
            'konten.misi.*.judul' => 'required|string|max:255',
            'konten.misi.*.deskripsi' => 'required|string',

            // Nilai perusahaan.
            'konten.nilai_judul' => 'required|string|max:255',
            'konten.nilai_keterangan' => 'required|string',
            'konten.nilai' => 'required|array|size:4',
            'konten.nilai.*.ikon' => 'required|string|max:100',
            'konten.nilai.*.judul' => 'required|string|max:255',
            'konten.nilai.*.deskripsi' => 'required|string',
        ]);

        // Pertahankan hero, gambar, dan konten lain yang tidak diedit.
        $kontenBaru = array_replace_recursive(
            $kontenLama,
            $data['konten']
        );

        // Pertahankan data perusahaan yang tidak dikirim form.
        $profil->fill([
            'nama_perusahaan' => $data['nama_perusahaan']
                ?? $profil->nama_perusahaan,

            'bidang_usaha' => array_key_exists('bidang_usaha', $data)
                ? $data['bidang_usaha']
                : $profil->bidang_usaha,

            'deskripsi' => array_key_exists('deskripsi', $data)
                ? $data['deskripsi']
                : $profil->deskripsi,

            'alamat' => array_key_exists('alamat', $data)
                ? $data['alamat']
                : $profil->alamat,

            'email' => array_key_exists('email', $data)
                ? $data['email']
                : $profil->email,

            'telepon' => array_key_exists('telepon', $data)
                ? $data['telepon']
                : $profil->telepon,

            'konten' => $kontenBaru,
        ])->save();

        return redirect()
            ->route('admin.profil')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}