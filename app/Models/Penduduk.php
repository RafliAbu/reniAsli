<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'alamat',
    ];
}
