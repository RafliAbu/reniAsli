<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'jenis_surat',
        'persyaratan_surat',
        'file_surat',
        'tanggal_surat',
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
    ];
}
