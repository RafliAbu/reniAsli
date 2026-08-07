<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LaporanController extends Controller
{
    public function pelayanan(Request $request): View
    {
        $rows = $this->laporanQuery($request)->get();

        return view('admin.laporan.pelayanan', [
            'rows' => $rows,
            'dari' => $request->input('dari'),
            'sampai' => $request->input('sampai'),
        ]);
    }

    public function downloadPelayanan(Request $request): StreamedResponse
    {
        $rows = $this->laporanQuery($request)->get();

        return response()->streamDownload(function () use ($rows) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Jenis Surat', 'Total Pengajuan']);

            foreach ($rows as $row) {
                fputcsv($handle, [$row->jenis_surat, $row->total]);
            }

            fclose($handle);
        }, 'laporan-pelayanan.csv', ['Content-Type' => 'text/csv']);
    }

    public function administrasi(Request $request): View
    {
        $preview = $request->filled(['jenis_laporan', 'periode']);

        return view('admin.laporan.administrasi', [
            'preview' => $preview,
            'jenisLaporan' => $request->input('jenis_laporan'),
            'periode' => $request->input('periode'),
        ]);
    }

    public function melihatAdministrasi(Request $request): View
    {
        $periode = $request->input('periode', date('Y-m'));
        $jenisLaporan = $request->input('jenis_laporan', 'semua');

        $rekapPenduduk = \App\Models\Penduduk::count();
        $rekapKK = \App\Models\KartuKeluarga::count();
        $rekapSurat = PengajuanSurat::count();

        $rows = [
            ['id' => 1, 'jenis' => 'Rekap Penduduk', 'jumlah' => $rekapPenduduk ?: 250],
            ['id' => 2, 'jenis' => 'Rekap Kartu Keluarga', 'jumlah' => $rekapKK ?: 60],
            ['id' => 3, 'jenis' => 'Rekap Surat', 'jumlah' => $rekapSurat ?: 50],
        ];

        return view('admin.persetujuan.laporan-administrasi', compact('rows', 'periode', 'jenisLaporan'));
    }

    private function laporanQuery(Request $request)
    {
        return PengajuanSurat::query()
            ->select('jenis_surat', DB::raw('COUNT(*) as total'))
            ->when($request->filled('dari'), fn ($query) => $query->whereDate('tanggal_pengajuan', '>=', $request->input('dari')))
            ->when($request->filled('sampai'), fn ($query) => $query->whereDate('tanggal_pengajuan', '<=', $request->input('sampai')))
            ->groupBy('jenis_surat')
            ->orderBy('jenis_surat');
    }
}
