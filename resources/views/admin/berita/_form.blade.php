<div class="row g-3">
    <div class="col-12 col-md-6">
        <label for="judul" class="form-label fw-semibold">Judul Berita</label>
        <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" class="form-control" placeholder="Masukkan judul berita" required>
    </div>

    <div class="col-12 col-md-3">
        <label for="kategori" class="form-label fw-semibold">Kategori Kegiatan</label>
        <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $berita->kategori ?? 'Kegiatan Desa') }}" class="form-control" placeholder="Contoh: Gotong Royong, Bansos">
    </div>

    <div class="col-12 col-md-3">
        <label for="tanggal" class="form-label fw-semibold">Tanggal Publikasi</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', isset($berita) ? $berita->tanggal->format('Y-m-d') : now()->toDateString()) }}" class="form-control" required>
    </div>

    <div class="col-12">
        <label for="gambar" class="form-label fw-semibold">Foto / Gambar Berita</label>
        @if(isset($berita) && $berita->gambar)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Preview" class="rounded border shadow-sm" style="max-height: 140px; object-fit: cover;">
                <div class="small text-muted mt-1">Foto saat ini: {{ $berita->gambar }}</div>
            </div>
        @endif
        <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
        <div class="form-text small">Format file gambar (JPG, PNG, WEBP) maksimal 5MB.</div>
    </div>

    <div class="col-12">
        <label for="isi_berita" class="form-label fw-semibold">Isi Konten Berita</label>
        <textarea id="isi_berita" name="isi_berita" rows="8" class="form-control" placeholder="Tuliskan detail isi berita kegiatan..." required>{{ old('isi_berita', $berita->isi_berita ?? '') }}</textarea>
    </div>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">Batal</a>
    <button type="submit" class="btn btn-primary px-4 fw-semibold"><i class="bi bi-save me-2"></i>Simpan Berita</button>
</div>
