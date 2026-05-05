<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($pageTitle ?? 'HSE Patrol Admin') ?></title>
    <meta name="description" content="<?= esc($pageDescription ?? 'Dashboard admin HSE Patrol') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style {csp-style-nonce}>
        :root {
            --navy: #0f2747;
            --navy-2: #15365f;
            --blue: #1f5f99;
            --blue-soft: #dce9f5;
            --bg: #f4f7fb;
            --card: #ffffff;
            --line: #d9e3ee;
            --text: #17304d;
            --muted: #6a7b8f;
            --success: #1f9d55;
            --warning: #f59e0b;
            --danger: #dc2626;
            --shadow: 0 16px 38px rgba(15, 39, 71, 0.08);
            --radius-xl: 28px;
            --radius-lg: 20px;
            --radius-md: 14px;
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            min-height: 100%;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(31, 95, 153, 0.14), transparent 32%),
                radial-gradient(circle at bottom right, rgba(31, 157, 85, 0.08), transparent 28%),
                var(--bg);
            font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body { overflow-x: hidden; }

        a { color: inherit; text-decoration: none; }
        button, input, select, textarea { font: inherit; }

        .app-shell {
            display: grid;
            grid-template-columns: 284px minmax(0, 1fr);
            min-height: 100vh;
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 24px 18px;
            background: linear-gradient(180deg, var(--navy) 0%, #0b1d36 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            gap: 24px;
            box-shadow: 12px 0 30px rgba(15, 39, 71, 0.12);
        }

        .brand {
            padding: 16px 16px 12px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.04);
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(31, 157, 85, 0.18);
            color: #d9f4e4;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .brand h1 { margin: 14px 0 8px; font-size: 18px; line-height: 1.25; }
        .brand p { margin: 0; color: rgba(255, 255, 255, 0.72); font-size: 13px; line-height: 1.7; }

        .nav-group { display: flex; flex-direction: column; gap: 8px; }
        .nav-label {
            padding: 0 14px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 16px;
            color: rgba(255, 255, 255, 0.8);
            transition: 180ms ease;
        }

        .nav-item:hover,
        .nav-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: translateX(3px);
        }

        .nav-icon {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex: 0 0 auto;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px;
            border-radius: 20px;
            background: linear-gradient(180deg, rgba(31, 157, 85, 0.16), rgba(31, 95, 153, 0.1));
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-footer strong { display: block; margin-bottom: 6px; font-size: 14px; }
        .sidebar-footer p { margin: 0; color: rgba(255, 255, 255, 0.7); font-size: 13px; line-height: 1.6; }

        .app-main { min-width: 0; }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 22px 28px;
            background: rgba(244, 247, 251, 0.88);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(217, 227, 238, 0.8);
        }

        .topbar-left h2 { margin: 0 0 4px; font-size: 22px; line-height: 1.2; }
        .topbar-left p { margin: 0; color: var(--muted); font-size: 13px; }

        .topbar-actions { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 999px;
            background: #fff;
            border: 1px solid var(--line);
            color: var(--text);
            box-shadow: 0 8px 20px rgba(15, 39, 71, 0.06);
            font-size: 13px;
            font-weight: 600;
        }

        .chip .dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: var(--success);
            box-shadow: 0 0 0 5px rgba(31, 157, 85, 0.12);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 16px;
            border-radius: 14px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: 180ms ease;
            text-decoration: none;
            font-weight: 700;
        }

        .btn:hover { transform: translateY(-1px); }
        .btn-primary { background: var(--navy); color: #fff; box-shadow: 0 14px 30px rgba(15, 39, 71, 0.18); }
        .btn-secondary { background: #fff; color: var(--navy); border-color: var(--line); }
        .btn-soft { background: var(--blue-soft); color: var(--navy); }

        .content { padding: 28px; }
        .stack { display: grid; gap: 22px; }

        .hero-panel,
        .card {
            background: var(--card);
            border: 1px solid rgba(217, 227, 238, 0.92);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
        }

        .hero-panel {
            padding: 24px;
            background:
                linear-gradient(135deg, rgba(15, 39, 71, 0.98), rgba(21, 54, 95, 0.94)),
                radial-gradient(circle at top right, rgba(31, 157, 85, 0.24), transparent 38%);
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        .hero-panel::after {
            content: '';
            position: absolute;
            inset: auto -120px -110px auto;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.4fr) minmax(260px, 0.6fr);
            gap: 22px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-title { margin: 0 0 12px; font-size: clamp(24px, 2.8vw, 40px); line-height: 1.15; }
        .hero-text { margin: 0 0 20px; color: rgba(255, 255, 255, 0.76); max-width: 62ch; line-height: 1.8; font-size: 14px; }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; }

        .mini-overview { display: grid; gap: 12px; }
        .mini-tile {
            padding: 16px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .mini-tile strong { display: block; margin-bottom: 4px; font-size: 18px; }
        .mini-tile span { color: rgba(255, 255, 255, 0.72); font-size: 13px; }

        .section-head { display: flex; align-items: end; justify-content: space-between; gap: 12px; margin-bottom: 14px; }
        .section-head h3, .section-head h4 { margin: 0; }
        .section-head p { margin: 4px 0 0; color: var(--muted); font-size: 13px; }

        .cards-4, .cards-3, .cards-2 { display: grid; gap: 18px; }
        .cards-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .cards-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .cards-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }

        .metric {
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .metric::after {
            content: '';
            position: absolute;
            inset: auto -40px -40px auto;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: rgba(31, 95, 153, 0.08);
        }

        .metric .label { color: var(--muted); font-size: 13px; margin-bottom: 12px; }
        .metric .value { font-size: 34px; line-height: 1; margin-bottom: 10px; font-weight: 800; }
        .metric .meta { display: flex; align-items: center; justify-content: space-between; gap: 12px; color: var(--muted); font-size: 13px; }

        .trend { padding: 6px 10px; border-radius: 999px; background: var(--blue-soft); color: var(--navy); font-weight: 700; white-space: nowrap; }
        .trend.is-success { background: rgba(31, 157, 85, 0.12); color: var(--success); }
        .trend.is-warning { background: rgba(245, 158, 11, 0.14); color: #b45309; }
        .trend.is-danger { background: rgba(220, 38, 38, 0.12); color: var(--danger); }

        .chart-card, .list-card, .table-card, .form-card { padding: 22px; }
        .bar-list { display: grid; gap: 14px; }
        .bar-item { display: grid; gap: 8px; }
        .bar-item .bar-head { display: flex; align-items: center; justify-content: space-between; gap: 8px; font-size: 13px; }
        .bar-track { height: 12px; border-radius: 999px; background: #e9eff6; overflow: hidden; }
        .bar-fill { height: 100%; border-radius: inherit; background: linear-gradient(90deg, var(--blue), var(--navy)); }

        .bar-fill.success { background: linear-gradient(90deg, #34d399, var(--success)); }
        .bar-fill.warning { background: linear-gradient(90deg, #fbbf24, var(--warning)); }
        .bar-fill.danger { background: linear-gradient(90deg, #f87171, var(--danger)); }

        .donut-wrap { display: grid; grid-template-columns: 200px minmax(0, 1fr); gap: 20px; align-items: center; }

        .donut {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: conic-gradient(var(--danger) 0 28%, var(--warning) 28% 66%, var(--success) 66% 100%);
            position: relative;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.8);
        }

        .donut::after {
            content: '';
            position: absolute;
            inset: 28px;
            border-radius: 50%;
            background: #fff;
            box-shadow: inset 0 0 0 1px rgba(217, 227, 238, 1);
        }

        .donut-label {
            position: absolute;
            inset: 50% auto auto 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            text-align: center;
            color: var(--text);
        }

        .donut-label strong { display: block; font-size: 28px; line-height: 1; }
        .donut-label span { color: var(--muted); font-size: 12px; }

        .legend { display: grid; gap: 12px; }
        .legend-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #fff;
        }

        .legend-left { display: flex; align-items: center; gap: 10px; font-weight: 600; }
        .legend-dot { width: 12px; height: 12px; border-radius: 50%; }
        .legend-dot.danger { background: var(--danger); }
        .legend-dot.warning { background: var(--warning); }
        .legend-dot.success { background: var(--success); }

        .table-responsive {
            overflow-x: auto;
            border-radius: 18px;
            border: 1px solid var(--line);
        }

        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { padding: 16px 14px; text-align: left; border-bottom: 1px solid rgba(217, 227, 238, 0.72); font-size: 14px; vertical-align: top; }
        th { color: var(--muted); font-size: 12px; text-transform: uppercase; letter-spacing: 0.06em; background: #f8fbfe; }
        tr:last-child td { border-bottom: 0; }

        .status-badge,
        .risk-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-badge::before,
        .risk-badge::before { content: ''; width: 8px; height: 8px; border-radius: 50%; }
        .status-badge.is-success, .risk-badge.is-success { background: rgba(31, 157, 85, 0.12); color: var(--success); }
        .status-badge.is-success::before, .risk-badge.is-success::before { background: var(--success); }
        .status-badge.is-warning, .risk-badge.is-warning { background: rgba(245, 158, 11, 0.14); color: #b45309; }
        .status-badge.is-warning::before, .risk-badge.is-warning::before { background: var(--warning); }
        .status-badge.is-danger, .risk-badge.is-danger { background: rgba(220, 38, 38, 0.12); color: var(--danger); }
        .status-badge.is-danger::before, .risk-badge.is-danger::before { background: var(--danger); }
        .status-badge.is-neutral, .risk-badge.is-neutral { background: rgba(106, 123, 143, 0.12); color: var(--muted); }
        .status-badge.is-neutral::before, .risk-badge.is-neutral::before { background: var(--muted); }

        .filters {
            display: grid;
            grid-template-columns: 1.2fr repeat(3, minmax(160px, 0.6fr)) auto;
            gap: 12px;
        }

        .field { display: grid; gap: 8px; }
        .field label { font-size: 12px; color: var(--muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; }
        .field input,
        .field select,
        .field textarea {
            width: 100%;
            padding: 13px 14px;
            border-radius: 14px;
            border: 1px solid var(--line);
            background: #fff;
            color: var(--text);
            outline: none;
            transition: 160ms ease;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: rgba(31, 95, 153, 0.4);
            box-shadow: 0 0 0 4px rgba(31, 95, 153, 0.1);
        }

        .pager { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-top: 16px; }
        .pager-info { color: var(--muted); font-size: 13px; }
        .pager-nav { display: flex; gap: 8px; flex-wrap: wrap; }
        .page-btn {
            min-width: 42px;
            height: 42px;
            border-radius: 12px;
            border: 1px solid var(--line);
            background: #fff;
            color: var(--text);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: 700;
        }

        .page-btn.active,
        .page-btn:hover {
            background: var(--navy);
            color: #fff;
            border-color: var(--navy);
        }

        .detail-grid { display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(320px, 0.9fr); gap: 18px; }
        .detail-photo { min-height: 320px; border-radius: 22px; overflow: hidden; background: linear-gradient(135deg, rgba(15, 39, 71, 0.95), rgba(31, 95, 153, 0.78)); position: relative; }
        .detail-photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .detail-photo .overlay {
            position: absolute;
            inset: auto 16px 16px 16px;
            padding: 12px 14px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            backdrop-filter: blur(10px);
        }

        .detail-photo .overlay strong { display: block; margin-bottom: 4px; }

        .map-frame {
            min-height: 380px;
            border-radius: 24px;
            background:
                linear-gradient(0deg, rgba(255, 255, 255, 0.04), rgba(255, 255, 255, 0.04)),
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.08), transparent 18%),
                linear-gradient(135deg, #d8e4f2 0%, #edf3f9 100%);
            border: 1px solid var(--line);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .map-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(21, 54, 95, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(21, 54, 95, 0.08) 1px, transparent 1px);
            background-size: 56px 56px;
        }

        .map-label {
            position: absolute;
            left: 20px;
            top: 20px;
            padding: 10px 14px;
            border-radius: 14px;
            background: rgba(15, 39, 71, 0.9);
            color: #fff;
            font-size: 13px;
            z-index: 1;
        }

        .map-pin {
            position: absolute;
            width: 18px;
            height: 18px;
            margin-left: -9px;
            margin-top: -9px;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 8px 18px rgba(15, 39, 71, 0.2);
        }

        .map-pin::after {
            content: '';
            position: absolute;
            inset: -12px;
            border-radius: 50%;
            background: currentColor;
            opacity: 0.14;
        }

        .map-pin.is-danger { background: var(--danger); color: var(--danger); }
        .map-pin.is-warning { background: var(--warning); color: var(--warning); }
        .map-pin.is-success { background: var(--success); color: var(--success); }

        .map-card-list { display: grid; gap: 14px; }
        .location-card {
            display: grid;
            gap: 8px;
            padding: 16px;
            border-radius: 18px;
            background: #fff;
            border: 1px solid var(--line);
        }

        .location-card strong { font-size: 15px; }
        .location-meta { display: flex; gap: 8px; flex-wrap: wrap; color: var(--muted); font-size: 13px; }

        .toast-container {
            position: fixed;
            right: 24px;
            bottom: 24px;
            display: grid;
            gap: 10px;
            z-index: 30;
        }

        .toast {
            min-width: 280px;
            max-width: 360px;
            padding: 14px 16px;
            border-radius: 16px;
            color: #fff;
            box-shadow: 0 18px 40px rgba(15, 39, 71, 0.2);
            animation: toast-in 260ms ease;
        }

        .toast.success { background: var(--success); }
        .toast.warning { background: var(--warning); }
        .toast.danger { background: var(--danger); }
        .toast.info { background: var(--navy); }

        .toast strong { display: block; margin-bottom: 4px; }
        .toast p { margin: 0; font-size: 13px; line-height: 1.6; color: rgba(255, 255, 255, 0.92); }

        @keyframes toast-in {
            from { transform: translateY(10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: #fff;
            color: var(--muted);
            font-size: 13px;
        }

        @media (max-width: 1200px) {
            .cards-4 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .cards-3 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .detail-grid,
            .hero-grid,
            .donut-wrap { grid-template-columns: 1fr; }
        }

        @media (max-width: 920px) {
            .app-shell { grid-template-columns: 1fr; }
            .sidebar {
                position: relative;
                height: auto;
                width: auto;
                border-radius: 0 0 28px 28px;
            }

            .topbar {
                padding: 18px 18px 14px;
                flex-direction: column;
                align-items: stretch;
            }

            .content { padding: 18px; }
            .filters,
            .cards-4,
            .cards-3,
            .cards-2 { grid-template-columns: 1fr; }
        }

        @media (max-width: 640px) {
            .nav-item { padding: 12px 14px; }
            .metric .value { font-size: 30px; }
            .hero-panel,
            .card,
            .table-card,
            .chart-card,
            .list-card,
            .form-card { border-radius: 22px; }
            .toast-container {
                left: 14px;
                right: 14px;
                bottom: 14px;
            }

            .toast { min-width: 0; max-width: none; }
        }
    </style>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="brand">
                <span class="brand-badge">HSE Patrol</span>
                <h1>PT Pertamina Gas<br>Divisi ICT</h1>
                <p>Dashboard admin HSSE untuk memantau laporan temuan keselamatan kerja dari lapangan.</p>
            </div>

            <div class="nav-group">
                <span class="nav-label">Navigasi</span>
                <a class="nav-item <?= ($activeMenu ?? '') === 'dashboard' ? 'active' : '' ?>" href="/admin/dashboard">
                    <span class="nav-icon">▣</span>
                    <span>Dashboard Overview</span>
                </a>
                <a class="nav-item <?= ($activeMenu ?? '') === 'laporan' ? 'active' : '' ?>" href="/admin/laporan">
                    <span class="nav-icon">▤</span>
                    <span>Daftar Laporan</span>
                </a>
                <a class="nav-item <?= ($activeMenu ?? '') === 'peta' ? 'active' : '' ?>" href="/admin/peta">
                    <span class="nav-icon">⌖</span>
                    <span>Peta Lokasi Temuan</span>
                </a>
                <a class="nav-item <?= ($activeMenu ?? '') === 'pengguna' ? 'active' : '' ?>" href="/admin/pengguna">
                    <span class="nav-icon">☰</span>
                    <span>Manajemen Pengguna</span>
                </a>
            </div>

            <div class="nav-group">
                <span class="nav-label">Akses Cepat</span>
                <a class="nav-item" href="/admin/login">
                    <span class="nav-icon">⎆</span>
                    <span>Login Admin</span>
                </a>
            </div>

            <div class="sidebar-footer">
                <strong>Monitoring aktif</strong>
                <p>5 temuan butuh tindak lanjut hari ini, termasuk 2 laporan risiko tinggi pada area operasi utama.</p>
            </div>
        </aside>

        <div class="app-main">
            <header class="topbar">
                <div class="topbar-left">
                    <h2><?= esc($pageTitle ?? 'Dashboard') ?></h2>
                    <p><?= esc($pageDescription ?? 'Pemantauan laporan HSSE') ?></p>
                </div>
                <div class="topbar-actions">
                    <div class="chip"><span class="dot"></span>Admin HSSE Aktif</div>
                    <a class="btn btn-secondary" href="/admin/laporan">Lihat Semua Laporan</a>
                    <button class="btn btn-primary" type="button" data-toast="Data dashboard berhasil disinkronkan.">Sinkronkan Data</button>
                </div>
            </header>

            <main class="content">
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <div class="toast-container" id="toastContainer"></div>

    <script>
        const toastContainer = document.getElementById('toastContainer');

        function showToast(message, type = 'success', title = 'Notifikasi') {
            if (!toastContainer) {
                return;
            }

            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `<strong>${title}</strong><p>${message}</p>`;
            toastContainer.appendChild(toast);

            window.setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(10px)';
            }, 2600);

            window.setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        document.querySelectorAll('[data-toast]').forEach((element) => {
            element.addEventListener('click', () => {
                showToast(element.getAttribute('data-toast') || 'Aksi berhasil dijalankan.', 'success');
            });
        });

        window.showToast = showToast;
    </script>

    <?= $this->renderSection('scripts') ?>
</body>
</html>