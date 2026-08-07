@extends('layouts.app')

@section('title', 'Tambah Arsip Surat')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Tambah Arsip Surat</h1>
        <p class="page-subtitle">Masukkan detail arsip surat baru.</p>
    </div>
    <div class="surface p-4">
        <form action="{{ route('admin.arsip-surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.arsip-surat._form')
        </form>
    </div>
@endsection
