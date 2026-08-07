@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="mb-4">
        <h1 class="page-title mb-3">Dashboard Admin</h1>
        
        <div class="surface p-4 border-start border-primary border-4 rounded-3 shadow-sm mb-4 bg-white">
            <h2 class="h4 fw-bold text-dark mb-1">Selamat Datang, {{ auth()->user()->name ?? 'Admin Desa' }}</h2>
            <p class="text-secondary mb-0">Sistem Informasi Pelayanan Administrasi Desa Balangka, Kecamatan Sihapas Barumun.</p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="surface metric p-3 d-flex flex-column justify-content-between h-100 border rounded-3 bg-white shadow-sm">
                <div class="display-5 fw-bold text-primary mb-2">{{ $summary['baru'] ?? 0 }}</div>
                <div class="fw-semibold text-secondary">Pengajuan Baru (Menunggu)</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="surface metric p-3 d-flex flex-column justify-content-between h-100 border rounded-3 bg-white shadow-sm">
                <div class="display-5 fw-bold text-warning mb-2">{{ $summary['proses'] ?? 0 }}</div>
                <div class="fw-semibold text-secondary">Dalam Proses</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="surface metric p-3 d-flex flex-column justify-content-between h-100 border rounded-3 bg-white shadow-sm">
                <div class="display-5 fw-bold text-success mb-2">{{ $summary['selesai'] ?? 0 }}</div>
                <div class="fw-semibold text-secondary">Disetujui / Selesai</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="surface metric p-3 d-flex flex-column justify-content-between h-100 border rounded-3 bg-white shadow-sm">
                <div class="display-5 fw-bold text-danger mb-2">{{ $summary['ditolak'] ?? 0 }}</div>
                <div class="fw-semibold text-secondary">Ditolak</div>
            </div>
        </div>
    </div>

    <div class="surface border rounded-3 bg-white shadow-sm">
        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
            <h2 class="h5 fw-bold mb-0">Pengajuan Surat Terbaru</h2>
            <a href="{{ route('admin.pengajuan.index') }}" class="btn btn-outline-primary btn-sm px-3 fw-semibold">
                Lihat Semua <i class="bi bi-chevron-right ms-1"></i>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;" class="text-center">No</th>
                        <th>No. Pengajuan</th>
                        <th>Jenis Surat</th>
                        <th>Pemohon & NIK</th>
                        <th>Tanggal</th>
                        <th class="text-center">Status</th>
                        <th style="width: 120px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($terbaru as $pengajuan)
                        <tr>
                            <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                            <td class="fw-semibold text-primary">PGJ-{{ str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="fw-semibold">{{ $pengajuan->jenis_surat }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $pengajuan->nama_lengkap }}</div>
                                <div class="small text-muted">NIK: {{ $pengajuan->nik ?? '-' }}</div>
                            </td>
                            <td class="small">{{ $pengajuan->tanggal_pengajuan ? $pengajuan->tanggal_pengajuan->format('d/m/Y') : '-' }}</td>
                            <td class="text-center">
                                @include('partials.status-badge', ['status' => $pengajuan->status])
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.pengajuan.index') }}" class="btn btn-sm btn-outline-primary px-2" title="Kelola Pengajuan">
                                    <i class="bi bi-eye me-1"></i> Kelola
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                Belum ada pengajuan surat masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
