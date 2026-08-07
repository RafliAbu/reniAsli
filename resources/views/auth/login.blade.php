@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="text-center mb-4">
        <h1 class="h3 fw-bold mb-2">Login</h1>
        <div class="user-avatar-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>

    <!-- Demo Accounts Quick Reference Box -->
    <div class="alert alert-primary border-0 bg-primary-subtle text-primary-emphasis rounded-3 p-3 mb-4 small">
        <div class="fw-bold mb-2 d-flex align-items-center gap-1">
            <i class="bi bi-key-fill"></i> Akun Demo Uji Coba:
        </div>
        <div class="d-flex flex-column gap-2">
            <div class="d-flex justify-content-between align-items-center bg-white p-2 rounded border">
                <div>
                    <div class="fw-semibold text-dark">🔑 Admin Desa</div>
                    <div class="text-secondary" style="font-size: 0.78rem;">admin@desabalangka52.com</div>
                    <div class="text-secondary" style="font-size: 0.75rem;">Password: <code>password</code></div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2" onclick="fillCredentials('admin@desabalangka52.com', 'password')" style="font-size: 0.75rem;">
                    Gunakan
                </button>
            </div>
            <div class="d-flex justify-content-between align-items-center bg-white p-2 rounded border">
                <div>
                    <div class="fw-semibold text-dark">👤 Masyarakat</div>
                    <div class="text-secondary" style="font-size: 0.78rem;">sonyamelinda19@gmail.com</div>
                    <div class="text-secondary" style="font-size: 0.75rem;">Password: <code>password</code></div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2" onclick="fillCredentials('sonyamelinda19@gmail.com', 'password')" style="font-size: 0.75rem;">
                    Gunakan
                </button>
            </div>
        </div>
    </div>

    <form action="{{ route('login.store') }}" method="POST" class="d-grid gap-3">
        @csrf
        <div>
            <label for="email" class="form-label fw-semibold">Username/Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Masukkan email" autocomplete="email" autofocus required>
        </div>
        <div>
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" autocomplete="current-password" required>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-secondary small" for="remember">Ingat Saya</label>
            </div>
            <a href="{{ route('password.request') }}" class="muted-link">Lupa Password?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-2">
            Login
        </button>
        <div class="text-center mt-3">
            <span class="text-secondary small">Belum Punya Akun?</span>
            <a href="{{ route('register') }}" class="muted-link ms-1 fw-semibold">Daftar Disini</a>
        </div>
    </form>

    <script>
        function fillCredentials(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
@endsection
