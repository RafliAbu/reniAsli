<div class="row g-3">
    <div class="col-12 col-md-6">
        <label for="no_kk" class="form-label">No KK</label>
        <input type="text" id="no_kk" name="no_kk" value="{{ old('no_kk', $kartuKeluarga->no_kk ?? '') }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="kepala_keluarga" class="form-label">Kepala Keluarga</label>
        <input type="text" id="kepala_keluarga" name="kepala_keluarga" value="{{ old('kepala_keluarga', $kartuKeluarga->kepala_keluarga ?? '') }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-4">
        <label for="jumlah_anggota" class="form-label">Jumlah Anggota</label>
        <input type="number" min="1" id="jumlah_anggota" name="jumlah_anggota" value="{{ old('jumlah_anggota', $kartuKeluarga->jumlah_anggota ?? 1) }}" class="form-control" required>
    </div>
    <div class="col-12">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" rows="3" class="form-control" required>{{ old('alamat', $kartuKeluarga->alamat ?? '') }}</textarea>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.kartu-keluarga.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
</div>
