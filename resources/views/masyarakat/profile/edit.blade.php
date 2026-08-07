@extends('layouts.app')

@section('title', 'Ubah Profil')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Ubah Data</h1>
        <p class="page-subtitle">Perbarui informasi profil masyarakat.</p>
    </div>

    <div class="surface p-4">
        <form action="{{ route('masyarakat.profile.update') }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-12 col-md-6">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>
            <div class="col-12 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            </div>
            <div class="col-12 col-md-6">
                <label for="no_hp" class="form-label">No.HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" class="form-control" required>
            </div>
            <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>
            </div>
            <div class="col-12 d-flex justify-content-end gap-2">
                <a href="{{ route('masyarakat.profile.show') }}" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
            </div>
        </form>
    </div>
@endsection
