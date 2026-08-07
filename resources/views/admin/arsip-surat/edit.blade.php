@extends('layouts.app')

@section('title', 'Edit Arsip Surat')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Edit Arsip Surat</h1>
        <p class="page-subtitle">Perbarui data {{ $arsipSurat->nomor_surat }}.</p>
    </div>
    <div class="surface p-4">
        <form action="{{ route('admin.arsip-surat.update', $arsipSurat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.arsip-surat._form', ['arsipSurat' => $arsipSurat])
        </form>
    </div>
@endsection
