@extends('layouts.app')

@section('title', 'Kelola Berita')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="page-title h3 fw-bold mb-1">Kelola Berita & Informasi Desa</h1>
            <p class="text-secondary small mb-0">Kelola konten berita dan dokumentasi kegiatan Desa Balangka.</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary px-3 fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="surface p-4 border rounded-3 bg-white mb-4 shadow-sm">
        <div class="d-flex flex-column gap-3 mb-4">
            @forelse ($beritas as $berita)
                <div class="border rounded-3 p-3 d-flex flex-wrap align-items-center justify-content-between gap-3 bg-white shadow-sm hover-shadow transition">
                    <div class="d-flex align-items-center gap-3">
                        <div class="border rounded-2 bg-light d-grid place-items-center text-secondary overflow-hidden" style="width: 90px; height: 70px; flex-shrink: 0;">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-100 h-100 object-fit-cover">
                            @else
                                <i class="bi bi-image fs-3 text-secondary"></i>
                            @endif
                        </div>
                        <div>
                            @if($berita->kategori)
                                <span class="badge bg-primary-subtle text-primary mb-1" style="font-size: 0.72rem;">{{ $berita->kategori }}</span>
                            @endif
                            <h2 class="h6 fw-bold mb-1">{{ $berita->judul }}</h2>
                            <div class="small text-secondary">
                                <i class="bi bi-calendar-event me-1"></i>{{ $berita->tanggal ? $berita->tanggal->translatedFormat('d F Y') : '-' }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-outline-primary px-3 py-1.5 fw-semibold" title="Edit Berita">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger px-3 py-1.5 fw-semibold" title="Hapus Berita">
                                <i class="bi bi-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="bi bi-newspaper fs-1 text-muted"></i>
                    <p class="text-secondary mt-2 mb-0">Belum ada berita desa. Klik tombol <strong>+ Tambah Berita</strong> untuk membuat berita baru.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-end">
            {{ $beritas->links() }}
        </div>
    </div>
@endsection
