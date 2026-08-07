@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card border rounded-4 shadow-sm w-100 style-phone-frame" style="max-width: 480px;">
            <div class="card-header bg-light border-bottom text-center py-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="small fw-semibold text-secondary">9:41</span>
                    <div class="d-flex gap-1 align-items-center">
                        <i class="bi bi-signal small"></i>
                        <i class="bi bi-wifi small"></i>
                        <i class="bi bi-battery-full small"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 justify-content-center">
                    <div class="rounded-circle bg-primary text-white p-1 d-grid place-items-center" style="width:28px; height:28px;"><i class="bi bi-building small"></i></div>
                    <div class="text-start">
                        <div class="fw-bold small lh-1">Desa Balangka</div>
                        <div class="small text-secondary lh-1" style="font-size: 0.72rem;">Kec. Sihapas Barumun</div>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h5 fw-bold mb-0">Profil Saya</h1>
                    <a href="{{ route('masyarakat.profile.edit') }}" class="btn btn-outline-dark btn-sm py-1 px-2" style="font-size: 0.75rem;">+ Tambah Akun</a>
                </div>

                <div class="mb-4 text-start">
                    <div class="row mb-2">
                        <div class="col-4 text-secondary small fw-semibold">Nama</div>
                        <div class="col-8 small fw-semibold">: {{ $user->name ?? 'Sonya Melinda' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-secondary small fw-semibold">Email</div>
                        <div class="col-8 small text-primary">: {{ $user->email ?? 'sonyamelinda19@gmail.com' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4 text-secondary small fw-semibold">No.HP</div>
                        <div class="col-8 small">: {{ $user->telepon ?? '082306267414' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 text-secondary small fw-semibold">Alamat</div>
                        <div class="col-8 small">: {{ $user->alamat ?? 'Balangka, Kecamatan Sihapas Barumun' }}</div>
                    </div>

                    <div class="text-center pt-2">
                        <a href="{{ route('masyarakat.profile.edit') }}" class="btn btn-outline-dark btn-sm px-4 fw-semibold">
                            Ubah Data
                        </a>
                    </div>
                </div>

                <div class="border-top pt-3">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('masyarakat.dashboard') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 px-0 border-0">
                            <span class="small fw-semibold"><i class="bi bi-house me-2"></i>Dashboard</span>
                            <i class="bi bi-chevron-right small text-secondary"></i>
                        </a>
                        <details class="border-0" open>
                            <summary class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 px-0 border-0" style="cursor: pointer;">
                                <span class="small fw-semibold"><i class="bi bi-file-earmark-text me-2"></i>Pengajuan Surat Online</span>
                                <i class="bi bi-chevron-down small text-secondary"></i>
                            </summary>
                            <div class="ps-3 py-1">
                                <a href="{{ route('masyarakat.pengajuan.create') }}" class="d-block text-decoration-none text-secondary small py-1">• Ajukan Surat</a>
                                <a href="{{ route('masyarakat.pengajuan.status') }}" class="d-block text-decoration-none text-secondary small py-1">• Status Pengajuan Surat</a>
                            </div>
                        </details>
                        <a href="{{ route('masyarakat.profile.show') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 px-0 border-0">
                            <span class="small fw-semibold"><i class="bi bi-person me-2"></i>Pengguna</span>
                            <i class="bi bi-chevron-right small text-secondary"></i>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 px-0 border-0 w-100 text-start bg-transparent">
                                <span class="small fw-semibold text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</span>
                                <i class="bi bi-chevron-right small text-secondary"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-top p-2">
                <div class="d-flex justify-content-around text-center">
                    <a href="{{ route('masyarakat.dashboard') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-house d-block fs-5"></i>Beranda
                    </a>
                    <a href="{{ route('masyarakat.pengajuan.create') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-file-earmark-plus d-block fs-5"></i>Ajukan Surat
                    </a>
                    <a href="{{ route('masyarakat.pengajuan.status') }}" class="text-decoration-none text-secondary small py-1 px-2">
                        <i class="bi bi-clock-history d-block fs-5"></i>Status Desa
                    </a>
                    <a href="{{ route('masyarakat.profile.show') }}" class="text-decoration-none text-primary fw-bold small py-1 px-2">
                        <i class="bi bi-person d-block fs-5"></i>Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
