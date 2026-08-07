<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PengajuanController extends Controller
{
    public function create(): View
    {
        $jenisSurats = PengajuanSurat::JENIS_SURAT;

        return view('masyarakat.pengajuan.create', compact('jenisSurats'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'jenis_surat' => ['required', Rule::in(PengajuanSurat::JENIS_SURAT)],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'keperluan' => ['required', 'string'],
            'file_berkas' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
        ], [
            'jenis_surat.required' => 'Pilih jenis surat yang ingin diajukan.',
            'jenis_surat.in' => 'Jenis surat tidak valid.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'keperluan.required' => 'Keperluan pengajuan wajib diisi.',
            'file_berkas.max' => 'Ukuran berkas maksimal 5MB.',
            'file_berkas.mimes' => 'Format berkas harus PDF, JPG, atau PNG.',
        ]);

        $data['user_id'] = Auth::id();
        $data['status'] = 'Menunggu';
        $data['tanggal_pengajuan'] = now()->toDateString();
        
        if ($request->hasFile('file_berkas')) {
            $data['file_berkas'] = $request->file('file_berkas')->store('berkas', 'public');
        } else {
            $data['file_berkas'] = null;
        }

        PengajuanSurat::create($data);

        return redirect()->route('masyarakat.pengajuan.status')->with('success', 'Pengajuan surat berhasil dikirim.');
    }

    public function status(): View
    {
        $pengajuanSurats = PengajuanSurat::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('masyarakat.pengajuan.status', compact('pengajuanSurats'));
    }

    public function show(PengajuanSurat $pengajuanSurat): View
    {
        abort_unless($pengajuanSurat->user_id === Auth::id(), 403);

        return view('masyarakat.pengajuan.show', compact('pengajuanSurat'));
    }

    public function cetak(PengajuanSurat $pengajuanSurat): View
    {
        abort_unless($pengajuanSurat->user_id === Auth::id(), 403);

        return view('admin.persetujuan.cetak', compact('pengajuanSurat'));
    }
}
