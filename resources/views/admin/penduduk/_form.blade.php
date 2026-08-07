<div class="row g-3">
    <div class="col-12 col-md-6">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" id="nik" name="nik" value="{{ old('nik', $penduduk->nik ?? '') }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $penduduk->nama ?? '') }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="tempat_tanggal_lahir" class="form-label">Tempat Tanggal Lahir</label>
        <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="{{ old('tempat_tanggal_lahir', $penduduk->tempat_tanggal_lahir ?? '') }}" class="form-control" placeholder="Balangka, 01 Januari 1995" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
            <option value="">Pilih jenis kelamin</option>
            @foreach (['Laki-laki', 'Perempuan'] as $option)
                <option value="{{ $option }}" @selected(old('jenis_kelamin', $penduduk->jenis_kelamin ?? '') === $option)>{{ $option }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" rows="3" class="form-control" required>{{ old('alamat', $penduduk->alamat ?? '') }}</textarea>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.penduduk.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
</div>
