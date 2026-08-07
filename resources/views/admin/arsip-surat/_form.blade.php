<div class="row g-3">
    <div class="col-12 col-md-6">
        <label for="nomor_surat" class="form-label">Nomor Surat</label>
        <input type="text" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $arsipSurat->nomor_surat ?? '') }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="jenis_surat" class="form-label">Jenis Surat</label>
        <input type="text" id="jenis_surat" name="jenis_surat" value="{{ old('jenis_surat', $arsipSurat->jenis_surat ?? '') }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
        <input type="date" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat', isset($arsipSurat) ? $arsipSurat->tanggal_surat->format('Y-m-d') : now()->toDateString()) }}" class="form-control" required>
    </div>
    <div class="col-12 col-md-6">
        <label for="file_surat" class="form-label">File Surat</label>
        <input type="file" id="file_surat" name="file_surat" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
        <div class="form-text">Format PDF/JPG/PNG maksimal 2MB.</div>
        @isset($arsipSurat)
            @if ($arsipSurat->file_surat)
                <a href="{{ asset('storage/' . $arsipSurat->file_surat) }}" target="_blank" class="small">Lihat file saat ini</a>
            @endif
        @endisset
    </div>
    <div class="col-12">
        <label for="persyaratan_surat" class="form-label">Persyaratan Surat</label>
        <textarea id="persyaratan_surat" name="persyaratan_surat" rows="4" class="form-control" required>{{ old('persyaratan_surat', $arsipSurat->persyaratan_surat ?? '') }}</textarea>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.arsip-surat.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
</div>
