<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pengajuan Surat Disetujui</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f8; color: #333333; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; padding: 30px; border: 1px solid #e1e8ed; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .header { text-align: center; padding-bottom: 20px; border-bottom: 2px solid #16a34a; }
        .header h2 { color: #16a34a; margin: 0; font-size: 22px; }
        .header p { color: #64748b; margin: 4px 0 0 0; font-size: 14px; }
        .info-card { background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 20px; margin: 20px 0; }
        .info-row { display: flex; margin-bottom: 8px; }
        .info-label { font-weight: bold; width: 140px; color: #166534; }
        .info-val { color: #1e293b; }
        .footer { text-align: center; color: #94a3b8; font-size: 12px; margin-top: 30px; border-top: 1px solid #f1f5f9; padding-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pemerintah Desa Balangka</h2>
            <p>Kecamatan Sihapas Barumun, Kabupaten Padang Lawas</p>
        </div>
        <p style="margin-top: 25px;">Halo <strong>{{ $pengajuan->nama_lengkap }}</strong>,</p>
        <p>Kabar baik! Permohonan pengajuan surat administrasi Anda telah <strong>Disetujui / Selesai</strong> diproses oleh Pemerintah Desa Balangka.</p>
        
        <div class="info-card">
            <div style="margin-bottom: 8px;"><strong>Detail Pengajuan:</strong></div>
            <div><strong>Jenis Surat:</strong> {{ $pengajuan->jenis_surat }}</div>
            <div><strong>NIK:</strong> {{ $pengajuan->nik }}</div>
            <div><strong>Status:</strong> <span style="color: #16a34a; font-weight: bold;">{{ $pengajuan->status }}</span></div>
            <div><strong>Tanggal Pengajuan:</strong> {{ $pengajuan->created_at->format('d/m/Y H:i') }}</div>
        </div>

        <p>Anda dapat mengunduh / mencetak surat fisik atau mengambil dokumen cetak di Kantor Desa Balangka pada jam kerja operasional.</p>
        
        <div class="footer">
            &copy; {{ date('Y') }} Pemerintah Desa Balangka. Seluruh hak cipta dilindungi.
        </div>
    </div>
</body>
</html>
