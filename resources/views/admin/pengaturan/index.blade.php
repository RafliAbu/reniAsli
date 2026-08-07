@extends('layouts.app')

@section('title', 'Pengaturan Profil Desa & Upload Media')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title h3 fw-bold mb-0">Pengaturan Profil Desa & Upload Media</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="surface p-4 border rounded-3 bg-white mb-4">
        <form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data" class="d-grid gap-4">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <!-- Informasi Umum -->
                <div class="col-lg-6">
                    <div class="card border rounded-3 p-4 shadow-sm h-100">
                        <h2 class="h5 fw-bold mb-3 text-primary"><i class="bi bi-info-circle me-2"></i>Informasi Umum Desa</h2>
                        
                        <div class="mb-3">
                            <label for="nama_desa" class="form-label fw-semibold">Nama Desa</label>
                            <input type="text" name="nama_desa" id="nama_desa" value="{{ old('nama_desa', $pengaturan->nama_desa ?? 'Desa Balangka') }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_kepala_desa" class="form-label fw-semibold">Nama Kepala Desa</label>
                            <input type="text" name="nama_kepala_desa" id="nama_kepala_desa" value="{{ old('nama_kepala_desa', $pengaturan->nama_kepala_desa ?? 'MARABAIK HARAHAP') }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-semibold">Alamat Kantor Desa</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="2" required>{{ old('alamat', $pengaturan->alamat ?? 'Kecamatan Sihapas Barumun, Kabupaten Padang Lawas') }}</textarea>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="no_telepon" class="form-label fw-semibold">No. Telepon / WA</label>
                                <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $pengaturan->no_telepon ?? '0812-3456-7890') }}" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email_desa" class="form-label fw-semibold">Email Desa</label>
                                <input type="email" name="email_desa" id="email_desa" value="{{ old('email_desa', $pengaturan->email_desa ?? 'desabalangkakecamatansihapas@gmail.com') }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profil & Visi Misi -->
                <div class="col-lg-6">
                    <div class="card border rounded-3 p-4 shadow-sm h-100">
                        <h2 class="h5 fw-bold mb-3 text-primary"><i class="bi bi-journal-text me-2"></i>Profil, Visi & Misi</h2>

                        <div class="mb-3">
                            <label for="profil_desa" class="form-label fw-semibold">Sejarah & Profil Desa</label>
                            <textarea name="profil_desa" id="profil_desa" class="form-control" rows="4">{{ old('profil_desa', $pengaturan->profil_desa) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="visi" class="form-label fw-semibold">Visi Desa</label>
                            <textarea name="visi" id="visi" class="form-control" rows="2">{{ old('visi', $pengaturan->visi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="misi_text" class="form-label fw-semibold">Misi Desa (Satu poin per baris)</label>
                            <textarea name="misi_text" id="misi_text" class="form-control" rows="4">{{ old('misi_text', is_array($pengaturan->misi) ? implode("\n", $pengaturan->misi) : '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upload Media Foto -->
            <div class="card border rounded-3 p-4 shadow-sm">
                <h2 class="h5 fw-bold mb-3 text-primary"><i class="bi bi-images me-2"></i>Upload Foto Profil & Struktur Desa</h2>

                <div class="row g-4">
                    <!-- Foto Kepala Desa -->
                    <div class="col-md-6 col-lg-4">
                        <div class="border rounded p-3 text-center bg-light">
                            <label class="form-label fw-bold d-block mb-2">Foto Kepala Desa</label>
                            <div class="mb-3 bg-white p-2 rounded border" style="height: 180px; display: grid; place-items: center; overflow: hidden;">
                                @if(!empty($pengaturan->foto_kepala_desa))
                                    <img src="{{ asset('storage/' . $pengaturan->foto_kepala_desa) }}" alt="Kepala Desa" class="img-fluid rounded" style="max-height: 100%; object-fit: contain;">
                                @else
                                    <i class="bi bi-person-badge fs-1 text-muted"></i>
                                @endif
                            </div>
                            <input type="file" name="foto_kepala_desa" class="form-control form-control-sm" accept="image/*">
                            <div class="form-text small">JPG/PNG maks. 5MB</div>
                        </div>
                    </div>

                    <!-- Foto Struktur Organisasi -->
                    <div class="col-md-6 col-lg-4">
                        <div class="border rounded p-3 text-center bg-light">
                            <label class="form-label fw-bold d-block mb-2">Foto Tabel Struktur Organisasi</label>
                            <div class="mb-3 bg-white p-2 rounded border" style="height: 180px; display: grid; place-items: center; overflow: hidden;">
                                @if(!empty($pengaturan->foto_struktur))
                                    <img src="{{ asset('storage/' . $pengaturan->foto_struktur) }}" alt="Struktur Organisasi" class="img-fluid rounded" style="max-height: 100%; object-fit: contain;">
                                @else
                                    <i class="bi bi-diagram-3 fs-1 text-muted"></i>
                                @endif
                            </div>
                            <input type="file" name="foto_struktur" class="form-control form-control-sm" accept="image/*">
                            <div class="form-text small">Dokumen Struktur Desa (Foto 1)</div>
                        </div>
                    </div>

                    <!-- Foto Sampul Profil -->
                    <div class="col-md-6 col-lg-4">
                        <div class="border rounded p-3 text-center bg-light">
                            <label class="form-label fw-bold d-block mb-2">Foto Banner Sampul Desa</label>
                            <div class="mb-3 bg-white p-2 rounded border" style="height: 180px; display: grid; place-items: center; overflow: hidden;">
                                @if(!empty($pengaturan->foto_profil_desa))
                                    <img src="{{ asset('storage/' . $pengaturan->foto_profil_desa) }}" alt="Foto Sampul Desa" class="img-fluid rounded" style="max-height: 100%; object-fit: contain;">
                                @else
                                    <i class="bi bi-image fs-1 text-muted"></i>
                                @endif
                            </div>
                            <input type="file" name="foto_profil_desa" class="form-control form-control-sm" accept="image/*">
                            <div class="form-text small">Foto Pemandangan/Wilayah Desa</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-5 py-2.5 fw-bold rounded-3 shadow">
                    <i class="bi bi-save me-2"></i> Simpan Pengaturan & Foto
                </button>
            </div>
        </form>
    </div>
@endsection
