@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Edit Pengguna</h1>
        <p class="page-subtitle">Perbarui data {{ $pengguna->name }}.</p>
    </div>
    <div class="surface p-4">
        <form action="{{ route('admin.pengguna.update', $pengguna) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.pengguna._form', ['pengguna' => $pengguna])
        </form>
    </div>
@endsection
