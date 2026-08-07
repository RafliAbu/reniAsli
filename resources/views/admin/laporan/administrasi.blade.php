@extends('layouts.app')

@section('title', 'Buat Laporan Administrasi')

@section('content')
    <h1 class="page-title h3 fw-bold mb-4">Buat Laporan Administrasi</h1>

    <div class="surface p-4 border rounded-3 bg-white mb-4">
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('admin.laporan.administrasi') }}" class="d-grid gap-3">
                    @csrf
                    <div>
                        <label for="jenis_laporan" class="form-label fw-semibold">Jenis Laporan</label>
                        <select name="jenis_laporan" id="jenis_laporan" class="form-select">
                            <option value="">Pilih Jenis Laporan</option>
                            <option value="rekap_penduduk" {{ ($jenisLaporan ?? '') == 'rekap_penduduk' ? 'selected' : '' }}>Rekap Data Penduduk</option>
                            <option value="rekap_kk" {{ ($jenisLaporan ?? '') == 'rekap_kk' ? 'selected' : '' }}>Rekap Kartu Keluarga</option>
                            <option value="rekap_surat" {{ ($jenisLaporan ?? '') == 'rekap_surat' ? 'selected' : '' }}>Rekap Permohonan Surat</option>
                        </select>
                    </div>

                    <div>
                        <label for="periode" class="form-label fw-semibold">Periode</label>
                        <div class="input-group">
                            <input type="text" name="periode" id="periode" value="{{ $periode ?? 'Mai 2026' }}" class="form-control" placeholder="Mai 2026">
                            <span class="input-group-text bg-white"><i class="bi bi-calendar-event"></i></span>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                            Buat Laporan
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-6">
                <div class="border rounded-3 p-4 bg-light text-center h-100 d-flex flex-column justify-content-center align-items-center" style="min-height: 220px;">
                    <div class="position-relative w-100 h-100 d-flex align-items-center justify-content-center border border-2 border-dashed rounded-3 p-4 bg-white">
                        <div class="text-secondary">
                            <i class="bi bi-file-earmark-text display-4 mb-2 d-block text-secondary"></i>
                            <span class="fw-bold">Preview Laporan</span>
                            @if(!empty($preview))
                                <div class="mt-3 text-start small">
                                    <div><strong>Jenis:</strong> {{ $jenisLaporan ?? 'Laporan Administrasi' }}</div>
                                    <div><strong>Periode:</strong> {{ $periode ?? 'Mai 2026' }}</div>
                                    <div class="badge bg-success mt-2">Laporan Siap Diunduh</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
