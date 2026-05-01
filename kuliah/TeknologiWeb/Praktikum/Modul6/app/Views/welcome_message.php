<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Praktikum Web</title>
    <style {csp-style-nonce}>
        :root {
            --bg: #f3f7f2;
            --paper: #ffffff;
            --ink: #1f2933;
            --muted: #52606d;
            --accent: #0f766e;
            --accent-2: #1d4ed8;
            --border: #d9e2ec;
            --shadow: 0 16px 30px rgba(15, 23, 42, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Trebuchet MS", "Segoe UI", sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 5% 10%, #d1fae5 0%, transparent 36%),
                radial-gradient(circle at 95% 0%, #bfdbfe 0%, transparent 42%),
                var(--bg);
            min-height: 100vh;
        }

        .container {
            max-width: 980px;
            margin: 0 auto;
            padding: 28px 20px 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 2px solid rgba(15, 118, 110, 0.18);
        }

        .brand {
            margin: 0;
            font-size: 1.1rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .link-pill {
            display: inline-block;
            text-decoration: none;
            color: #ffffff;
            background: linear-gradient(135deg, var(--accent), #14b8a6);
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .hero {
            margin-top: 26px;
            padding: 28px;
            border-radius: 20px;
            color: #ffffff;
            background: linear-gradient(125deg, #0f766e 0%, #1d4ed8 100%);
            box-shadow: var(--shadow);
        }

        .hero h1 {
            margin: 0 0 10px;
            font-size: clamp(1.7rem, 3vw, 2.6rem);
            line-height: 1.2;
        }

        .hero p {
            margin: 0;
            opacity: 0.95;
            max-width: 62ch;
        }

        .grid {
            margin-top: 24px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .card {
            background: var(--paper);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 18px;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.06);
            transition: transform 180ms ease, box-shadow 180ms ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 24px rgba(15, 23, 42, 0.12);
        }

        .card h2 {
            margin: 0 0 8px;
            font-size: 1.2rem;
        }

        .card p {
            margin: 0;
            color: var(--muted);
            font-size: 0.95rem;
            line-height: 1.45;
        }

        .meta {
            margin-top: 24px;
            color: var(--muted);
            font-size: 0.9rem;
        }

        @media (max-width: 860px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <main class="container">
        <header class="topbar">
            <h3 class="brand">Praktikum Teknologi Web</h3>
            <nav class="links">
                <a class="link-pill" href="<?= site_url('country') ?>">Country</a>
                <a class="link-pill" href="<?= site_url('city') ?>">City</a>
                <a class="link-pill" href="<?= site_url('language') ?>">Language</a>
            </nav>
        </header>

        <section class="hero">
            <h1>Dashboard Modul Data World</h1>
            <p>
                Halaman utama untuk akses cepat ke modul CRUD Country, City, dan Language.
                Pilih salah satu modul di bawah untuk mulai kelola data.
            </p>
        </section>

        <section class="grid">
            <a class="card" href="<?= site_url('country') ?>">
                <h2>Country</h2>
                <p>Kelola data negara: kode, nama, benua, dan wilayah.</p>
            </a>

            <a class="card" href="<?= site_url('city') ?>">
                <h2>City</h2>
                <p>Kelola data kota berdasarkan negara, distrik, dan populasi.</p>
            </a>

            <a class="card" href="<?= site_url('language') ?>">
                <h2>Language</h2>
                <p>Kelola data bahasa per negara serta status bahasa resmi.</p>
            </a>
        </section>

        <p class="meta">
            Page rendered in {elapsed_time} seconds, memory usage {memory_usage} MB.
        </p>
    </main>
</body>
</html>
