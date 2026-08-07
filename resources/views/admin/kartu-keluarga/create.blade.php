@extends('layouts.app')

@section('title', 'Tambah Kartu Keluarga')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Tambah Kartu Keluarga</h1>
        <p class="page-subtitle">Masukkan data kartu keluarga baru.</p>
    </div>
    <div class="surface p-4">
        <form action="{{ route('admin.kartu-keluarga.store') }}" method="POST">
            @csrf
            @include('admin.kartu-keluarga._form')
        </form>
    </div>
@endsection
