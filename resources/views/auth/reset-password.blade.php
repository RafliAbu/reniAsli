<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - Desa Balangka</title>
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
            <div class="bg-primary text-white rounded-3 d-inline-flex align-items-center justify-content-center fw-bold fs-3 mb-2" style="width: 56px; height: 56px;">DB</div>
            <h1 class="h4 fw-bold mb-1">Reset Password Akun</h1>
            <p class="text-secondary small">Masukkan kode OTP 6-digit dan password baru Anda.</p>
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
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3">
                    <label class="form-label text-muted small">Email Akun</label>
                    <input type="email" class="form-control bg-light" value="{{ $email }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label fw-semibold">Kode OTP (6-Digit)</label>
                    <input type="text" name="code" id="code" class="form-control form-control-lg text-center fw-bold" placeholder="000000" maxlength="6" autofocus required style="letter-spacing: 0.5rem; font-size: 1.3rem;">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Minimal 8 karakter" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ketik ulang password baru" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold rounded-3">
                    <i class="bi bi-key-fill me-2"></i> Perbarui Password
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-decoration-none small text-secondary">
                    &larr; Batal & Kembali ke Login
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
