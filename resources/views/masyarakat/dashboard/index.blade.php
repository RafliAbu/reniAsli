@extends('layouts.app')

@section('title', 'Beranda Masyarakat')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
            <h1 class="page-title">Dashboard / Beranda</h1>
            <p class="page-subtitle">Selamat datang, {{ auth()->user()->name }}.</p>
        </div>
        <a href="{{ route('masyarakat.pengajuan.create') }}" class="btn btn-primary">
            <i class="bi bi-send me-2"></i>Ajukan Surat
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="surface metric">
                <div class="text-secondary small">Total Pengajuan</div>
                <div class="display-6 fw-bold">{{ $summary['total'] }}</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="surface metric">
                <div class="text-secondary small">Dalam Proses</div>
                <div class="display-6 fw-bold">{{ $summary['proses'] }}</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="surface metric">
                <div class="text-secondary small">Selesai</div>
                <div class="display-6 fw-bold">{{ $summary['selesai'] }}</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="surface metric">
                <div class="text-secondary small">Ditolak</div>
                <div class="display-6 fw-bold">{{ $summary['ditolak'] }}</div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-7">
            <div class="surface">
                <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                    <h2 class="h5 fw-bold mb-0">Pengajuan Terbaru</h2>
                    <a href="{{ route('masyarakat.pengajuan.status') }}" class="btn btn-outline-secondary btn-sm">Lihat Status</a>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Jenis Surat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengajuanTerbaru as $pengajuan)
                                <tr>
                                    <td class="fw-semibold">{{ $pengajuan->jenis_surat }}</td>
                                    <td>{{ $pengajuan->tanggal_pengajuan->format('d/m/Y') }}</td>
                                    <td>@include('partials.status-badge', ['status' => $pengajuan->status])</td>
                                    <td class="text-end">
                                        <a href="{{ route('masyarakat.pengajuan.show', $pengajuan) }}" class="btn btn-outline-primary btn-icon" title="Lihat Detail"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada pengajuan surat.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-5">
            <div class="surface p-3">
                <h2 class="h5 fw-bold mb-3">Berita Desa</h2>
                <div class="d-grid gap-3">
                    @forelse ($beritas as $berita)
                        <article class="border-bottom pb-3">
                            <div class="small text-secondary">{{ $berita->tanggal->format('d/m/Y') }}</div>
                            <div class="fw-semibold">{{ $berita->judul }}</div>
                            <p class="text-secondary mb-0">{{ Str::limit($berita->isi_berita, 120) }}</p>
                        </article>
                    @empty
                        <div class="text-secondary">Berita desa belum tersedia.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
