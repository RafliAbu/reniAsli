<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PengaturanController extends Controller
{
    public function index(): View
    {
        $pengaturan = Pengaturan::first();

        if (! $pengaturan) {
            $pengaturan = Pengaturan::create([
                'nama_desa' => 'Desa Balangka',
                'alamat' => 'Kecamatan Sihapas Barumun, Kabupaten Padang Lawas, Provinsi Sumatera Utara',
                'no_telepon' => '0812-3456-7890',
                'email_desa' => 'desabalangkakecamatansihapas@gmail.com',
                'nama_kepala_desa' => 'MARABAIK HARAHAP',
                'profil_desa' => 'Desa Balangka merupakan salah satu desa yang berada di wilayah Kecamatan Sihapas Barumun, Kabupaten Padang Lawas, Provinsi Sumatera Utara. Sebagai bagian dari wilayah yang kental dengan budaya Padang Lawas, sejarah desa ini tumbuh seiring dengan pembentukan pemukiman awal dan penyebaran masyarakat adat Mandailing dan Batak di sepanjang pesisir sungai yang menjadi urat nadi kehidupan masyarakat setempat. Wilayah ini berkembang dan resmi menjadi bagian dari administrasi Kabupaten Padang Lawas menyusul pemekaran dari wilayah induknya. Saat ini, Desa Balangka terus bertransformasi menjadi komunitas mandiri yang mengandalkan sektor pertanian dan perkebunan, sekaligus menjadi bagian integral dalam pembangunan wilayah Kecamatan Sihapas Barumun.',
                'visi' => '"Terwujudnya Desa Balangka yang maju, mandiri, sejahtera, religius, serta memberikan pelayanan publik yang cepat, transparan, dan berbasis teknologi informasi."',
                'misi' => [
                    'Meningkatkan kualitas pelayanan administrasi kepada masyarakat secara efektif, efisien, dan transparan.',
                    'Mengembangkan potensi desa di bidang pertanian, perkebunan, dan UMKM untuk meningkatkan kesejahteraan masyarakat.',
                    'Meningkatkan kualitas sumber daya manusia melalui pendidikan, pelatihan, dan pemberdayaan masyarakat.',
                    'Mewujudkan tata kelola pemerintahan desa yang akuntabel, partisipatif, dan berintegritas.',
                    'Memanfaatkan teknologi informasi dalam penyelenggaraan pemerintahan dan pelayanan publik.',
                    'Menjaga kerukunan, keamanan, serta melestarikan budaya dan lingkungan desa.',
                ],
                'foto_kepala_desa' => 'pengaturan/foto_kepala_desa.png',
                'foto_struktur' => 'pengaturan/foto_struktur.png',
            ]);
        }

        return view('admin.pengaturan.index', compact('pengaturan'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama_desa' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'email_desa' => ['required', 'email', 'max:255'],
            'nama_kepala_desa' => ['nullable', 'string', 'max:255'],
            'profil_desa' => ['nullable', 'string'],
            'visi' => ['nullable', 'string'],
            'misi_text' => ['nullable', 'string'],
            'foto_kepala_desa' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'foto_ttd_kades' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'foto_profil_desa' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'foto_struktur' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
        ]);

        $pengaturan = Pengaturan::first() ?? new Pengaturan();

        if (! empty($data['misi_text'])) {
            $misiList = array_values(array_filter(array_map('trim', explode("\n", $data['misi_text']))));
            $data['misi'] = $misiList;
        }
        unset($data['misi_text']);

        if ($request->hasFile('foto_kepala_desa')) {
            if ($pengaturan->foto_kepala_desa && Storage::disk('public')->exists($pengaturan->foto_kepala_desa)) {
                Storage::disk('public')->delete($pengaturan->foto_kepala_desa);
            }
            $data['foto_kepala_desa'] = $request->file('foto_kepala_desa')->store('pengaturan', 'public');
        }

        if ($request->hasFile('foto_ttd_kades')) {
            if ($pengaturan->foto_ttd_kades && Storage::disk('public')->exists($pengaturan->foto_ttd_kades)) {
                Storage::disk('public')->delete($pengaturan->foto_ttd_kades);
            }
            $data['foto_ttd_kades'] = $request->file('foto_ttd_kades')->store('pengaturan', 'public');
        }

        if ($request->hasFile('foto_profil_desa')) {
            if ($pengaturan->foto_profil_desa && Storage::disk('public')->exists($pengaturan->foto_profil_desa)) {
                Storage::disk('public')->delete($pengaturan->foto_profil_desa);
            }
            $data['foto_profil_desa'] = $request->file('foto_profil_desa')->store('pengaturan', 'public');
        }

        if ($request->hasFile('foto_struktur')) {
            if ($pengaturan->foto_struktur && Storage::disk('public')->exists($pengaturan->foto_struktur)) {
                Storage::disk('public')->delete($pengaturan->foto_struktur);
            }
            $data['foto_struktur'] = $request->file('foto_struktur')->store('pengaturan', 'public');
        }

        if ($pengaturan->exists) {
            $pengaturan->update($data);
        } else {
            Pengaturan::create($data);
        }

        return back()->with('success', 'Pengaturan profil desa & foto berhasil disimpan.');
    }
}
