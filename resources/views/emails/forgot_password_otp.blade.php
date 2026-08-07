<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kode OTP Lupa Password</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f8; color: #333333; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; padding: 30px; border: 1px solid #e1e8ed; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .header { text-align: center; padding-bottom: 20px; border-bottom: 2px solid #dc2626; }
        .header h2 { color: #dc2626; margin: 0; font-size: 22px; }
        .header p { color: #64748b; margin: 4px 0 0 0; font-size: 14px; }
        .code-box { background: #fef2f2; border: 2px dashed #ef4444; border-radius: 8px; font-size: 32px; font-weight: bold; letter-spacing: 6px; color: #dc2626; text-align: center; padding: 20px; margin: 25px 0; }
        .footer { text-align: center; color: #94a3b8; font-size: 12px; margin-top: 30px; border-top: 1px solid #f1f5f9; padding-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pemerintah Desa Balangka</h2>
            <p>Kecamatan Sihapas Barumun, Kabupaten Padang Lawas</p>
        </div>
        <p style="margin-top: 25px;">Halo <strong>{{ $name }}</strong>,</p>
        <p>Kami menerima permintaan untuk mereset kata sandi akun Anda. Gunakan kode OTP berikut untuk melanjutkan proses reset password:</p>
        
        <div class="code-box">{{ $code }}</div>
        
        <p>Jangan berikan kode ini kepada siapapun. Kode OTP ini berlaku selama 15 menit.</p>
        <p>Jika Anda tidak meminta reset password, abaikan pesan ini dan amankan akun Anda.</p>

        <div class="footer">
            &copy; {{ date('Y') }} Pemerintah Desa Balangka. Seluruh hak cipta dilindungi.
        </div>
    </div>
</body>
</html>
