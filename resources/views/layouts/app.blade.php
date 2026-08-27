<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Sistem Administrasi Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar: #0f172a;
            --sidebar-soft: #1e293b;
            --paper: #f8fafc;
            --surface: #ffffff;
            --ink: #0f172a;
            --muted: #64748b;
            --line: #e2e8f0;
            --blue: #2563eb;
            --blue-hover: #1d4ed8;
            --green: #10b981;
            --red: #ef4444;
            --amber: #f59e0b;
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .app-shell {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 286px;
            background: var(--sidebar);
            color: #e7edf6;
            flex: 0 0 286px;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            padding: 18px 14px;
        }

        .brand {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 10px 10px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, .12);
            margin-bottom: 12px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            background: #f8fafc;
            color: var(--blue);
            display: grid;
            place-items: center;
            font-weight: 800;
            flex: 0 0 auto;
        }

        .brand-title {
            font-size: .95rem;
            line-height: 1.25;
            font-weight: 700;
        }

        .nav-label {
            color: rgba(231, 237, 246, .62);
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            padding: 14px 12px 6px;
        }

        .side-link,
        .side-summary {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #dbe5f1;
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 6px;
            min-height: 42px;
            font-size: .95rem;
            border: 0;
            width: 100%;
            background: transparent;
        }

        .side-link:hover,
        .side-summary:hover,
        .side-link.active,
        details[open] > .side-summary {
            color: #fff;
            background: var(--sidebar-soft);
        }

        .side-link i,
        .side-summary i {
            width: 20px;
            text-align: center;
        }

        .side-summary {
            list-style: none;
            cursor: pointer;
        }

        .side-summary::-webkit-details-marker {
            display: none;
        }

        .side-summary .chevron {
            margin-left: auto;
            transition: transform .15s ease;
        }

        details[open] .chevron {
            transform: rotate(180deg);
        }

        .side-submenu {
            padding: 4px 0 6px 34px;
        }

        .side-submenu .side-link {
            min-height: 36px;
            padding: 8px 10px;
            font-size: .9rem;
            color: rgba(231, 237, 246, .78);
        }

        .main-shell {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 68px;
            background: var(--surface);
            border-bottom: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .content {
            padding: 24px;
        }

        .page-title {
            font-size: clamp(1.35rem, 2vw, 1.75rem);
            font-weight: 800;
            margin: 0;
        }

        .page-subtitle {
            color: var(--muted);
            margin: 4px 0 0;
        }

        .surface {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(23, 32, 51, .05);
        }

        .metric {
            padding: 18px;
            min-height: 118px;
        }

        .metric-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 8px;
            color: #fff;
        }

        .table > :not(caption) > * > * {
            padding: .85rem .9rem;
            vertical-align: middle;
        }

        .table thead th {
            color: #475467;
            font-size: .82rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            background: #f8fafc;
        }

        .btn,
        .form-control,
        .form-select {
            border-radius: 6px;
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            display: inline-grid;
            place-items: center;
            padding: 0;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            min-height: 28px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 700;
            border: 1px solid transparent;
        }

        .status-waiting {
            color: #7a4b00;
            background: #fff5d6;
            border-color: #f5d48a;
        }

        .status-process {
            color: #0f4b99;
            background: #e8f1ff;
            border-color: #b9d3ff;
        }

        .status-done {
            color: #0b5f4f;
            background: #dff7ef;
            border-color: #a7e6d2;
        }

        .status-rejected {
            color: #9f1d16;
            background: #ffe8e5;
            border-color: #ffb9b0;
        }

        .profile-box {
            position: relative;
        }

        .profile-menu {
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            width: 220px;
            padding: 8px;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 18px 45px rgba(23, 32, 51, .14);
            display: none;
            z-index: 30;
        }

        .profile-box[open] .profile-menu {
            display: block;
        }

        .profile-box summary {
            list-style: none;
            cursor: pointer;
        }

        .profile-box summary::-webkit-details-marker {
            display: none;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            display: inline-grid;
            place-items: center;
            background: #dbeafe;
            color: var(--blue);
            font-weight: 800;
        }

        .mobile-menu {
            display: none;
        }

        @media (max-width: 992px) {
            .app-shell {
                display: block;
            }

            .sidebar {
                position: fixed;
                left: -296px;
                top: 0;
                z-index: 50;
                transition: left .18s ease;
            }

            body.sidebar-open .sidebar {
                left: 0;
            }

            .mobile-menu {
                display: inline-grid;
            }

            .topbar {
                padding: 0 16px;
            }

            .content {
                padding: 18px 14px 28px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-logo bg-transparent p-0 overflow-hidden">
                    <img src="{{ asset('images/logo_padang_lawas.jpg') }}" alt="Logo Padang Lawas" style="width: 40px; height: 40px; object-fit: contain;">
                </div>
                <div class="brand-title">Desa Balangka<br>Kecamatan Sihapas Barumun</div>
            </div>

            @auth
                @if (auth()->user()->role === 'admin')
                    <div class="nav-label">Admin Desa</div>
                    <a class="side-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-grid-1x2"></i>Dashboard
                    </a>
                    <details {{ request()->routeIs('admin.penduduk.*', 'admin.kartu-keluarga.*', 'admin.arsip-surat.*') ? 'open' : '' }}>
                        <summary class="side-summary"><i class="bi bi-database"></i>Kelola Data<i class="bi bi-chevron-down chevron"></i></summary>
                        <div class="side-submenu">
                            <a class="side-link {{ request()->routeIs('admin.penduduk.*') ? 'active' : '' }}" href="{{ route('admin.penduduk.index') }}">Data Penduduk</a>
                            <a class="side-link {{ request()->routeIs('admin.kartu-keluarga.*') ? 'active' : '' }}" href="{{ route('admin.kartu-keluarga.index') }}">Kartu Keluarga</a>
                            <a class="side-link {{ request()->routeIs('admin.arsip-surat.*') ? 'active' : '' }}" href="{{ route('admin.arsip-surat.index') }}">Arsip Surat</a>
                        </div>
                    </details>
                    <details {{ request()->routeIs('admin.laporan.*') ? 'open' : '' }}>
                        <summary class="side-summary"><i class="bi bi-file-earmark-bar-graph"></i>Laporan<i class="bi bi-chevron-down chevron"></i></summary>
                        <div class="side-submenu">
                            <a class="side-link {{ request()->routeIs('admin.laporan.pelayanan') ? 'active' : '' }}" href="{{ route('admin.laporan.pelayanan') }}">Laporan Pelayanan</a>
                            <a class="side-link {{ request()->routeIs('admin.laporan.administrasi') ? 'active' : '' }}" href="{{ route('admin.laporan.administrasi') }}">Buat Laporan Administrasi</a>
                        </div>
                    </details>
                    <details {{ request()->routeIs('admin.persetujuan.*', 'admin.verifikasi.*') ? 'open' : '' }}>
                        <summary class="side-summary"><i class="bi bi-shield-check"></i>Persetujuan<i class="bi bi-chevron-down chevron"></i></summary>
                        <div class="side-submenu">
                            <a class="side-link {{ request()->routeIs('admin.persetujuan.index') ? 'active' : '' }}" href="{{ route('admin.persetujuan.index') }}">Meninjau & Menyetujui Surat</a>
                            <a class="side-link {{ request()->routeIs('admin.verifikasi.index') ? 'active' : '' }}" href="{{ route('admin.verifikasi.index') }}">Verifikasi Pengajuan Surat</a>
                            <a class="side-link {{ request()->routeIs('admin.persetujuan.laporan-administrasi') ? 'active' : '' }}" href="{{ route('admin.persetujuan.laporan-administrasi') }}">Melihat Laporan Administrasi</a>
                        </div>
                    </details>
                    <a class="side-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}"><i class="bi bi-newspaper"></i>Kelola Berita</a>
                    <a class="side-link {{ request()->routeIs('admin.pengajuan.*') ? 'active' : '' }}" href="{{ route('admin.pengajuan.index') }}"><i class="bi bi-send"></i>Pengajuan Surat Online</a>
                    <a class="side-link {{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}" href="{{ route('admin.pengguna.index') }}"><i class="bi bi-people"></i>Pengguna</a>
                    <a class="side-link {{ request()->routeIs('admin.pengaturan.*') ? 'active' : '' }}" href="{{ route('admin.pengaturan.index') }}"><i class="bi bi-gear"></i>Pengaturan</a>
                @else
                    <div class="nav-label">Masyarakat</div>
                    <a class="side-link {{ request()->routeIs('masyarakat.dashboard') ? 'active' : '' }}" href="{{ route('masyarakat.dashboard') }}"><i class="bi bi-house-door"></i>Dashboard / Beranda</a>
                    <details {{ request()->routeIs('masyarakat.pengajuan.*') ? 'open' : '' }}>
                        <summary class="side-summary"><i class="bi bi-send"></i>Pengajuan Surat Online<i class="bi bi-chevron-down chevron"></i></summary>
                        <div class="side-submenu">
                            <a class="side-link {{ request()->routeIs('masyarakat.pengajuan.create') ? 'active' : '' }}" href="{{ route('masyarakat.pengajuan.create') }}">Ajukan Surat</a>
                            <a class="side-link {{ request()->routeIs('masyarakat.pengajuan.status') ? 'active' : '' }}" href="{{ route('masyarakat.pengajuan.status') }}">Status Pengajuan Surat</a>
                        </div>
                    </details>
                    <a class="side-link {{ request()->routeIs('masyarakat.profile.*') ? 'active' : '' }}" href="{{ route('masyarakat.profile.show') }}"><i class="bi bi-person"></i>Pengguna</a>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button class="side-link" type="submit"><i class="bi bi-box-arrow-right"></i>Logout</button>
                </form>
            @endauth
        </aside>

        <div class="main-shell">
            <header class="topbar">
                <div class="d-flex align-items-center gap-3 min-w-0">
                    <button type="button" class="btn btn-outline-secondary btn-icon mobile-menu" onclick="document.body.classList.toggle('sidebar-open')" aria-label="Buka menu">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="min-w-0">
                        <div class="fw-bold text-truncate">Desa Balangka, Kecamatan Sihapas Barumun</div>
                        <div class="text-secondary small d-none d-sm-block">Sistem Informasi Pelayanan Administrasi Desa</div>
                    </div>
                </div>

                @auth
                    <details class="profile-box">
                        <summary class="d-flex align-items-center gap-2">
                            @if (auth()->user()->foto_profil)
                                <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}" alt="{{ auth()->user()->name }}" class="avatar">
                            @else
                                <span class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                            @endif
                            <span class="fw-semibold d-none d-md-inline">{{ auth()->user()->name }}</span>
                            <i class="bi bi-chevron-down small text-secondary"></i>
                        </summary>
                        <div class="profile-menu">
                            <div class="px-2 py-2 border-bottom mb-2">
                                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                                <div class="small text-secondary">{{ ucfirst(auth()->user()->role) }}</div>
                            </div>
                            @if (auth()->user()->role === 'masyarakat')
                                <a class="dropdown-item rounded-2 px-2 py-2" href="{{ route('masyarakat.profile.show') }}"><i class="bi bi-person me-2"></i>Profil Saya</a>
                            @else
                                <a class="dropdown-item rounded-2 px-2 py-2" href="{{ route('admin.pengaturan.index') }}"><i class="bi bi-gear me-2"></i>Pengaturan</a>
                            @endif
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item rounded-2 px-2 py-2"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                            </form>
                        </div>
                    </details>
                @endauth
            </header>

            <main class="content">
                @include('partials.flash')
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
