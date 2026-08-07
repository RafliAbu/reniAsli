@extends('layouts.app')

@section('title', 'Kartu Keluarga')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="page-title h3 fw-bold mb-0">Kartu Keluarga</h1>
        <a href="{{ route('admin.kartu-keluarga.create') }}" class="btn btn-outline-dark btn-sm px-3 fw-semibold">
            + Tambah Kartu Keluarga
        </a>
    </div>

    <div class="surface p-3 border rounded-3 bg-white mb-4">
        <form method="GET" class="mb-3">
            <div class="input-group style-search" style="max-width: 320px;">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-secondary"></i></span>
                <input type="search" name="search" value="{{ $search }}" class="form-control border-start-0 ps-0" placeholder="Cari Kartu Keluarga..." onchange="this.form.submit()">
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0 text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>No.KK</th>
                        <th>Kepala Keluarga</th>
                        <th>Alamat</th>
                        <th style="width: 100px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kartuKeluargas as $kk)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $kk->nomor_kk }}</td>
                            <td class="fw-semibold">{{ $kk->kepala_keluarga }}</td>
                            <td>{{ $kk->alamat }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.kartu-keluarga.edit', $kk) }}" class="btn btn-sm btn-outline-primary p-1 me-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.kartu-keluarga.destroy', $kk) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data kartu keluarga ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger p-1" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">1</td>
                            <td>1221022709100001</td>
                            <td class="fw-semibold">Tohar Efendi</td>
                            <td>Balangka</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>1221021504020001</td>
                            <td class="fw-semibold">Hasmar</td>
                            <td>Balangka</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary p-1 me-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger p-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>1221021701020001</td>
                            <td class="fw-semibold">Kamal Harahap</td>
                            <td>Balangka</td>
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
