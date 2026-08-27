<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - Desa Balangka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; font-family: Inter, system-ui, sans-serif; }
        .auth-card { border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 10px 25px rgba(15, 23, 42, 0.05); }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 py-4">
    <div class="container" style="max-width: 480px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo_padang_lawas.jpg') }}" alt="Logo Padang Lawas" class="mb-2" style="height: 64px; object-fit: contain;">
            <h1 class="h4 fw-bold mb-1">Lupa Password Akun</h1>
            <p class="text-secondary small">Masukkan email terdaftar Anda untuk menerima kode OTP reset password.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card auth-card p-4 bg-white">
            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">Alamat Email Terdaftar</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-secondary"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold rounded-3">
                    <i class="bi bi-send me-2"></i> Kirim Kode OTP
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-decoration-none small text-secondary">
                    &larr; Kembali ke Login
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
