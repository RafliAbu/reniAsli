@extends('layouts.app')

@section('title', 'Pengajuan Surat Online')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
            <h1 class="page-title h3 fw-bold mb-1">Pengajuan Surat Online</h1>
            <p class="page-subtitle small text-secondary mb-0">Daftar seluruh pengajuan surat administrasi desa dari masyarakat.</p>
        </div>
        <form class="d-flex gap-2" method="GET">
            <input type="search" name="search" value="{{ $search }}" class="form-control" placeholder="Cari nama, NIK, jenis surat...">
            <button class="btn btn-primary px-3" type="submit"><i class="bi bi-search me-1"></i> Cari</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="surface p-4 border rounded-3 bg-white shadow-sm mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>No. Pengajuan</th>
                        <th>Jenis Surat</th>
                        <th>Nama Pemohon & NIK</th>
                        <th>Keperluan</th>
                        <th class="text-center">Berkas</th>
                        <th>Tanggal</th>
                        <th class="text-center">Status</th>
                        <th style="width: 200px;" class="text-center">Aksi Status</th>
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
                                <div class="small text-muted"><i class="bi bi-card-text me-1"></i>NIK: {{ $pengajuan->nik ?? '-' }}</div>
                            </td>
                            <td>
                                <div class="small text-secondary text-truncate" style="max-width: 200px;" title="{{ $pengajuan->keperluan }}">
                                    {{ $pengajuan->keperluan }}
                                </div>
                            </td>
                            <td class="text-center">
                                @if($pengajuan->file_berkas)
                                    <a href="{{ asset('storage/' . $pengajuan->file_berkas) }}" target="_blank" class="btn btn-sm btn-outline-info px-2 py-1" title="Lihat Berkas">
                                        <i class="bi bi-file-earmark-pdf me-1"></i> Lihat
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
                                <div class="btn-group btn-group-sm" role="group">
                                    @if($pengajuan->status !== 'Disetujui')
                                        <form action="{{ route('admin.pengajuan.status', $pengajuan) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Disetujui">
                                            <button type="submit" class="btn btn-sm btn-success px-2" title="Setujui Pengajuan">
                                                <i class="bi bi-check-lg"></i> Setujui
                                            </button>
                                        </form>
                                    @endif
                                    @if($pengajuan->status === 'Menunggu')
                                        <form action="{{ route('admin.pengajuan.status', $pengajuan) }}" method="POST" class="d-inline ms-1">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Dalam Proses">
                                            <button type="submit" class="btn btn-sm btn-warning text-dark px-2" title="Proses Pengajuan">
                                                <i class="bi bi-arrow-repeat"></i> Proses
                                            </button>
                                        </form>
                                    @endif
                                    @if($pengajuan->status !== 'Ditolak')
                                        <form action="{{ route('admin.pengajuan.status', $pengajuan) }}" method="POST" class="d-inline ms-1">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Ditolak">
                                            <button type="submit" class="btn btn-sm btn-outline-danger px-2" title="Tolak Pengajuan">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada pengajuan surat dari masyarakat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3 border-top d-flex justify-content-end">{{ $pengajuanSurats->links() }}</div>
    </div>
@endsection
