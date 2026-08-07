@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Tambah Pengguna</h1>
        <p class="page-subtitle">Buat akun pengguna baru.</p>
    </div>
    <div class="surface p-4">
        <form action="{{ route('admin.pengguna.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.pengguna._form')
        </form>
    </div>
@endsection
