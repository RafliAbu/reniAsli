<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class KartuKeluargaController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $kartuKeluargas = KartuKeluarga::query()
            ->when($search, function ($query) use ($search) {
                $query->where('no_kk', 'like', "%{$search}%")
                    ->orWhere('kepala_keluarga', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.kartu-keluarga.index', compact('kartuKeluargas', 'search'));
    }

    public function create(): View
    {
        return view('admin.kartu-keluarga.create');
    }

    public function store(Request $request): RedirectResponse
    {
        KartuKeluarga::create($this->validatedData($request));

        return redirect()->route('admin.kartu-keluarga.index')->with('success', 'Data kartu keluarga berhasil ditambahkan.');
    }

    public function edit(KartuKeluarga $kartuKeluarga): View
    {
        return view('admin.kartu-keluarga.edit', compact('kartuKeluarga'));
    }

    public function update(Request $request, KartuKeluarga $kartuKeluarga): RedirectResponse
    {
        $kartuKeluarga->update($this->validatedData($request, $kartuKeluarga->id));

        return redirect()->route('admin.kartu-keluarga.index')->with('success', 'Data kartu keluarga berhasil diperbarui.');
    }

    public function destroy(KartuKeluarga $kartuKeluarga): RedirectResponse
    {
        $kartuKeluarga->delete();

        return back()->with('success', 'Data kartu keluarga berhasil dihapus.');
    }

    private function validatedData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'no_kk' => ['required', 'string', 'max:20', Rule::unique('kartu_keluargas', 'no_kk')->ignore($ignoreId)],
            'kepala_keluarga' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'jumlah_anggota' => ['required', 'integer', 'min:1'],
        ]);
    }
}
