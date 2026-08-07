<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PendudukController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $penduduks = Penduduk::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nik', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.penduduk.index', compact('penduduks', 'search'));
    }

    public function create(): View
    {
        return view('admin.penduduk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Penduduk::create($this->validatedData($request));

        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    public function edit(Penduduk $penduduk): View
    {
        return view('admin.penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, Penduduk $penduduk): RedirectResponse
    {
        $penduduk->update($this->validatedData($request, $penduduk->id));

        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy(Penduduk $penduduk): RedirectResponse
    {
        $penduduk->delete();

        return back()->with('success', 'Data penduduk berhasil dihapus.');
    }

    private function validatedData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'nik' => ['required', 'string', 'max:20', Rule::unique('penduduks', 'nik')->ignore($ignoreId)],
            'nama' => ['required', 'string', 'max:255'],
            'tempat_tanggal_lahir' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'alamat' => ['required', 'string'],
        ]);
    }
}
