@extends('layouts.app')

@section('title', 'Ajukan Surat Online')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card border rounded-4 shadow-sm w-100 style-phone-frame" style="max-width: 480px;">
            <div class="card-header bg-light border-bottom text-center py-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="small fw-semibold text-secondary">9:41</span>
                    <div class="d-flex gap-1 align-items-center">
                        <i class="bi bi-signal small"></i>
                        <i class="bi bi-wifi small"></i>
                        <i class="bi bi-battery-full small"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 justify-content-center">
                    <img src="{{ asset('images/logo_padang_lawas.jpg') }}" alt="Logo Padang Lawas" style="width: 28px; height: 28px; object-fit: contain;">
                    <div class="text-start">
                        <div class="fw-bold small lh-1">Desa Balangka</div>
                        <div class="small text-secondary lh-1" style="font-size: 0.72rem;">Kec. Sihapas Barumun</div>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <h1 class="h4 fw-bold mb-3">Ajukan Surat</h1>

                <div class="alert alert-light border rounded-3 p-2 small mb-3 d-flex align-items-start gap-2">
                    <i class="bi bi-info-circle text-primary fs-6"></i>
                    <span>Ajukan surat administrasi desa dengan mudah secara online.</span>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger border-0 bg-danger-subtle text-danger-emphasis rounded-3 p-3 mb-3 small">
                        <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-1"></i> Periksa kembali input berikut:</div>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('masyarakat.pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="d-grid gap-3">
                    @csrf
                    <div>
                        <label for="jenis_surat" class="form-label fw-semibold small">Pilih Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat" class="form-select form-select-sm" required>
                            <option value="">-- Pilih Jenis Surat --</option>
                            @foreach($jenisSurats as $jenis)
                                <option value="{{ $jenis }}" {{ old('jenis_surat') == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Persyaratan Surat Info Card -->
                    <div id="persyaratan-card" class="p-3 bg-primary-subtle border border-primary-subtle rounded-3 small d-none">
                        <div class="fw-bold text-primary mb-1 d-flex align-items-center gap-1">
                            <i class="bi bi-file-earmark-check-fill"></i> Persyaratan Dokumen:
                        </div>
                        <ul id="persyaratan-list" class="ps-3 mb-0 text-dark" style="line-height: 1.5;"></ul>
                    </div>

                    <div>
                        <label for="nama_lengkap" class="form-label fw-semibold small">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', auth()->user()->name ?? '') }}" class="form-control form-control-sm" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <div>
                        <label for="keperluan" class="form-label fw-semibold small">Keperluan</label>
                        <textarea name="keperluan" id="keperluan" rows="3" class="form-control form-control-sm" placeholder="Jelaskan keperluan pengajuan surat..." required>{{ old('keperluan') }}</textarea>
                    </div>

                    <div>
                        <label class="form-label fw-semibold small">Upload Berkas Pendukung / Persyaratan</label>
                        <div class="border rounded-3 p-3 text-center bg-light">
                            <i class="bi bi-file-earmark-arrow-up display-6 text-primary d-block mb-1"></i>
                            <input type="file" name="file_berkas" id="file_berkas" class="d-none" accept=".pdf,.jpg,.jpeg,.png" onchange="showFileName(this)">
                            <label for="file_berkas" class="btn btn-sm btn-outline-primary px-3 mb-1">
                                <i class="bi bi-upload me-1"></i> Pilih Berkas Lampiran
                            </label>
                            <div id="file-name-display" class="small text-success fw-semibold mt-1"></div>
                            <div class="small text-secondary" style="font-size: 0.72rem;">Unggah KTP / KK / Surat Pengantar / Berkas Persyaratan (PDF, JPG, PNG - Maks. 5 MB)</div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2.5 fw-bold mt-2">
                        <i class="bi bi-send-fill me-1"></i> Kirim Pengajuan Surat
                    </button>
                </form>
            </div>

            <div class="card-footer bg-white border-top p-2">
                <div class="d-flex justify-content-around text-center">
                    <a href="{{ route('masyarakat.dashboard') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-house d-block fs-5"></i>Beranda
                    </a>
                    <a href="{{ route('masyarakat.pengajuan.create') }}" class="text-decoration-none text-primary fw-bold small py-1 px-2">
                        <i class="bi bi-file-earmark-plus d-block fs-5"></i>Ajukan Surat
                    </a>
                    <a href="{{ route('masyarakat.pengajuan.status') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-clock-history d-block fs-5"></i>Status Desa
                    </a>
                    <a href="{{ route('masyarakat.profile.show') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-person d-block fs-5"></i>Profil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const persyaratanData = @json($persyaratanSurat ?? \App\Models\PengajuanSurat::PERSYARATAN_SURAT);

        const jenisSelect = document.getElementById('jenis_surat');
        const persyaratanCard = document.getElementById('persyaratan-card');
        const persyaratanList = document.getElementById('persyaratan-list');

        function updatePersyaratan() {
            const selected = jenisSelect.value;
            if (selected && persyaratanData[selected]) {
                persyaratanList.innerHTML = '';
                persyaratanData[selected].forEach(function(item) {
                    const li = document.createElement('li');
                    li.textContent = item;
                    persyaratanList.appendChild(li);
                });
                persyaratanCard.classList.remove('d-none');
            } else {
                persyaratanCard.classList.add('d-none');
            }
        }

        jenisSelect.addEventListener('change', updatePersyaratan);

        if (jenisSelect.value) {
            updatePersyaratan();
        }

        function showFileName(input) {
            const display = document.getElementById('file-name-display');
            if (input.files && input.files[0]) {
                display.innerText = '📁 File terpilih: ' + input.files[0].name;
            } else {
                display.innerText = '';
            }
        }
    </script>
@endsection
