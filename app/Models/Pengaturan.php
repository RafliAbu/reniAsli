<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa',
        'alamat',
        'no_telepon',
        'email_desa',
        'profil_desa',
        'visi',
        'misi',
        'nama_kepala_desa',
        'foto_kepala_desa',
        'foto_ttd_kades',
        'foto_profil_desa',
        'foto_struktur',
    ];

    protected $casts = [
        'misi' => 'array',
    ];
}
