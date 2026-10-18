<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'bidang_usaha',
        'deskripsi',
        'alamat',
        'email',
        'telepon',
        'konten',
    ];

    protected function casts(): array
    {
        return [
            'konten' => 'array',
        ];
    }
}
