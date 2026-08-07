<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArsipSurat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ArsipSuratController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $arsipSurats = ArsipSurat::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nomor_surat', 'like', "%{$search}%")
                    ->orWhere('jenis_surat', 'like', "%{$search}%")
                    ->orWhere('persyaratan_surat', 'like', "%{$search}%");
            })
            ->latest('tanggal_surat')
            ->paginate(10)
            ->withQueryString();

        return view('admin.arsip-surat.index', compact('arsipSurats', 'search'));
    }

    public function create(): View
    {
        return view('admin.arsip-surat.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')->store('surat', 'public');
        }

        ArsipSurat::create($data);

        return redirect()->route('admin.arsip-surat.index')->with('success', 'Arsip surat berhasil ditambahkan.');
    }

    public function edit(ArsipSurat $arsipSurat): View
    {
        return view('admin.arsip-surat.edit', compact('arsipSurat'));
    }

    public function update(Request $request, ArsipSurat $arsipSurat): RedirectResponse
    {
        $data = $this->validatedData($request, $arsipSurat->id);

        if ($request->hasFile('file_surat')) {
            if ($arsipSurat->file_surat) {
                Storage::disk('public')->delete($arsipSurat->file_surat);
            }

            $data['file_surat'] = $request->file('file_surat')->store('surat', 'public');
        }

        $arsipSurat->update($data);

        return redirect()->route('admin.arsip-surat.index')->with('success', 'Arsip surat berhasil diperbarui.');
    }

    public function destroy(ArsipSurat $arsipSurat): RedirectResponse
    {
        if ($arsipSurat->file_surat) {
            Storage::disk('public')->delete($arsipSurat->file_surat);
        }

        $arsipSurat->delete();

        return back()->with('success', 'Arsip surat berhasil dihapus.');
    }

    private function validatedData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'nomor_surat' => ['required', 'string', 'max:100', Rule::unique('arsip_surats', 'nomor_surat')->ignore($ignoreId)],
            'jenis_surat' => ['required', 'string', 'max:255'],
            'persyaratan_surat' => ['required', 'string'],
            'file_surat' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
            'tanggal_surat' => ['required', 'date'],
        ]);
    }
}
