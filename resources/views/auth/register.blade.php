@extends('layouts.auth')

@section('title', 'Registrasi Akun')

@section('content')
    <div class="text-center mb-4">
        <h1 class="h3 fw-bold mb-2">Registrasi Akun</h1>
        <div class="user-avatar-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>

    <form action="{{ route('register.store') }}" method="POST" class="d-grid gap-3">
        @csrf
        <div>
            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Masukkan nama lengkap" required autofocus>
        </div>

        <div>
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Masukkan email" required>
        </div>

        <div>
            <label for="no_hp" class="form-label fw-semibold">No.HP</label>
            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" class="form-control" placeholder="08xxxxxxxxxx" required>
        </div>

        <div>
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password (minimal 8 karakter)" required>
        </div>

        <div>
            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ketik ulang password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2">
            Daftar
        </button>

        <div class="text-center mt-3">
            <span class="text-secondary small">Sudah Punya Akun?</span>
            <a href="{{ route('login') }}" class="muted-link ms-1 fw-semibold">Login Disini</a>
        </div>
    </form>
@endsection
