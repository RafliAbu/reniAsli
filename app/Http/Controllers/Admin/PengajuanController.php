<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PengajuanController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $pengajuanSurats = PengajuanSurat::with('user')
            ->when($search, function ($query) use ($search) {
                $query->where('jenis_surat', 'like', "%{$search}%")
                    ->orWhere('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.pengajuan.index', compact('pengajuanSurats', 'search'));
    }

    public function persetujuan(Request $request): View
    {
        $status = $request->input('status');
        
        $query = PengajuanSurat::with('user')->latest();

        if ($status && in_array($status, ['Menunggu', 'Dalam Proses', 'Disetujui', 'Ditolak'], true)) {
            $query->where('status', $status);
        } else {
            $status = 'Semua';
        }

        $pengajuanSurats = $query->paginate(15)->withQueryString();

        return view('admin.persetujuan.index', compact('pengajuanSurats', 'status'));
    }

    public function updateStatus(Request $request, PengajuanSurat $pengajuanSurat): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(PengajuanSurat::STATUSES)],
        ]);

        $oldStatus = $pengajuanSurat->status;
        $pengajuanSurat->update($data);

        if ($data['status'] === 'Disetujui' && $oldStatus !== 'Disetujui') {
            $pengajuanSurat->load('user');
            $recipientEmail = $pengajuanSurat->user?->email;
            if ($recipientEmail) {
                try {
                    Mail::to($recipientEmail)->send(new \App\Mail\SuratSelesaiMail($pengajuanSurat));
                } catch (\Throwable $e) {
                    Log::error('Gagal mengirim email notifikasi surat selesai: ' . $e->getMessage());
                }
            }
        }

        return back()->with('success', 'Status pengajuan surat (#' . $pengajuanSurat->id . ') berhasil diperbarui menjadi ' . $data['status'] . '.');
    }

    public function verifikasi(Request $request): View
    {
        $pengajuan = null;
        $nomorSurat = $request->string('nomor_surat')->toString();

        if ($nomorSurat !== '') {
            $id = (int) preg_replace('/\D/', '', $nomorSurat);
            $pengajuan = $id > 0
                ? PengajuanSurat::with('user')->find($id)
                : null;
        }

        return view('admin.persetujuan.verifikasi', compact('pengajuan', 'nomorSurat'));
    }

    public function cetak(PengajuanSurat $pengajuanSurat): View
    {
        $pengajuanSurat->load('user');

        return view('admin.persetujuan.cetak', compact('pengajuanSurat'));
    }
}
