@extends('layouts.app')

@section('title', 'Edit Kartu Keluarga')

@section('content')
    <div class="mb-4">
        <h1 class="page-title">Edit Kartu Keluarga</h1>
        <p class="page-subtitle">Perbarui data {{ $kartuKeluarga->kepala_keluarga }}.</p>
    </div>
    <div class="surface p-4">
        <form action="{{ route('admin.kartu-keluarga.update', $kartuKeluarga) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.kartu-keluarga._form', ['kartuKeluarga' => $kartuKeluarga])
        </form>
    </div>
@endsection
