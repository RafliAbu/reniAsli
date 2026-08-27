@extends('layouts.app')

@section('title', 'Cetak Surat Keterangan - Desa Balangka')

@section('content')
    <div class="actions mb-4 d-flex justify-content-between align-items-center">
        <a href="javascript:history.back()" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
        <button onclick="window.print()" class="btn btn-primary fw-bold shadow-sm">
            <i class="bi bi-printer me-2"></i> Cetak Dokumen Surat
        </button>
    </div>

    <div class="surat-container bg-white p-5 border rounded-3 shadow-sm mx-auto" style="max-width: 800px; font-family: 'Times New Roman', Times, serif; color: #000; line-height: 1.6;">
        
        <!-- KOP SURAT -->
        <div class="d-flex align-items-center border-bottom border-dark border-3 pb-3 mb-4 text-center">
            <div class="me-3" style="width: 80px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Coat_of_arms_of_Padang_Lawas_Regency.png/200px-Coat_of_arms_of_Padang_Lawas_Regency.png" alt="Logo Padang Lawas" class="img-fluid" style="max-height: 85px;" onerror="this.src='https://via.placeholder.com/80x90?text=LOGO'">
            </div>
            <div class="flex-grow-1">
                <h3 class="fw-bold m-0 text-uppercase" style="font-size: 1.25rem;">Pemerintah Kabupaten Padang Lawas</h3>
                <h3 class="fw-bold m-0 text-uppercase" style="font-size: 1.2rem;">Kecamatan Sihapas Barumun</h3>
                <h2 class="fw-bold m-0 text-uppercase" style="font-size: 1.6rem; letter-spacing: 1px;">Desa Balangka</h2>
                <p class="m-0 small text-secondary fst-italic" style="font-size: 0.85rem;">Alamat: Kecamatan Sihapas Barumun, Kab. Padang Lawas, Prov. Sumatera Utara. Kode Pos: 22755</p>
            </div>
        </div>

        <!-- JUDUL SURAT -->
        <div class="text-center mb-4">
            <h4 class="fw-bold text-uppercase text-decoration-underline m-0" style="font-size: 1.2rem;">
                {{ strtoupper($pengajuanSurat->jenis_surat) }}
            </h4>
            <p class="m-0" style="font-size: 0.95rem;">Nomor: {{ str_pad($pengajuanSurat->id, 3, '0', STR_PAD_LEFT) }}/DB-SB/{{ date('Y') }}</p>
        </div>

        <!-- PEMBUKA -->
        <p class="mb-3 text-justify">
            Yang bertanda tangan dibawah ini Kepala Desa Balangka, Kecamatan Sihapas Barumun, Kabupaten Padang Lawas, menerangkan dengan sebenarnya bahwa:
        </p>

        <!-- DATA PEMOHON -->
        <table class="table table-borderless mb-4" style="margin-left: 20px; width: 95%;">
            <tr>
                <td style="width: 200px; padding: 3px 0;">Nama Lengkap</td>
                <td style="width: 15px; padding: 3px 0;">:</td>
                <td class="fw-bold text-uppercase" style="padding: 3px 0;">{{ $pengajuanSurat->nama_lengkap }}</td>
            </tr>
            <tr>
                <td style="padding: 3px 0;">NIK / No. KTP</td>
                <td style="padding: 3px 0;">:</td>
                <td style="padding: 3px 0;">{{ $pengajuanSurat->nik ?? '-' }}</td>
            </tr>
            <tr>
                <td style="padding: 3px 0;">Alamat Tempat Tinggal</td>
                <td style="padding: 3px 0;">:</td>
                <td style="padding: 3px 0;">Desa Balangka, Kecamatan Sihapas Barumun, Kabupaten Padang Lawas</td>
            </tr>
            <tr>
                <td style="padding: 3px 0;">Agama / Status</td>
                <td style="padding: 3px 0;">:</td>
                <td style="padding: 3px 0;">Islam / Warga Negara Indonesia</td>
            </tr>
        </table>

        <!-- ISI SURAT KHUSUS PER JENIS -->
        <div class="mb-4 text-justify" style="line-height: 1.8;">
            @if(str_contains(strtolower($pengajuanSurat->jenis_surat), 'usaha'))
                <p>Adalah benar-benar penduduk yang berdomisili di Desa Balangka, Kecamatan Sihapas Barumun, Kabupaten Padang Lawas.</p>
                <p>Berdasarkan pengamatan yang telah kami lakukan memang benar yang bersangkutan mempunyai usaha / aktivitas ekonomi sebagaimana mestinya di wilayah Desa Balangka.</p>
                <p>Adapun surat keterangan usaha ini dibuat guna melengkapi persyaratan: <strong>{{ $pengajuanSurat->keperluan }}</strong>.</p>
            @elseif(str_contains(strtolower($pengajuanSurat->jenis_surat), 'tidak mampu'))
                <p>Adalah benar-benar warga penduduk Desa Balangka yang tergolong dalam keluarga kurang mampu / ekonomi lemah.</p>
                <p>Sesuai pengamatan kami keluarga tersebut memerlukan bantuan administrasi untuk keperluan: <strong>{{ $pengajuanSurat->keperluan }}</strong>.</p>
            @elseif(str_contains(strtolower($pengajuanSurat->jenis_surat), 'nikah'))
                <p>Adalah penduduk asli Desa Balangka, Kecamatan Sihapas Barumun dan sepanjang pengetahuan kami serta catatan pada kami memang benar yang bersangkutan mengajukan surat pengantar/keterangan nikah untuk keperluan: <strong>{{ $pengajuanSurat->keperluan }}</strong>.</p>
            @else
                <p>Adalah benar-benar penduduk yang berdomisili di Desa Balangka, Kecamatan Sihapas Barumun, Kabupaten Padang Lawas dan sudah tinggal di lingkungan desa kami.</p>
                <p>Demikian surat keterangan ini kami berikan untuk keperluan: <strong>{{ $pengajuanSurat->keperluan }}</strong>.</p>
            @endif
            <p>Demikian surat keterangan ini kami keluarkan untuk dapat dipergunakan sebagaimana mestinya dan bagi yang berkepentingan menjadi bahan periksa adanya.</p>
        </div>

        <!-- TANDA TANGAN -->
        @php
            $pengaturan = $pengaturan ?? \App\Models\Pengaturan::first();
            $ttdUrl = !empty($pengaturan?->foto_ttd_kades) 
                ? asset('storage/' . $pengaturan->foto_ttd_kades) 
                : asset('images/ttd_kades.png');
        @endphp
        <div class="row mt-5 pt-3">
            <div class="col-6 text-center">
                <br>
                <p class="mb-4">Pemohon,</p>
                <div style="height: 85px;"></div>
                <p class="fw-bold text-uppercase text-decoration-underline m-0">{{ $pengajuanSurat->nama_lengkap }}</p>
            </div>
            <div class="col-6 text-center position-relative">
                <p class="m-0">Balangka, {{ $pengajuanSurat->tanggal_pengajuan ? $pengajuanSurat->tanggal_pengajuan->translatedFormat('d F Y') : date('d F Y') }}</p>
                <p class="mb-1">Kepala Desa Balangka,</p>
                <div class="d-flex justify-content-center align-items-center my-1" style="height: 85px;">
                    <img src="{{ $ttdUrl }}" alt="Tanda Tangan Kepala Desa" style="max-height: 85px; max-width: 220px; object-fit: contain;">
                </div>
                <p class="fw-bold text-uppercase text-decoration-underline m-0">{{ $pengaturan->nama_kepala_desa ?? 'MARABAIK HARAHAP' }}</p>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .actions, .topbar, .sidebar { display: none !important; }
            .content { padding: 0 !important; }
            .surat-container { border: none !important; box-shadow: none !important; width: 100% !important; max-width: 100% !important; padding: 0 !important; }
            body { background: #fff !important; margin: 0 !important; }
        }
    </style>
@endsection
