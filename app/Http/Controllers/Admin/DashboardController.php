<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $summary = [
            'baru' => PengajuanSurat::where('status', 'Menunggu')->count(),
            'proses' => PengajuanSurat::where('status', 'Dalam Proses')->count(),
            'selesai' => PengajuanSurat::where('status', 'Disetujui')->count(),
            'ditolak' => PengajuanSurat::where('status', 'Ditolak')->count(),
        ];

        $terbaru = PengajuanSurat::with('user')
            ->latest()
            ->take(8)
            ->get();

        return view('admin.dashboard.index', compact('summary', 'terbaru'));
    }
}
