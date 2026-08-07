<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Autentikasi') - Sistem Informasi Desa Balangka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #172033;
            --muted: #6b7280;
            --line: #d9e1ea;
            --primary: #1d4ed8;
            --paper: #f1f5f9;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #e2e8f0 0%, #f8fafc 100%);
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .auth-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 32px 16px;
        }

        .browser-mockup {
            width: min(100%, 480px);
            background: #fff;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, .08);
            overflow: hidden;
        }

        .browser-header {
            background: #e2e8f0;
            padding: 10px 16px;
            border-bottom: 1px solid #cbd5e1;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .browser-dots {
            display: flex;
            gap: 6px;
        }

        .browser-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #94a3b8;
        }

        .browser-url {
            flex: 1;
            background: #fff;
            border-radius: 999px;
            padding: 2px 14px;
            font-size: .8rem;
            color: #64748b;
            text-align: center;
            border: 1px solid #cbd5e1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .auth-body {
            padding: 36px 32px;
        }

        .user-avatar-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #eff6ff;
            color: var(--primary);
            display: grid;
            place-items: center;
            margin: 0 auto 16px;
            font-size: 2rem;
            border: 2px solid #dbeafe;
        }

        .form-control,
        .form-check-input,
        .btn {
            border-radius: 8px;
            padding: 10px 14px;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            font-weight: 600;
            padding: 12px 16px;
        }

        .muted-link {
            color: #2563eb;
            text-decoration: none;
            font-size: .875rem;
        }

        .muted-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <main class="auth-shell">
        <section class="browser-mockup">
            <div class="browser-header">
                <div class="browser-dots">
                    <span class="browser-dot"></span>
                    <span class="browser-dot"></span>
                    <span class="browser-dot"></span>
                </div>
                <div class="browser-url">https://desabalangka52.com</div>
            </div>
            <div class="auth-body">
                @include('partials.flash')
                @yield('content')
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
