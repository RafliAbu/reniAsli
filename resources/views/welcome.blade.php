<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Resmi Desa Balangka - Kecamatan Sihapas Barumun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1d4ed8;
            --primary-dark: #0f172a;
            --accent-teal: #0f766e;
            --surface-bg: #f8fafc;
        }

        body {
            font-family: Inter, system-ui, -apple-system, sans-serif;
            background-color: var(--surface-bg);
            color: #1e293b;
        }

        .portal-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }

        .hero-banner {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #1d4ed8 100%);
            color: #ffffff;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-banner::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        .service-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 28px;
            height: 100%;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
            border-color: #cbd5e1;
        }

        .service-icon {
            width: 54px;
            height: 54px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .news-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .news-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.1);
        }

        .news-img {
            height: 200px;
            background: #e2e8f0;
            overflow: hidden;
            position: relative;
        }

        .news-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s ease;
        }

        .news-card:hover .news-img img {
            transform: scale(1.05);
        }

        .demo-box {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border: 1px solid #bfdbfe;
            border-radius: 14px;
        }

        .section-title-line {
            width: 60px;
            height: 4px;
            background: var(--primary-blue);
            border-radius: 2px;
            margin: 8px auto 0 auto;
        }

        .misi-card {
            background: #ffffff;
            border-left: 4px solid var(--primary-blue);
            border-radius: 8px;
            padding: 16px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            height: 100%;
        }

        .structure-img-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.1);
            border: 1px solid #cbd5e1;
            background: #ffffff;
        }

        .structure-img-container img {
            width: 100%;
            height: auto;
            max-height: 520px;
            object-fit: contain;
        }

        .potensi-card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            height: 100%;
            transition: all .2s ease;
        }

        .potensi-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.1);
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg portal-navbar sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('portal') }}">
                <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <img src="{{ asset('images/logo_padang_lawas.jpg') }}" alt="Logo Padang Lawas" class="img-fluid" style="max-height: 48px; object-fit: contain;">
                </div>
                <div>
                    <div class="fw-bold fs-6 lh-1 text-dark">Desa Balangka</div>
                    <div class="small text-secondary lh-1 mt-1" style="font-size: 0.78rem;">Kecamatan Sihapas Barumun</div>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-3">
                    <li class="nav-item"><a class="nav-link active fw-semibold" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-secondary" href="#profil">Profil & Visi Misi</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-secondary" href="#struktur">Struktur Desa</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-secondary" href="#potensi">Potensi Desa</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-secondary" href="#berita">Berita Desa</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-secondary" href="#layanan">Layanan Surat</a></li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary px-4 fw-semibold rounded-3">
                                <i class="bi bi-grid-1x2 me-2"></i>Dashboard Admin
                            </a>
                        @else
                            <a href="{{ route('masyarakat.dashboard') }}" class="btn btn-primary px-4 fw-semibold rounded-3">
                                <i class="bi bi-house-door me-2"></i>Dashboard Saya
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary px-4 fw-semibold rounded-3">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary px-4 fw-semibold rounded-3">
                            Daftar Akun
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO BANNER -->
    <section id="beranda" class="hero-banner">
        <div class="container position-relative z-1">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="badge bg-white text-primary px-3 py-2 rounded-pill fw-semibold mb-3 shadow-sm" style="font-size: 0.85rem;">
                        <i class="bi bi-shield-check me-1"></i> Portal Informasi & Layanan Online Resmi
                    </div>
                    <h1 class="display-5 fw-extrabold mb-3 text-white lh-sm">
                        Selamat Datang di Portal Desa Balangka
                    </h1>
                    <p class="lead text-white-50 mb-4 fs-5" style="max-width: 600px;">
                        Kemudahan pengajuan surat online, transparansi administrasi desa, dan pusat informasi publik bagi masyarakat Desa Balangka, Kecamatan Sihapas Barumun, Kabupaten Padang Lawas.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4 py-3 fw-bold text-primary rounded-3 shadow">
                            <i class="bi bi-send-fill me-2"></i> Ajukan Surat Online
                        </a>
                        <a href="#profil" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold rounded-3">
                            Jelajahi Profil Desa
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Quick Demo Credentials Box -->
                    <div class="demo-box p-4 shadow-lg text-dark">
                        <h2 class="h5 fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-key-fill text-primary"></i> Login Cepat Pengujian System
                        </h2>
                        <p class="small text-secondary mb-3">Gunakan akun demo berikut untuk masuk ke sistem:</p>
                        
                        <div class="bg-white p-3 rounded-3 mb-3 border">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold text-primary">👑 Admin Desa</div>
                                    <div class="small text-muted">admin@desabalangka52.com</div>
                                    <div class="small text-muted">Password: <code>password</code></div>
                                </div>
                                <a href="{{ route('login') }}" class="btn btn-sm btn-primary px-3 fw-semibold">Login Admin</a>
                            </div>
                        </div>

                        <div class="bg-white p-3 rounded-3 border">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold text-success">👤 Masyarakat</div>
                                    <div class="small text-muted">sonyamelinda19@gmail.com</div>
                                    <div class="small text-muted">Password: <code>password</code></div>
                                </div>
                                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-success px-3 fw-semibold">Login Warga</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTIK RINGKAS -->
    <section id="statistik" class="py-5 bg-white border-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-6 col-md-4">
                    <div class="stat-card text-center">
                        <div class="display-6 fw-bold text-primary mb-1">{{ $totalPenduduk ?? 250 }}</div>
                        <div class="text-secondary fw-semibold small">Data Penduduk</div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="stat-card text-center">
                        <div class="display-6 fw-bold" style="color: var(--accent-teal);">{{ $totalKK ?? 60 }}</div>
                        <div class="text-secondary fw-semibold small">Kartu Keluarga</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="stat-card text-center">
                        <div class="display-6 fw-bold text-success mb-1">{{ $totalSurat ?? 50 }}</div>
                        <div class="text-secondary fw-semibold small">Pengajuan Surat Terproses</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFIL DESA & KEPALA DESA -->
    <section id="profil" class="py-5">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-4 text-center">
                    <div class="bg-white p-3 rounded-4 shadow-sm border">
                        <div class="rounded-3 overflow-hidden mb-3 border bg-light" style="max-height: 400px;">
                            @if(!empty($pengaturan->foto_kepala_desa))
                                <img src="{{ asset('storage/' . $pengaturan->foto_kepala_desa) }}" alt="Kepala Desa Balangka" class="img-fluid w-100 object-fit-cover">
                            @else
                                <div class="py-5 text-secondary"><i class="bi bi-person-fill fs-1"></i></div>
                            @endif
                        </div>
                        <h2 class="h5 fw-bold mb-1 text-dark">{{ $pengaturan->nama_kepala_desa ?? 'MARABAIK HARAHAP' }}</h2>
                        <span class="badge bg-primary px-3 py-1.5 rounded-pill fw-semibold">Kepala Desa Balangka</span>
                        <p class="small text-secondary mt-2 mb-0">Kecamatan Sihapas Barumun<br>Kabupaten Padang Lawas</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 rounded-pill mb-2">Sejarah & Profil Desa</span>
                    <h2 class="fw-bold display-6 mb-4 text-dark">Profil Desa Balangka</h2>
                    
                    <div class="lead fs-6 text-secondary mb-4 style-paragraph" style="line-height: 1.8;">
                        {!! nl2br(e($pengaturan->profil_desa ?? 'Desa Balangka merupakan salah satu desa yang berada di wilayah Kecamatan Sihapas Barumun, Kabupaten Padang Lawas, Provinsi Sumatera Utara.')) !!}
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 bg-white border rounded-3 d-flex align-items-center gap-3">
                                <div class="bg-primary text-white p-3 rounded-3"><i class="bi bi-geo-alt fs-4"></i></div>
                                <div>
                                    <div class="fw-bold text-dark">Wilayah Administrasi</div>
                                    <div class="small text-secondary">Kec. Sihapas Barumun, Kab. Padang Lawas</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-white border rounded-3 d-flex align-items-center gap-3">
                                <div class="bg-success text-white p-3 rounded-3"><i class="bi bi-envelope-check fs-4"></i></div>
                                <div>
                                    <div class="fw-bold text-dark">Kontak Resmi Email</div>
                                    <div class="small text-secondary">desabalangkakecamatansihapas@gmail.com</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISI & MISI DESA -->
    <section class="py-5 bg-white border-top border-bottom">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 rounded-pill mb-2">Arah Pembangunan</span>
                <h2 class="fw-bold h2 text-dark">Visi & Misi Desa Balangka</h2>
                <div class="section-title-line"></div>
            </div>

            <!-- VISI -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="p-4 p-md-5 rounded-4 text-center text-white" style="background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%); box-shadow: 0 10px 30px rgba(29, 78, 216, 0.2);">
                        <span class="badge bg-white text-primary fw-bold px-3 py-1.5 rounded-pill mb-3" style="font-size: 0.85rem;">VISI DESA</span>
                        <h3 class="h3 fw-bold mb-0 lh-base">
                            {{ $pengaturan->visi ?? '"Terwujudnya Desa Balangka yang maju, mandiri, sejahtera, religius, serta memberikan pelayanan publik yang cepat, transparan, dan berbasis teknologi informasi."' }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- MISI -->
            <div class="row g-4">
                <div class="col-12 text-center mb-2">
                    <h3 class="h4 fw-bold text-dark">Misi Desa</h3>
                </div>
                @php
                    $misiList = $pengaturan->misi ?? [
                        'Meningkatkan kualitas pelayanan administrasi kepada masyarakat secara efektif, efisien, dan transparan.',
                        'Mengembangkan potensi desa di bidang pertanian, perkebunan, dan UMKM untuk meningkatkan kesejahteraan masyarakat.',
                        'Meningkatkan kualitas sumber daya manusia melalui pendidikan, pelatihan, dan pemberdayaan masyarakat.',
                        'Mewujudkan tata kelola pemerintahan desa yang akuntabel, partisipatif, dan berintegritas.',
                        'Memanfaatkan teknologi informasi dalam penyelenggaraan pemerintahan dan pelayanan publik.',
                        'Menjaga kerukunan, keamanan, serta melestarikan budaya dan lingkungan desa.',
                    ];
                @endphp

                @foreach($misiList as $index => $misiItem)
                    <div class="col-md-6 col-lg-4">
                        <div class="misi-card">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-primary text-white rounded-circle d-grid place-items-center fw-bold" style="width: 32px; height: 32px; flex-shrink: 0; font-size: 0.9rem;">
                                    {{ $index + 1 }}
                                </div>
                                <p class="text-secondary small mb-0 fw-medium" style="line-height: 1.6;">
                                    {{ $misiItem }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- STRUKTUR ORGANISASI DESA -->
    <section id="struktur" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 rounded-pill mb-2">Bagan Kepemerintahan</span>
                <h2 class="fw-bold h2 text-dark">Bagan Struktur Organisasi Desa Balangka</h2>
                <p class="text-secondary mb-0">Struktur Pemerintahan Desa dan Badan Permusyawaratan Desa (BPD) Desa Balangka, Kecamatan Sihapas Barumun.</p>
                <div class="section-title-line"></div>
            </div>

            <!-- VISUAL BAGAN STRUKTUR -->
            <div class="bg-white border rounded-4 p-4 p-md-5 shadow-sm">
                <!-- LEVEL 1: KEPALA DESA -->
                <div class="d-flex justify-content-center mb-4">
                    <div class="card border-primary border-2 rounded-3 text-center shadow p-3 bg-white" style="width: 300px;">
                        <div class="badge bg-primary text-white rounded-pill px-3 py-1 mb-2 align-self-center" style="font-size: 0.78rem;">
                            <i class="bi bi-person-workspace me-1"></i> KEPALA DESA
                        </div>
                        <h3 class="h5 fw-extrabold text-dark mb-1">MARABAIK HARAHAP</h3>
                        <div class="small text-muted">Pemimpin Pemerintahan Desa Balangka</div>
                    </div>
                </div>

                <!-- CONNECTOR LINE DOWN 1 -->
                <div class="d-flex justify-content-center mb-4">
                    <div style="width: 2px; height: 30px; background: #cbd5e1;"></div>
                </div>

                <!-- LEVEL 2: SEKRETARIS DESA & BPD -->
                <div class="row g-4 justify-content-center mb-4">
                    <!-- SEKRETARIS DESA -->
                    <div class="col-md-5">
                        <div class="card border-info border-2 rounded-3 text-center shadow-sm p-3 bg-light-subtle h-100">
                            <div class="badge bg-info text-dark rounded-pill px-3 py-1 mb-2 align-self-center fw-bold" style="font-size: 0.78rem;">
                                <i class="bi bi-file-earmark-text me-1"></i> SEKRETARIS DESA
                            </div>
                            <h4 class="h6 fw-bold text-dark mb-1">ARYAN ARPANI HARAHAP</h4>
                            <div class="small text-secondary">Koordinator Pelaksana Administrasi</div>
                        </div>
                    </div>

                    <!-- KETUA BPD -->
                    <div class="col-md-5">
                        <div class="card border-warning border-2 rounded-3 text-center shadow-sm p-3 bg-light-subtle h-100">
                            <div class="badge bg-warning text-dark rounded-pill px-3 py-1 mb-2 align-self-center fw-bold" style="font-size: 0.78rem;">
                                <i class="bi bi-building-gear me-1"></i> KETUA BPD
                            </div>
                            <h4 class="h6 fw-bold text-dark mb-1">DASRI HARAHAP</h4>
                            <div class="small text-secondary">Badan Permusyawaratan Desa</div>
                        </div>
                    </div>
                </div>

                <!-- CONNECTOR LINE DOWN 2 -->
                <div class="d-flex justify-content-center mb-4">
                    <div style="width: 2px; height: 30px; background: #cbd5e1;"></div>
                </div>

                <!-- LEVEL 3: KASI (KEPALA SEKSI) & KAUR (KEPALA URUSAN) -->
                <div class="mb-5">
                    <h4 class="h6 fw-bold text-uppercase text-secondary text-center mb-3">
                        <i class="bi bi-diagram-3 me-1"></i> Kepala Seksi (KASI) & Kepala Urusan (KAUR)
                    </h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="border rounded-3 p-3 bg-white text-center shadow-sm hover-shadow transition">
                                <span class="badge bg-secondary-subtle text-dark fw-bold mb-1">Kasi Pemerintahan</span>
                                <div class="fw-bold text-dark mt-1">MARAONGKU HARAHAP</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded-3 p-3 bg-white text-center shadow-sm hover-shadow transition">
                                <span class="badge bg-secondary-subtle text-dark fw-bold mb-1">Kasi Kesejahteraan</span>
                                <div class="fw-bold text-dark mt-1">MARWAN EFENDI HARAHAP</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded-3 p-3 bg-white text-center shadow-sm hover-shadow transition">
                                <span class="badge bg-secondary-subtle text-dark fw-bold mb-1">Kasi Pelayanan</span>
                                <div class="fw-bold text-dark mt-1">MARA LELO</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 bg-white text-center shadow-sm hover-shadow transition">
                                <span class="badge bg-success-subtle text-success fw-bold mb-1">Kaur Umum dan Perencanaan</span>
                                <div class="fw-bold text-dark mt-1">MUKTI</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 bg-white text-center shadow-sm hover-shadow transition">
                                <span class="badge bg-success-subtle text-success fw-bold mb-1">Kaur Keuangan</span>
                                <div class="fw-bold text-dark mt-1">MARADUGU DAULAY</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LEVEL 4: ANGGOTA BPD -->
                <div class="border-top pt-4 mb-4">
                    <h4 class="h6 fw-bold text-uppercase text-secondary text-center mb-3">
                        <i class="bi bi-people me-1"></i> Pengurus & Anggota BPD (Badan Permusyawaratan Desa)
                    </h4>
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div class="p-2 border rounded text-center bg-light">
                                <div class="small text-muted">Wakil Ketua BPD</div>
                                <div class="fw-bold text-dark small">RAJA SYAHNAN HARAHAP</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 border rounded text-center bg-light">
                                <div class="small text-muted">Sekretaris BPD</div>
                                <div class="fw-bold text-dark small">SARKAWI SIREGAR</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 border rounded text-center bg-light">
                                <div class="small text-muted">Anggota BPD</div>
                                <div class="fw-bold text-dark small">HOTNIDA HARAHAP</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 border rounded text-center bg-light">
                                <div class="small text-muted">Anggota BPD</div>
                                <div class="fw-bold text-dark small">GODUNG</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FOOTER CAMAT SIHAPAS BARUMUN -->
                <div class="p-3 bg-light rounded-3 border d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary text-white p-2.5 rounded-circle d-grid place-items-center">
                            <i class="bi bi-award-fill fs-4"></i>
                        </div>
                        <div>
                            <div class="small fw-bold text-dark">MENGETAHUI: CAMAT SIHAPAS BARUMUN</div>
                            <div class="small text-secondary"><strong>ABDOLLAH HARAHAP, S.Pd, MM</strong> (PEMBINA / NIP. 19780520 200801 1 001)</div>
                        </div>
                    </div>
                    <span class="badge bg-primary px-3 py-2">Desa Balangka &copy; {{ date('Y') }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- POTENSI DESA -->
    <section id="potensi" class="py-5 bg-white border-top border-bottom">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill mb-2">Sumber Daya Alam</span>
                <h2 class="fw-bold h2 text-dark">Potensi Ekonomi Desa Balangka</h2>
                <p class="text-secondary mb-0">Sektor unggulan pertanian dan perkebunan penopang utama kesejahteraan masyarakat.</p>
                <div class="section-title-line bg-success"></div>
            </div>

            <div class="row g-4">
                <!-- Potensi Sawah -->
                <div class="col-md-4">
                    <div class="potensi-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-success text-white p-3 rounded-3 fs-3"><i class="bi bi-flower1"></i></div>
                            <h3 class="h5 fw-bold mb-0 text-dark">Potensi Sawah</h3>
                        </div>
                        <p class="text-secondary small mb-0 style-paragraph" style="line-height: 1.7;">
                            Sawah merupakan salah satu potensi utama Desa Balangka yang dimanfaatkan masyarakat sebagai lahan budidaya padi. Keberadaan lahan sawah berperan penting dalam memenuhi kebutuhan pangan, meningkatkan perekonomian masyarakat, serta menjadi sumber mata pencaharian bagi sebagian besar penduduk desa.
                        </p>
                    </div>
                </div>

                <!-- Pertanian Padi & Jagung -->
                <div class="col-md-4">
                    <div class="potensi-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-warning text-white p-3 rounded-3 fs-3"><i class="bi bi-basket2"></i></div>
                            <h3 class="h5 fw-bold mb-0 text-dark">Sektor Pertanian</h3>
                        </div>
                        <p class="text-secondary small mb-0 style-paragraph" style="line-height: 1.7;">
                            Pertanian di Desa Balangka merupakan salah satu sektor utama yang mendukung perekonomian masyarakat. Komoditas pertanian yang banyak dibudidayakan antara lain padi dan jagung. Sebagian besar masyarakat menggantungkan mata pencahariannya pada sektor pertanian karena didukung oleh lahan yang luas.
                        </p>
                    </div>
                </div>

                <!-- Perkebunan Kelapa Sawit -->
                <div class="col-md-4">
                    <div class="potensi-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-primary text-white p-3 rounded-3 fs-3"><i class="bi bi-tree"></i></div>
                            <h3 class="h5 fw-bold mb-0 text-dark">Kelapa Sawit</h3>
                        </div>
                        <p class="text-secondary small mb-0 style-paragraph" style="line-height: 1.7;">
                            Kelapa sawit di Desa Balangka merupakan sektor perkebunan yang menjadi sumber pendapatan utama masyarakat. Sebagian besar warga membudidayakan kelapa sawit didukung oleh kondisi lingkungan yang sesuai. Hasil panen dijual ke pengolahan sehingga berkontribusi bagi perekonomian desa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BERITA & DOKUMENTASI DESA -->
    <section id="berita" class="py-5">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 rounded-pill mb-2">Informasi Terbaru</span>
                    <h2 class="fw-bold h3 mb-1">Berita & Dokumentasi Kegiatan Desa</h2>
                    <p class="text-secondary mb-0">Kabar terbaru seputar kegiatan dan perkembangan Desa Balangka.</p>
                </div>
            </div>

            <div class="row g-4">
                @forelse ($beritas as $berita)
                    <div class="col-md-6 col-lg-3">
                        <div class="news-card">
                            <div class="news-img">
                                @if(!empty($berita->gambar))
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                                @else
                                    <div class="w-100 h-100 d-grid place-items-center text-muted bg-light">
                                        <i class="bi bi-newspaper fs-1"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-3">
                                <span class="badge bg-primary-subtle text-primary mb-2" style="font-size: 0.75rem;">
                                    {{ $berita->kategori ?? 'Kegiatan Desa' }}
                                </span>
                                <h3 class="h6 fw-bold mb-2 text-dark text-truncate" title="{{ $berita->judul }}">{{ $berita->judul }}</h3>
                                <p class="text-secondary small mb-3 text-truncate" style="max-height: 42px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; white-space: normal;">
                                    {{ $berita->isi_berita }}
                                </p>
                                <div class="small text-muted border-top pt-2 mt-auto d-flex align-items-center gap-1">
                                    <i class="bi bi-calendar3"></i> {{ $berita->tanggal ? $berita->tanggal->translatedFormat('d F Y') : '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        Belum ada berita yang diterbitkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- LAYANAN SURAT DESA -->
    <section id="layanan" class="py-5 bg-white border-top">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 rounded-pill mb-2">Layanan Administrasi</span>
                <h2 class="fw-bold h3 mb-2">Layanan & Persyaratan Surat Online</h2>
                <p class="text-secondary mb-0">Masyarakat dapat mengajukan berbagai dokumen administrasi desa secara cepat online dengan melengkapi persyaratan berikut.</p>
            </div>

            @php
                $layananSuratList = [
                    [
                        'judul' => '1. Surat Keterangan Domisili',
                        'icon' => 'bi-geo-alt-fill',
                        'color' => 'primary',
                        'syarat' => [
                            'Fotokopi KTP pemohon.',
                            'Fotokopi Kartu Keluarga (KK).',
                            'Surat pengantar RT/RW (jika diperlukan).',
                            'Mengisi formulir permohonan.',
                            'Memiliki domisili di Kelurahan Hanopan Sibatu.',
                        ]
                    ],
                    [
                        'judul' => '2. Surat Keterangan Usaha (SKU)',
                        'icon' => 'bi-shop',
                        'color' => 'success',
                        'syarat' => [
                            'Fotokopi KTP.',
                            'Fotokopi KK.',
                            'Surat pengantar RT/RW (jika diperlukan).',
                            'Pas foto ukuran 3×4 (1 lembar).',
                            'Mengisi formulir permohonan.',
                            'Memiliki usaha yang berlokasi di Kelurahan Hanopan Sibatu.',
                        ]
                    ],
                    [
                        'judul' => '3. Surat Keterangan Tidak Mampu (SKTM)',
                        'icon' => 'bi-file-earmark-medical',
                        'color' => 'warning',
                        'syarat' => [
                            'Fotokopi KTP.',
                            'Fotokopi KK.',
                            'Surat pengantar RT/RW (jika diperlukan).',
                            'Mengisi formulir permohonan.',
                            'Bersedia dilakukan verifikasi apabila diperlukan.',
                        ]
                    ],
                    [
                        'judul' => '4. Pengajuan KTP-el',
                        'icon' => 'bi-card-heading',
                        'color' => 'info',
                        'syarat' => [
                            'Fotokopi KK.',
                            'KTP lama (untuk penggantian).',
                            'Surat kehilangan dari Kepolisian (jika KTP hilang).',
                            'Surat pindah (bagi penduduk pindahan).',
                            'Mengisi formulir permohonan.',
                        ]
                    ],
                    [
                        'judul' => '5. Pengajuan Kartu Keluarga (KK)',
                        'icon' => 'bi-people-fill',
                        'color' => 'primary',
                        'syarat' => [
                            'Fotokopi KTP anggota keluarga.',
                            'KK lama (untuk perubahan data).',
                            'Buku Nikah/Akta Perkawinan (jika diperlukan).',
                            'Surat Kelahiran (untuk penambahan anggota keluarga).',
                            'Surat Pindah (bagi penduduk pindahan).',
                            'Mengisi formulir permohonan.',
                        ]
                    ],
                    [
                        'judul' => '6. Surat Pengantar SKCK',
                        'icon' => 'bi-shield-check',
                        'color' => 'danger',
                        'syarat' => [
                            'Fotokopi KTP.',
                            'Fotokopi KK.',
                            'Pas foto 4×6 sesuai ketentuan Kepolisian.',
                            'Mengisi formulir permohonan.',
                            'Surat pengantar RT/RW (jika diperlukan).',
                        ]
                    ],
                    [
                        'judul' => '7. Surat Keterangan Pindah',
                        'icon' => 'bi-box-arrow-right',
                        'color' => 'secondary',
                        'syarat' => [
                            'Fotokopi KTP.',
                            'Fotokopi KK.',
                            'KTP dan KK asli.',
                            'Mengisi formulir perpindahan penduduk.',
                            'Surat pengantar RT/RW (jika diperlukan).',
                        ]
                    ],
                    [
                        'judul' => '8. Surat Keterangan Kelahiran',
                        'icon' => 'bi-person-plus-fill',
                        'color' => 'success',
                        'syarat' => [
                            'Fotokopi KTP kedua orang tua.',
                            'Fotokopi KK.',
                            'Fotokopi Buku Nikah/Akta Perkawinan orang tua.',
                            'Surat keterangan lahir dari Rumah Sakit/Bidan/Puskesmas.',
                            'Mengisi formulir permohonan.',
                        ]
                    ],
                ];
            @endphp

            <div class="row g-4">
                @foreach($layananSuratList as $item)
                    <div class="col-md-6 col-lg-3">
                        <div class="service-card d-flex flex-column h-100 p-4 border rounded-3 bg-white shadow-sm">
                            <div class="service-icon bg-{{ $item['color'] }}-subtle text-{{ $item['color'] }} mb-3">
                                <i class="bi {{ $item['icon'] }}"></i>
                            </div>
                            <h3 class="h6 fw-bold mb-3 text-dark">{{ $item['judul'] }}</h3>
                            <div class="small text-secondary mb-3 flex-grow-1">
                                <div class="fw-semibold text-dark mb-1">Persyaratan:</div>
                                <ul class="ps-3 mb-0 style-paragraph">
                                    @foreach($item['syarat'] as $s)
                                        <li class="mb-1">{{ $s }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-{{ $item['color'] }} w-100 fw-semibold mt-auto">
                                Ajukan Surat <i class="bi bi-arrow-right me-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <img src="{{ asset('images/logo_padang_lawas.jpg') }}" alt="Logo Padang Lawas" class="img-fluid" style="max-height: 38px; object-fit: contain;">
                        </div>
                        <span class="fw-bold fs-5">Desa Balangka</span>
                    </div>
                    <p class="text-white-50 small mb-2" style="max-width: 440px;">
                        Kecamatan Sihapas Barumun, Kabupaten Padang Lawas, Provinsi Sumatera Utara.
                    </p>
                    <p class="text-white-50 small mb-0">
                        <i class="bi bi-envelope-at me-1"></i> desabalangkakecamatansihapas@gmail.com
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="small text-white-50 mb-2">&copy; {{ date('Y') }} Pemerintah Desa Balangka. All Rights Reserved.</div>
                    <div class="small text-white-50">Sistem Informasi & Pelayanan Administrasi Desa Online</div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
