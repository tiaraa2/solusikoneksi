<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    private function defaultKonten(): array
    {
        return [
            // HERO
            'hero_judul' => 'Mitra Digital Anda',
            'hero_deskripsi' => 'PT Solusi Koneksi Anda hadir sebagai mitra teknologi informasi yang menyediakan solusi digital inovatif, efektif, dan sesuai kebutuhan pelanggan.',
            'hero_keterangan' => 'Menghadirkan teknologi dan layanan digital untuk mendukung perkembangan bisnis.',
            'gambar' => 'images/perusahaan.jpg',

            // TENTANG PERUSAHAAN
            'tentang_judul' => 'Menghadirkan Teknologi yang Lebih Bermakna.',
            'tentang_paragraf_1' => 'PT Solusi Koneksi Anda berfokus pada solusi teknologi informasi dan layanan digital untuk membantu memenuhi kebutuhan pelanggan.',
            'tentang_paragraf_2' => 'Kami menghadirkan layanan yang efektif, inovatif, dan sesuai dengan kebutuhan pengguna.',
            'tentang_komitmen' => 'Kami berkomitmen menghadirkan solusi teknologi inovatif, memberikan layanan berkualitas, dan membantu pelanggan memenuhi kebutuhan digitalnya.',

            // VISI
            'visi_judul' => 'Visi Kami',
            'visi_deskripsi' => 'Menjadi perusahaan teknologi informasi terpercaya yang menghadirkan solusi digital inovatif dan bermanfaat bagi pelanggan.',

            // MISI
            'misi' => [
                [
                    'ikon' => 'bi-lightbulb',
                    'judul' => 'Inovasi Teknologi',
                    'deskripsi' => 'Mengembangkan solusi teknologi yang inovatif dan sesuai kebutuhan pelanggan.',
                ],
                [
                    'ikon' => 'bi-shield-check',
                    'judul' => 'Layanan Berkualitas',
                    'deskripsi' => 'Memberikan layanan teknologi informasi yang berkualitas dan dapat diandalkan.',
                ],
                [
                    'ikon' => 'bi-people',
                    'judul' => 'Kepuasan Pelanggan',
                    'deskripsi' => 'Membangun hubungan baik dan memberikan solusi yang bermanfaat bagi pelanggan.',
                ],
            ],

            // NILAI PERUSAHAAN
            'nilai_judul' => 'Nilai-Nilai Perusahaan',
            'nilai_keterangan' => 'Integritas, inovasi, profesionalisme, dan komitmen terhadap kualitas menjadi pedoman kami dalam memberikan solusi teknologi terbaik bagi pelanggan.',

            'nilai' => [
                [
                    'ikon' => 'bi-shield-check',
                    'judul' => 'Integritas',
                    'deskripsi' => 'Menjunjung tinggi kejujuran, tanggung jawab, dan kepercayaan pelanggan.',
                ],
                [
                    'ikon' => 'bi-lightbulb',
                    'judul' => 'Inovasi',
                    'deskripsi' => 'Mengembangkan solusi digital yang kreatif dan sesuai kebutuhan.',
                ],
                [
                    'ikon' => 'bi-award',
                    'judul' => 'Profesionalisme',
                    'deskripsi' => 'Memberikan layanan dengan standar kerja yang profesional.',
                ],
                [
                    'ikon' => 'bi-people',
                    'judul' => 'Kolaborasi',
                    'deskripsi' => 'Membangun kerja sama yang baik dengan pelanggan dan mitra.',
                ],
            ],

            // KONTAK
            'alamat' => 'Jl. Raya Pajajaran No. 88 F, Kota Bogor 16153',
            'email' => '',
            'telepon' => '',
        ];
    }

    public function profil()
    {
        $profil = CompanyProfile::first();

        // Gunakan konten default sebagai dasar.
        $konten = $this->defaultKonten();

        // Timpa dengan data profil dari database jika tersedia.
        if ($profil) {
            $dataProfil = $profil->toArray();

            foreach ($dataProfil as $key => $value) {
                if (!array_key_exists($key, $konten) || $value === null) {
                    continue;
                }

                // Pastikan misi dan nilai tetap berbentuk array.
                if (in_array($key, ['misi', 'nilai'], true)) {
                    if (is_string($value)) {
                        $decoded = json_decode($value, true);

                        if (is_array($decoded)) {
                            $konten[$key] = $decoded;
                        }
                    } elseif (is_array($value)) {
                        $konten[$key] = $value;
                    }

                    continue;
                }

                $konten[$key] = $value;
            }
        }

        return view('profil', compact('profil', 'konten'));
    }
}
