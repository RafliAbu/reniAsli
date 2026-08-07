@extends('layouts.app')

@section('title', 'Verifikasi Pengajuan Surat')

@section('content')
    <h1 class="page-title h3 fw-bold mb-4">Verifikasi Pengajuan Surat</h1>

    <div class="surface p-4 border rounded-3 bg-white mb-4">
        <form method="GET" class="mb-4">
            <div class="input-group" style="max-width: 420px;">
                <input type="text" name="nomor_surat" value="{{ $nomorSurat ?? '01/HG/VI/2026' }}" class="form-control" placeholder="Cari nomor surat...">
                <button type="submit" class="btn btn-outline-dark px-3 fw-semibold">Cek</button>
            </div>
        </form>

        <div class="card border rounded-3 shadow-sm style-detail-card" style="max-width: 540px;">
            <div class="card-header bg-light border-bottom py-3">
                <h2 class="h5 fw-bold mb-0">Detail Surat</h2>
            </div>
            <div class="card-body p-4">
                <div class="row mb-2">
                    <div class="col-5 text-secondary fw-semibold">Nomor Surat</div>
                    <div class="col-7 fw-bold">: {{ $pengajuan ? 'PGJ-' . str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) : ($nomorSurat ?: '01/HG/VI/2026') }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 text-secondary fw-semibold">Jenis Surat</div>
                    <div class="col-7">: {{ $pengajuan->jenis_surat ?? 'Surat Keterangan Domisili' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 text-secondary fw-semibold">Nama Pemohon</div>
                    <div class="col-7">: {{ $pengajuan->nama_lengkap ?? 'Lenggana Harahap' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 text-secondary fw-semibold">Tanggal Surat</div>
                    <div class="col-7">: {{ isset($pengajuan->tanggal_pengajuan) ? $pengajuan->tanggal_pengajuan->format('d/m/Y') : '20/06/2026' }}</div>
                </div>
                <div class="row mb-4">
                    <div class="col-5 text-secondary fw-semibold">Status</div>
                    <div class="col-7">: <span class="fw-bold text-success">{{ $pengajuan->status ?? 'Disetujui' }}</span></div>
                </div>

                <div class="pt-2">
                    @if(isset($pengajuan) && $pengajuan)
                        <a href="{{ route('admin.verifikasi.cetak', $pengajuan) }}" target="_blank" class="btn btn-primary w-100 py-2 fw-semibold">
                            Unduh/Cetak
                        </a>
                    @else
                        <button type="button" onclick="window.print()" class="btn btn-primary w-100 py-2 fw-semibold">
                            Unduh/Cetak
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
