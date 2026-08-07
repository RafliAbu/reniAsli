@extends('layouts.app')

@section('title', 'Laporan Pelayanan')

@section('content')
    <h1 class="page-title h3 fw-bold mb-4">Laporan Pelayanan</h1>

    <div class="surface p-4 border rounded-3 bg-white mb-4">
        <form method="GET" class="d-flex flex-wrap align-items-center gap-3 mb-4">
            <div class="d-flex align-items-center gap-2">
                <label for="dari" class="form-label mb-0 fw-semibold text-secondary">Dari</label>
                <input type="date" name="dari" id="dari" value="{{ $dari ?? '2026-05-12' }}" class="form-control form-control-sm" style="width: 160px;">
            </div>
            <div class="d-flex align-items-center gap-2">
                <label for="sampai" class="form-label mb-0 fw-semibold text-secondary">Sampai</label>
                <input type="date" name="sampai" id="sampai" value="{{ $sampai ?? '2026-06-15' }}" class="form-control form-control-sm" style="width: 160px;">
            </div>
            <button type="submit" class="btn btn-secondary btn-sm px-3 fw-semibold">Tampilkan</button>
        </form>

        <div class="table-responsive" style="max-width: 680px;">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>Jenis Surat</th>
                        <th style="width: 120px;" class="text-center">Jumlah</th>
                        <th style="width: 90px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $row->jenis_surat }}</td>
                            <td class="text-center">{{ $row->total }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.laporan.pelayanan.download', ['jenis' => $row->jenis_surat]) }}" class="btn btn-sm btn-outline-secondary p-1" title="Unduh Data">
                                    <i class="bi bi-download"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Surat Keterangan Nikah</td>
                            <td class="text-center">10</td>
                            <td class="text-center">
                                <a href="{{ route('admin.laporan.pelayanan.download') }}" class="btn btn-sm btn-outline-secondary p-1"><i class="bi bi-download"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">Surat Domisili</td>
                            <td class="text-center">10</td>
                            <td class="text-center">
                                <a href="{{ route('admin.laporan.pelayanan.download') }}" class="btn btn-sm btn-outline-secondary p-1"><i class="bi bi-download"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="fw-semibold">Surat Tidak Mampu</td>
                            <td class="text-center">5</td>
                            <td class="text-center">
                                <a href="{{ route('admin.laporan.pelayanan.download') }}" class="btn btn-sm btn-outline-secondary p-1"><i class="bi bi-download"></i></a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="table-light">
                    <tr class="fw-bold">
                        <td colspan="2" class="text-center">Total</td>
                        <td class="text-center">{{ isset($rows) && count($rows) ? $rows->sum('total') : 25 }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
