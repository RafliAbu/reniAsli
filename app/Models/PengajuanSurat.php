<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;

    public const STATUSES = ['Menunggu', 'Dalam Proses', 'Disetujui', 'Ditolak'];

    public const JENIS_SURAT = [
        'Surat Keterangan Domisili',
        'Surat Domisili',
        'Surat Keterangan Tidak Mampu',
        'Surat Tidak Mampu',
        'Surat Keterangan Usaha',
        'Surat Keterangan Nikah',
        'Surat Keterangan Kelahiran',
        'Surat Keterangan Kematian',
        'Surat Pengantar SKCK',
    ];

    protected $fillable = [
        'user_id',
        'jenis_surat',
        'nama_lengkap',
        'nik',
        'keperluan',
        'file_berkas',
        'status',
        'tanggal_pengajuan',
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
