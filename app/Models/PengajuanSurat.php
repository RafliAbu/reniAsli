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
        'Surat Keterangan Usaha (SKU)',
        'Surat Keterangan Tidak Mampu (SKTM)',
        'Pengajuan KTP-el',
        'Pengajuan Kartu Keluarga (KK)',
        'Surat Pengantar SKCK',
        'Surat Keterangan Pindah',
        'Surat Keterangan Kelahiran',
    ];

    public const PERSYARATAN_SURAT = [
        'Surat Keterangan Domisili' => [
            'Fotokopi KTP pemohon.',
            'Fotokopi Kartu Keluarga (KK).',
            'Surat pengantar RT/RW (jika diperlukan).',
            'Mengisi formulir permohonan.',
            'Memiliki domisili di Kelurahan Hanopan Sibatu.',
        ],
        'Surat Keterangan Usaha (SKU)' => [
            'Fotokopi KTP.',
            'Fotokopi KK.',
            'Surat pengantar RT/RW (jika diperlukan).',
            'Pas foto ukuran 3×4 (1 lembar).',
            'Mengisi formulir permohonan.',
            'Memiliki usaha yang berlokasi di Kelurahan Hanopan Sibatu.',
        ],
        'Surat Keterangan Tidak Mampu (SKTM)' => [
            'Fotokopi KTP.',
            'Fotokopi KK.',
            'Surat pengantar RT/RW (jika diperlukan).',
            'Mengisi formulir permohonan.',
            'Bersedia dilakukan verifikasi apabila diperlukan.',
        ],
        'Pengajuan KTP-el' => [
            'Fotokopi KK.',
            'KTP lama (untuk penggantian).',
            'Surat kehilangan dari Kepolisian (jika KTP hilang).',
            'Surat pindah (bagi penduduk pindahan).',
            'Mengisi formulir permohonan.',
        ],
        'Pengajuan Kartu Keluarga (KK)' => [
            'Fotokopi KTP anggota keluarga.',
            'KK lama (untuk perubahan data).',
            'Buku Nikah/Akta Perkawinan (jika diperlukan).',
            'Surat Kelahiran (untuk penambahan anggota keluarga).',
            'Surat Pindah (bagi penduduk pindahan).',
            'Mengisi formulir permohonan.',
        ],
        'Surat Pengantar SKCK' => [
            'Fotokopi KTP.',
            'Fotokopi KK.',
            'Pas foto 4×6 sesuai ketentuan Kepolisian.',
            'Mengisi formulir permohonan.',
            'Surat pengantar RT/RW (jika diperlukan). Setelah memperoleh surat pengantar dari kelurahan, pemohon melanjutkan proses pembuatan SKCK di Kepolisian.',
        ],
        'Surat Keterangan Pindah' => [
            'Fotokopi KTP.',
            'Fotokopi KK.',
            'KTP dan KK asli.',
            'Mengisi formulir perpindahan penduduk.',
            'Surat pengantar RT/RW (jika diperlukan).',
        ],
        'Surat Keterangan Kelahiran' => [
            'Fotokopi KTP kedua orang tua.',
            'Fotokopi KK.',
            'Fotokopi Buku Nikah/Akta Perkawinan orang tua.',
            'Surat keterangan lahir dari Rumah Sakit/Bidan/Puskesmas.',
            'Mengisi formulir permohonan.',
        ],
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
