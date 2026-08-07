@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="page-title h3 fw-bold mb-0">Arsip Surat</h1>
        <a href="{{ route('admin.arsip-surat.create') }}" class="btn btn-outline-dark btn-sm px-3 fw-semibold">
            + Tambah Arsip Surat
        </a>
    </div>

    <div class="surface p-3 border rounded-3 bg-white mb-4">
        <form method="GET" class="mb-3">
            <div class="input-group style-search" style="max-width: 320px;">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-secondary"></i></span>
                <input type="search" name="search" value="{{ $search }}" class="form-control border-start-0 ps-0" placeholder="Cari Surat..." onchange="this.form.submit()">
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0 text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>Jenis Surat</th>
                        <th>Persyaratan Surat</th>
                        <th style="width: 100px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($arsipSurats as $arsip)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $arsip->nama_surat }}</td>
                            <td>{{ $arsip->persyaratan }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.arsip-surat.edit', $arsip) }}" class="btn btn-sm btn-outline-primary p-1 me-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.arsip-surat.destroy', $arsip) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus arsip surat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger p-1" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Surat Keterangan Nikah</td>
                            <td>KTP/KK/Pengantar RT/RW</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">Surat Domisili</td>
                            <td>KTP/KK/Bukti Tinggal</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="fw-semibold">Surat Tidak Mampu</td>
                            <td>KTP/KK/Surat RT/RW</td>
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
