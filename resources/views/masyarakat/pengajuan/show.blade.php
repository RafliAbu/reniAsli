@extends('layouts.app')

@section('title', 'Detail Pengajuan Surat')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title h3 fw-bold mb-1">Detail Pengajuan Surat</h1>
            <p class="page-subtitle small text-secondary mb-0">Nomor Pengajuan: PGJ-{{ str_pad($pengajuanSurat->id, 5, '0', STR_PAD_LEFT) }}</p>
        </div>
        <a href="{{ route('masyarakat.pengajuan.status') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="surface p-4 border rounded-3 bg-white shadow-sm mb-4">
        <div class="row g-4 mb-4">
            <div class="col-12 col-md-6">
                <div class="text-secondary small fw-semibold mb-1">Jenis Surat</div>
                <div class="fw-bold fs-5 text-primary">{{ $pengajuanSurat->jenis_surat }}</div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text-secondary small fw-semibold mb-1">Nama Lengkap Pemohon</div>
                <div class="fw-bold text-dark fs-5">{{ $pengajuanSurat->nama_lengkap }}</div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text-secondary small fw-semibold mb-1">Tanggal Pengajuan</div>
                <div class="fw-semibold">{{ $pengajuanSurat->tanggal_pengajuan ? $pengajuanSurat->tanggal_pengajuan->translatedFormat('d F Y') : '-' }}</div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text-secondary small fw-semibold mb-1">Status Pengajuan</div>
                <div>@include('partials.status-badge', ['status' => $pengajuanSurat->status])</div>
            </div>
            <div class="col-12">
                <div class="text-secondary small fw-semibold mb-1">Keperluan Pengajuan Surat</div>
                <div class="p-3 bg-light rounded-3 border text-dark">{{ $pengajuanSurat->keperluan }}</div>
            </div>
            @php
                $persyaratanList = \App\Models\PengajuanSurat::PERSYARATAN_SURAT[$pengajuanSurat->jenis_surat] ?? null;
            @endphp
            @if($persyaratanList)
                <div class="col-12">
                    <div class="text-secondary small fw-semibold mb-1">Persyaratan Layanan:</div>
                    <div class="p-3 bg-light rounded-3 border small">
                        <ul class="ps-3 mb-0 style-paragraph">
                            @foreach($persyaratanList as $syarat)
                                <li>{{ $syarat }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div class="text-secondary small fw-semibold mb-1">Berkas Lampiran Pendukung</div>
                @if ($pengajuanSurat->file_berkas)
                    <a href="{{ asset('storage/' . $pengajuanSurat->file_berkas) }}" target="_blank" class="btn btn-outline-info me-2">
                        <i class="bi bi-file-earmark-pdf me-2"></i> Lihat Berkas Lampiran
                    </a>
                @else
                    <div class="text-muted small italic">Tidak ada berkas lampiran pendukung.</div>
                @endif
            </div>
        </div>

        @if($pengajuanSurat->status === 'Disetujui')
            <div class="p-4 bg-success-subtle border border-success-subtle rounded-3 text-center">
                <h3 class="h5 fw-bold text-success mb-2">🎉 Surat Telah Disetujui & Selesai Diproses!</h3>
                <p class="small text-secondary mb-3">Dokumen surat resmi Anda telah siap dan dapat diunduh/dicetak langsung sekarang.</p>
                <a href="{{ route('masyarakat.pengajuan.cetak', $pengajuanSurat) }}" target="_blank" class="btn btn-success btn-lg px-4 py-2.5 fw-bold shadow-sm">
                    <i class="bi bi-printer me-2"></i> Cetak / Unduh Surat Resmi (PDF)
                </a>
            </div>
        @elseif($pengajuanSurat->status === 'Menunggu')
            <div class="p-3 bg-warning-subtle border border-warning-subtle rounded-3 text-center small text-dark">
                <i class="bi bi-clock me-1"></i> Pengajuan surat Anda sedang dalam antrean peninjauan oleh Pemerintah Desa Balangka.
            </div>
        @elseif($pengajuanSurat->status === 'Dalam Proses')
            <div class="p-3 bg-info-subtle border border-info-subtle rounded-3 text-center small text-dark">
                <i class="bi bi-arrow-repeat me-1"></i> Surat Anda saat ini sedang dalam tahap pembuatan/pemrosesan oleh petugas administrasi desa.
            </div>
        @endif
    </div>
@endsection
