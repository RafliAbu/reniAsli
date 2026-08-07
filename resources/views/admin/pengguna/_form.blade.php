<div class="row g-3">
    <div class="col-12 col-md-6">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name', $pengguna->name ?? '') }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $pengguna->email ?? '') }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="no_hp" class="form-label">No.HP</label>
        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $pengguna->no_hp ?? '') }}" class="form-control">
    </div>
    <div class="col-12 col-md-6">
        <label for="role" class="form-label">Role</label>
        <select id="role" name="role" class="form-select" required>
            @foreach (['admin' => 'Admin Desa', 'masyarakat' => 'Masyarakat'] as $value => $label)
                <option value="{{ $value }}" @selected(old('role', $pengguna->role ?? 'masyarakat') === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" {{ isset($pengguna) ? '' : 'required' }}>
        @isset($pengguna)
            <div class="form-text">Kosongkan jika password tidak diubah.</div>
        @endisset
    </div>
    <div class="col-12 col-md-6">
        <label for="foto_profil" class="form-label">Foto Profil</label>
        <input type="file" id="foto_profil" name="foto_profil" class="form-control" accept=".jpg,.jpeg,.png">
        <div class="form-text">Maksimal 2MB, format JPG/PNG.</div>
        @isset($pengguna)
            @if ($pengguna->foto_profil)
                <a href="{{ asset('storage/' . $pengguna->foto_profil) }}" target="_blank" class="small">Lihat foto saat ini</a>
            @endif
        @endisset
    </div>
    <div class="col-12">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" rows="3" class="form-control">{{ old('alamat', $pengguna->alamat ?? '') }}</textarea>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.pengguna.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
</div>
