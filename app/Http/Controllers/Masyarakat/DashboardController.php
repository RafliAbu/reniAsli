<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $userId = Auth::id();
        $summary = [
            'total' => PengajuanSurat::where('user_id', $userId)->count(),
            'proses' => PengajuanSurat::where('user_id', $userId)->whereIn('status', ['Menunggu', 'Dalam Proses'])->count(),
            'selesai' => PengajuanSurat::where('user_id', $userId)->where('status', 'Disetujui')->count(),
            'ditolak' => PengajuanSurat::where('user_id', $userId)->where('status', 'Ditolak')->count(),
        ];
        $pengajuanTerbaru = PengajuanSurat::where('user_id', $userId)->latest()->take(5)->get();
        $beritas = Berita::latest('tanggal')->take(4)->get();

        return view('masyarakat.dashboard.index', compact('summary', 'pengajuanTerbaru', 'beritas'));
    }
}
