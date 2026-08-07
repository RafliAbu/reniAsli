@extends('layouts.app')

@section('title', 'Edit Data Penduduk')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Edit Data Penduduk</h1>
        <p class="page-subtitle">Perbarui data {{ $penduduk->nama }}.</p>
    </div>
    <div class="surface p-4">
        <form action="{{ route('admin.penduduk.update', $penduduk) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.penduduk._form', ['penduduk' => $penduduk])
        </form>
    </div>
@endsection
