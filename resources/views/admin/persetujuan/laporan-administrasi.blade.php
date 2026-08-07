@extends('layouts.app')

@section('title', 'Melihat Laporan Administrasi')

@section('content')
    <h1 class="page-title h3 fw-bold mb-4">Melihat Laporan Administrasi</h1>

    <div class="surface p-4 border rounded-3 bg-white mb-4">
        <form method="GET" class="d-flex flex-wrap align-items-center gap-3 mb-4">
            <div class="d-flex align-items-center gap-2">
                <label for="periode" class="form-label mb-0 fw-semibold text-secondary">Periode</label>
                <select name="periode" id="periode" class="form-select form-select-sm" style="width: 140px;">
                    <option value="Mai 2026" selected>Mai 2026</option>
                    <option value="Juni 2026">Juni 2026</option>
                    <option value="Juli 2026">Juli 2026</option>
                </select>
            </div>

            <div class="d-flex align-items-center gap-2">
                <label for="jenis_laporan" class="form-label mb-0 fw-semibold text-secondary">Jenis Laporan</label>
                <select name="jenis_laporan" id="jenis_laporan" class="form-select form-select-sm" style="width: 140px;">
                    <option value="semua" selected>Semua</option>
                    <option value="penduduk">Penduduk</option>
                    <option value="kk">Kartu Keluarga</option>
                    <option value="surat">Surat</option>
                </select>
            </div>

            <button type="submit" class="btn btn-secondary btn-sm px-3 fw-semibold">Tampilkan</button>
        </form>

        <div class="table-responsive" style="max-width: 680px;">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>Jenis Laporan</th>
                        <th style="width: 120px;" class="text-center">Jumlah</th>
                        <th style="width: 90px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            <td class="text-center">{{ $row['id'] }}</td>
                            <td class="fw-semibold">{{ $row['jenis'] }}</td>
                            <td class="text-center">{{ $row['jumlah'] }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.laporan.pelayanan.download') }}" class="btn btn-sm btn-outline-secondary p-1" title="Unduh Laporan">
                                    <i class="bi bi-download"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
