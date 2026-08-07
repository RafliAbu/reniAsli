@extends('layouts.app')

@section('title', 'Status Pengajuan Surat')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card border rounded-4 shadow-sm w-100 style-phone-frame" style="max-width: 520px;">
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
                    <div class="rounded-circle bg-primary text-white p-1 d-grid place-items-center" style="width:28px; height:28px;"><i class="bi bi-building small"></i></div>
                    <div class="text-start">
                        <div class="fw-bold small lh-1">Desa Balangka</div>
                        <div class="small text-secondary lh-1" style="font-size: 0.72rem;">Kec. Sihapas Barumun</div>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <h1 class="h5 fw-bold mb-3">Status Pengajuan Surat Saya</h1>

                <div class="alert alert-light border rounded-3 p-2.5 small mb-3 d-flex align-items-start gap-2">
                    <i class="bi bi-info-circle text-primary fs-6"></i>
                    <span>Jika status pengajuan surat Anda telah <strong>Disetujui</strong>, Anda dapat langsung mengunduh/mencetak dokumen surat resmi secara otomatis.</span>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center small mb-3" role="alert">
                        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive mb-3">
                    <table class="table table-bordered align-middle mb-0 text-nowrap" style="font-size: 0.85rem;">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;" class="text-center">No</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal</th>
                                <th class="text-center">Status</th>
                                <th style="width: 100px;" class="text-center">Surat Resmi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengajuanSurats as $pengajuan)
                                <tr>
                                    <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                    <td class="fw-semibold text-dark">{{ $pengajuan->jenis_surat }}</td>
                                    <td class="small">{{ $pengajuan->tanggal_pengajuan ? $pengajuan->tanggal_pengajuan->format('d/m/Y') : '-' }}</td>
                                    <td class="text-center">
                                        @include('partials.status-badge', ['status' => $pengajuan->status])
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('masyarakat.pengajuan.show', $pengajuan) }}" class="btn btn-sm btn-outline-secondary p-1 rounded" title="Lihat Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @if($pengajuan->status === 'Disetujui')
                                                <a href="{{ route('masyarakat.pengajuan.cetak', $pengajuan) }}" target="_blank" class="btn btn-sm btn-success px-2 py-1 fw-semibold" title="Unduh/Cetak Surat Resmi">
                                                    <i class="bi bi-printer me-1"></i> Cetak
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Belum ada pengajuan surat yang dibuat. Klik menu <strong>Ajukan Surat</strong> untuk membuat surat baru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-3 bg-light rounded-3 border">
                    <div class="small text-dark fw-bold mb-1"><i class="bi bi-lightbulb text-warning me-1"></i> Catatan Pelayanan:</div>
                    <div class="small text-secondary mb-0">Surat yang disetujui dapat langsung dicetak mandiri atau diambil fisiknya di Kantor Desa Balangka pada jam kerja.</div>
                </div>
            </div>

            <div class="card-footer bg-white border-top p-2">
                <div class="d-flex justify-content-around text-center">
                    <a href="{{ route('masyarakat.dashboard') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-house d-block fs-5"></i>Beranda
                    </a>
                    <a href="{{ route('masyarakat.pengajuan.create') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-file-earmark-plus d-block fs-5"></i>Ajukan Surat
                    </a>
                    <a href="{{ route('masyarakat.pengajuan.status') }}" class="text-decoration-none text-primary fw-bold small py-1 px-2">
                        <i class="bi bi-clock-history d-block fs-5"></i>Status Desa
                    </a>
                    <a href="{{ route('masyarakat.profile.show') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-person d-block fs-5"></i>Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
