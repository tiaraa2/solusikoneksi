<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom gambar tidak ditambahkan di sini.
        // Tabel services sudah memiliki kolom foto.
    }

    public function down(): void
    {
        // Tidak ada perubahan untuk dibatalkan.
    }
};