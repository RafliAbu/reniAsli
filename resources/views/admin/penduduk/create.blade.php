@extends('layouts.app')

@section('title', 'Tambah Data Penduduk')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Tambah Data Penduduk</h1>
        <p class="page-subtitle">Masukkan identitas penduduk baru.</p>
    </div>
    <div class="surface p-4">
        <form action="{{ route('admin.penduduk.store') }}" method="POST">
            @csrf
            @include('admin.penduduk._form')
        </form>
    </div>
@endsection
