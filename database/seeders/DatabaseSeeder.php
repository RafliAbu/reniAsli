<?php

namespace Database\Seeders;

use App\Models\ArsipSurat;
use App\Models\Berita;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\PengajuanSurat;
use App\Models\Pengaturan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@desa.test'],
            [
                'name' => 'Admin Desa',
                'no_hp' => '081234567890',
                'alamat' => 'Kantor Desa Balangka',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@desabalangka52.com'],
            [
                'name' => 'Admin Desa Balangka',
                'no_hp' => '081234567890',
                'alamat' => 'Kantor Desa Balangka',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        $warga = User::updateOrCreate(
            ['email' => 'warga@desa.test'],
            [
                'name' => 'Reni Siregar',
                'no_hp' => '082212345678',
                'alamat' => 'Dusun I Desa Balangka',
                'role' => 'masyarakat',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'sonyamelinda19@gmail.com'],
            [
                'name' => 'Sonya Melinda',
                'no_hp' => '082306267414',
                'alamat' => 'Balangka, Kecamatan Sihapas Barumun',
                'role' => 'masyarakat',
                'password' => Hash::make('password'),
            ]
        );

        Penduduk::updateOrCreate(
            ['nik' => '1201010101010001'],
            [
                'nama' => 'Reni Siregar',
                'tempat_tanggal_lahir' => 'Balangka, 01 Januari 1995',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Dusun I Desa Balangka',
            ]
        );

        KartuKeluarga::updateOrCreate(
            ['no_kk' => '1201010101010000'],
            [
                'kepala_keluarga' => 'Ahmad Siregar',
                'alamat' => 'Dusun I Desa Balangka',
                'jumlah_anggota' => 4,
            ]
        );

        ArsipSurat::updateOrCreate(
            ['nomor_surat' => '470/001/DB-SB/VII/2026'],
            [
                'jenis_surat' => 'Surat Keterangan Domisili',
                'persyaratan_surat' => "1. Fotokopi KTP pemohon.\n2. Fotokopi Kartu Keluarga (KK).\n3. Surat pengantar RT/RW (jika diperlukan).\n4. Mengisi formulir permohonan.\n5. Memiliki domisili di Kelurahan Hanopan Sibatu.",
                'tanggal_surat' => now()->toDateString(),
            ]
        );

        ArsipSurat::updateOrCreate(
            ['nomor_surat' => '503/002/DB-SB/VII/2026'],
            [
                'jenis_surat' => 'Surat Keterangan Usaha (SKU)',
                'persyaratan_surat' => "1. Fotokopi KTP.\n2. Fotokopi KK.\n3. Surat pengantar RT/RW (jika diperlukan).\n4. Pas foto ukuran 3×4 (1 lembar).\n5. Mengisi formulir permohonan.\n6. Memiliki usaha yang berlokasi di Kelurahan Hanopan Sibatu.",
                'tanggal_surat' => now()->toDateString(),
            ]
        );

        PengajuanSurat::updateOrCreate(
            ['user_id' => $warga->id, 'jenis_surat' => 'Surat Keterangan Domisili'],
            [
                'nama_lengkap' => $warga->name,
                'nik' => '1201010101010001',
                'keperluan' => 'Keperluan administrasi pekerjaan.',
                'status' => 'Menunggu',
                'tanggal_pengajuan' => now()->toDateString(),
            ]
        );

        Berita::updateOrCreate(
            ['judul' => 'Musyawarah Perencanaan & Pembangunan Desa Balangka'],
            [
                'isi_berita' => 'Pemerintah Desa Balangka menyelenggarakan musyawarah terbuka bersama tokoh masyarakat, BPD, dan warga untuk menyusun prioritas pembangunan serta alokasi dana desa tahun berjalan.',
                'kategori' => 'Musyawarah',
                'gambar' => 'berita/musyawarah_desa.png',
                'tanggal' => now()->subDays(2)->toDateString(),
            ]
        );

        Berita::updateOrCreate(
            ['judul' => 'Penyaluran Bantuan Sosial (Bansos) Tahap II Bagi Warga Desa Balangka'],
            [
                'isi_berita' => 'Penyaluran bantuan sosial langsung tunai secara transparan dan tepat sasaran kepada keluarga penerima manfaat di Kantor Desa Balangka, Kecamatan Sihapas Barumun.',
                'kategori' => 'Bantuan Sosial',
                'gambar' => 'berita/pembagian_bansos.jpg',
                'tanggal' => now()->subDays(5)->toDateString(),
            ]
        );

        Berita::updateOrCreate(
            ['judul' => 'Penyaluran Bantuan Kebajikan Kepada Anak Yatim Desa Balangka'],
            [
                'isi_berita' => 'Bentuk kepedulian dan solidaritas sosial Pemerintah Desa Balangka melalui penyerahan santunan dan paket bantuan pendidikan kepada anak-anak yatim di wilayah desa.',
                'kategori' => 'Pemberdayaan',
                'gambar' => 'berita/bantuan_anak_yatim.png',
                'tanggal' => now()->subDays(8)->toDateString(),
            ]
        );

        Berita::updateOrCreate(
            ['judul' => 'Kerja Bakti Sosial Pembersihan Jalan & Infrastruktur Lingkungan Desa'],
            [
                'isi_berita' => 'Warga Desa Balangka bahu membahu dalam kegiatan kerja bakti sosial pembersihan semak belukar, perbaikan jalan poros desa, dan sanitasi saluran air untuk kenyamanan bersama.',
                'kategori' => 'Gotong Royong',
                'gambar' => 'berita/kerja_bakti_sosial.jpg',
                'tanggal' => now()->subDays(10)->toDateString(),
            ]
        );

        Pengaturan::updateOrCreate(
            ['id' => 1],
            [
                'nama_desa' => 'Desa Balangka',
                'alamat' => 'Kecamatan Sihapas Barumun, Kabupaten Padang Lawas, Provinsi Sumatera Utara',
                'no_telepon' => '0812-3456-7890',
                'email_desa' => 'desabalangkakecamatansihapas@gmail.com',
                'nama_kepala_desa' => 'MARABAIK HARAHAP',
                'profil_desa' => "Desa Balangka merupakan salah satu desa yang berada di wilayah Kecamatan Sihapas Barumun, Kabupaten Padang Lawas, Provinsi Sumatera Utara. Sebagai bagian dari wilayah yang kental dengan budaya Padang Lawas, sejarah desa ini tumbuh seiring dengan pembentukan pemukiman awal dan penyebaran masyarakat adat Mandailing dan Batak di sepanjang pesisir sungai yang menjadi urat nadi kehidupan masyarakat setempat.\n\nWilayah ini berkembang dan resmi menjadi bagian dari administrasi Kabupaten Padang Lawas menyusul pemekaran dari wilayah induknya. Saat ini, Desa Balangka terus bertransformasi menjadi komunitas mandiri yang mengandalkan sektor pertanian dan perkebunan, sekaligus menjadi bagian integral dalam pembangunan wilayah Kecamatan Sihapas Barumun.",
                'visi' => '"Terwujudnya Desa Balangka yang maju, mandiri, sejahtera, religius, serta memberikan pelayanan publik yang cepat, transparan, dan berbasis teknologi informasi."',
                'misi' => [
                    'Meningkatkan kualitas pelayanan administrasi kepada masyarakat secara efektif, efisien, dan transparan.',
                    'Mengembangkan potensi desa di bidang pertanian, perkebunan, dan UMKM untuk meningkatkan kesejahteraan masyarakat.',
                    'Meningkatkan kualitas sumber daya manusia melalui pendidikan, pelatihan, dan pemberdayaan masyarakat.',
                    'Mewujudkan tata kelola pemerintahan desa yang akuntabel, partisipatif, dan berintegritas.',
                    'Memanfaatkan teknologi informasi dalam penyelenggaraan pemerintahan dan pelayanan publik.',
                    'Menjaga kerukunan, keamanan, serta melestarikan budaya dan lingkungan desa.',
                ],
                'foto_kepala_desa' => 'pengaturan/foto_kepala_desa.png',
                'foto_struktur' => 'pengaturan/foto_struktur.png',
            ]
        );
    }
}
