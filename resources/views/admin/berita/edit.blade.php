@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title h3 fw-bold mb-1">Edit Berita Desa</h1>
            <p class="text-secondary small mb-0">Perbarui publikasi berita "{{ $berita->judul }}".</p>
        </div>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="surface p-4 border rounded-3 bg-white shadow-sm">
        <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.berita._form', ['berita' => $berita])
        </form>
    </div>
@endsection
