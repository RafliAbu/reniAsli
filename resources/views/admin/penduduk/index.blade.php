@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="page-title h3 fw-bold mb-0">Data Penduduk</h1>
        <a href="{{ route('admin.penduduk.create') }}" class="btn btn-outline-dark btn-sm px-3 fw-semibold">
            + Tambah Penduduk
        </a>
    </div>

    <div class="surface p-3 border rounded-3 bg-white mb-4">
        <form method="GET" class="mb-3">
            <div class="input-group style-search" style="max-width: 320px;">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-secondary"></i></span>
                <input type="search" name="search" value="{{ $search }}" class="form-control border-start-0 ps-0" placeholder="Cari Data Penduduk..." onchange="this.form.submit()">
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0 text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th style="width: 100px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penduduks as $penduduk)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $penduduk->nik }}</td>
                            <td class="fw-semibold">{{ $penduduk->nama }}</td>
                            <td>{{ $penduduk->tempat_tanggal_lahir }}</td>
                            <td>{{ $penduduk->jenis_kelamin }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.penduduk.edit', $penduduk) }}" class="btn btn-sm btn-outline-primary p-1 me-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.penduduk.destroy', $penduduk) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data penduduk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger p-1" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">1</td>
                            <td>122102070404000</td>
                            <td class="fw-semibold">Sonya Melinda</td>
                            <td>29/03/1999</td>
                            <td>Perempuan</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>122102170902000</td>
                            <td class="fw-semibold">Nia Arjelina</td>
                            <td>17/09/2002</td>
                            <td>Perempuan</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>1221021501020002</td>
                            <td class="fw-semibold">Boyman Harahap</td>
                            <td>20/10/2010</td>
                            <td>Laki-Laki</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end align-items-center mt-3 gap-1">
            <span class="me-2 text-secondary">&laquo;</span>
            <span class="btn btn-sm btn-primary px-2 py-0 fw-bold">1</span>
            <span class="btn btn-sm btn-outline-secondary px-2 py-0">2</span>
            <span class="btn btn-sm btn-outline-secondary px-2 py-0">3</span>
            <span class="ms-2 text-secondary">&raquo;</span>
        </div>
    </div>
@endsection
