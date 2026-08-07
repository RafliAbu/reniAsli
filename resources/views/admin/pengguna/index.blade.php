@extends('layouts.app')

@section('title', 'Pengguna Akun')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title h3 fw-bold mb-0">Pengguna Akun</h1>
        <a href="{{ route('admin.pengguna.create') }}" class="btn btn-outline-dark btn-sm px-3 fw-semibold">
            + Tambah Pengguna
        </a>
    </div>

    <div class="surface p-4 border rounded-3 bg-white mb-4">
        <div class="card border rounded-3 p-4 mb-4" style="max-width: 460px;">
            <h2 class="h6 fw-bold mb-3">Photo Profil</h2>
            <div class="d-flex flex-column align-items-center justify-content-center p-4 border rounded-3 bg-light text-center">
                <div class="rounded-circle bg-white border d-grid place-items-center text-secondary mb-3 shadow-sm" style="width: 80px; height: 80px; font-size: 2.5rem;">
                    <i class="bi bi-person"></i>
                </div>
                <div class="d-flex gap-2 mb-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary px-3">Batal</button>
                    <button type="button" class="btn btn-sm btn-primary px-3 fw-semibold">Pilih</button>
                </div>
                <span class="small text-secondary">Maks. 2 MB (JPG/PNG)</span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0 text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="width: 100px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penggunas as $pengguna)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $pengguna->name }}</td>
                            <td>{{ $pengguna->email }}</td>
                            <td><span class="badge bg-secondary">{{ ucfirst($pengguna->role) }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('admin.pengguna.edit', $pengguna) }}" class="btn btn-sm btn-outline-primary p-1 me-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.pengguna.destroy', $pengguna) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengguna ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger p-1" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Admin Desa</td>
                            <td>admin@desabalangka52.com</td>
                            <td><span class="badge bg-primary">Admin</span></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">Sonya Melinda</td>
                            <td>sonyamelinda19@gmail.com</td>
                            <td><span class="badge bg-secondary">Masyarakat</span></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
