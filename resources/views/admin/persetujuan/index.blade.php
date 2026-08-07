@extends('layouts.app')

@section('title', 'Meninjau & Menyetujui Surat')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="page-title h3 fw-bold mb-1">Meninjau & Menyetujui Surat</h1>
            <p class="text-secondary small mb-0">Tinjau dan berikan persetujuan atas pengajuan surat masyarakat.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="surface p-4 border rounded-3 bg-white shadow-sm mb-4">
        <ul class="nav nav-pills mb-4 gap-2">
            <li class="nav-item">
                <a class="nav-link {{ ($status ?? 'Semua') == 'Semua' ? 'active fw-bold' : 'bg-light text-dark' }}" href="{{ route('admin.persetujuan.index') }}">
                    <i class="bi bi-layers me-1"></i> Semua
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($status ?? '') == 'Menunggu' ? 'active fw-bold' : 'bg-light text-dark' }}" href="{{ route('admin.persetujuan.index', ['status' => 'Menunggu']) }}">
                    <i class="bi bi-clock me-1"></i> Menunggu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($status ?? '') == 'Dalam Proses' ? 'active fw-bold' : 'bg-light text-dark' }}" href="{{ route('admin.persetujuan.index', ['status' => 'Dalam Proses']) }}">
                    <i class="bi bi-arrow-repeat me-1"></i> Dalam Proses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($status ?? '') == 'Disetujui' ? 'active fw-bold' : 'bg-light text-dark' }}" href="{{ route('admin.persetujuan.index', ['status' => 'Disetujui']) }}">
                    <i class="bi bi-check-circle me-1"></i> Disetujui / Selesai
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($status ?? '') == 'Ditolak' ? 'active fw-bold' : 'bg-light text-dark' }}" href="{{ route('admin.persetujuan.index', ['status' => 'Ditolak']) }}">
                    <i class="bi bi-x-circle me-1"></i> Ditolak
                </a>
            </li>
        </ul>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>No. Pengajuan</th>
                        <th>Jenis Surat</th>
                        <th>Pemohon</th>
                        <th>Keperluan</th>
                        <th class="text-center">Berkas</th>
                        <th>Tanggal</th>
                        <th class="text-center">Status</th>
                        <th style="width: 240px;" class="text-center">Aksi Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuanSurats as $pengajuan)
                        <tr>
                            <td class="text-center fw-bold">{{ $pengajuanSurats->firstItem() + $loop->index }}</td>
                            <td class="fw-semibold text-primary">PGJ-{{ str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="fw-semibold">{{ $pengajuan->jenis_surat }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $pengajuan->nama_lengkap }}</div>
                                <div class="small text-muted">NIK: {{ $pengajuan->nik ?? '-' }}</div>
                            </td>
                            <td>
                                <div class="small text-secondary text-truncate" style="max-width: 180px;" title="{{ $pengajuan->keperluan }}">
                                    {{ $pengajuan->keperluan }}
                                </div>
                            </td>
                            <td class="text-center">
                                @if($pengajuan->file_berkas)
                                    <a href="{{ asset('storage/' . $pengajuan->file_berkas) }}" target="_blank" class="btn btn-sm btn-outline-info px-2 py-1" title="Lihat Berkas">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </a>
                                @else
                                    <span class="badge bg-light text-muted border">-</span>
                                @endif
                            </td>
                            <td class="small">{{ $pengajuan->tanggal_pengajuan ? $pengajuan->tanggal_pengajuan->format('d/m/Y') : '-' }}</td>
                            <td class="text-center">
                                @include('partials.status-badge', ['status' => $pengajuan->status])
                            </td>
                            <td class="text-center">
                                <div class="d-flex align-items-center justify-content-center gap-1">
                                    @if($pengajuan->status !== 'Disetujui')
                                        <form action="{{ route('admin.persetujuan.status', $pengajuan) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Disetujui">
                                            <button type="submit" class="btn btn-sm btn-success px-2 py-1" title="Setujui Pengajuan">
                                                <i class="bi bi-check-lg me-1"></i>Setujui
                                            </button>
                                        </form>
                                    @endif

                                    @if($pengajuan->status === 'Menunggu')
                                        <form action="{{ route('admin.persetujuan.status', $pengajuan) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Dalam Proses">
                                            <button type="submit" class="btn btn-sm btn-warning text-dark px-2 py-1" title="Proses Pengajuan">
                                                <i class="bi bi-arrow-repeat me-1"></i>Proses
                                            </button>
                                        </form>
                                    @endif

                                    @if($pengajuan->status !== 'Ditolak')
                                        <form action="{{ route('admin.persetujuan.status', $pengajuan) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Ditolak">
                                            <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" title="Tolak Pengajuan">
                                                Tolak
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('admin.verifikasi.cetak', $pengajuan) }}" target="_blank" class="btn btn-sm btn-outline-primary px-2 py-1 ms-1" title="Pratinjau / Cetak Surat Resmi">
                                        <i class="bi bi-printer"></i> Cetak
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada pengajuan surat dengan status <strong>{{ $status }}</strong>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3 border-top d-flex justify-content-end">{{ $pengajuanSurats->links() }}</div>
    </div>
@endsection
