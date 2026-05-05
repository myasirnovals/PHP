<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($pageTitle ?? 'Login Admin HSE Patrol') ?></title>
    <meta name="description" content="<?= esc($pageDescription ?? 'Login admin HSE Patrol') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style {csp-style-nonce}>
        :root {
            --navy: #0f2747;
            --blue: #1f5f99;
            --bg: #f4f7fb;
            --card: #ffffff;
            --line: #d9e3ee;
            --text: #17304d;
            --muted: #6a7b8f;
            --success: #1f9d55;
            --shadow: 0 18px 42px rgba(15, 39, 71, 0.12);
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            min-height: 100%;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(31, 95, 153, 0.16), transparent 32%),
                radial-gradient(circle at bottom right, rgba(31, 157, 85, 0.1), transparent 30%),
                var(--bg);
        }

        a { color: inherit; text-decoration: none; }

        .auth-shell {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
        }

        .auth-panel {
            padding: 28px;
            display: flex;
            align-items: center;
        }

        .auth-panel-brand {
            color: #fff;
            background:
                linear-gradient(135deg, rgba(15, 39, 71, 0.98), rgba(21, 54, 95, 0.92)),
                radial-gradient(circle at top right, rgba(31, 157, 85, 0.22), transparent 36%);
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 24px;
        }

        .auth-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(31, 157, 85, 0.18);
            color: #d9f4e4;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .auth-badge.soft {
            background: rgba(31, 95, 153, 0.1);
            color: var(--blue);
        }

        .auth-panel-brand h1 {
            margin: 0;
            max-width: 14ch;
            font-size: clamp(36px, 4.4vw, 62px);
            line-height: 1.04;
        }

        .auth-panel-brand p {
            margin: 0;
            max-width: 56ch;
            color: rgba(255, 255, 255, 0.78);
            font-size: 15px;
            line-height: 1.85;
        }

        .auth-metrics {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            width: 100%;
            max-width: 560px;
        }

        .auth-metric {
            padding: 18px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .auth-metric strong { display: block; font-size: 28px; line-height: 1; margin-bottom: 8px; }
        .auth-metric span { color: rgba(255, 255, 255, 0.72); font-size: 13px; line-height: 1.6; }

        .auth-panel-form { justify-content: center; }

        .auth-card {
            width: 100%;
            max-width: 460px;
            margin: 0 auto;
            padding: 28px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(217, 227, 238, 0.9);
            box-shadow: var(--shadow);
        }

        .auth-card-head h2 { margin: 14px 0 8px; font-size: 30px; line-height: 1.1; }
        .auth-card-head p { margin: 0; color: var(--muted); line-height: 1.75; }

        .auth-form { display: grid; gap: 14px; margin-top: 24px; }
        .field { display: grid; gap: 8px; }
        .field label {
            font-size: 12px;
            color: var(--muted);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .field input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 16px;
            border: 1px solid var(--line);
            outline: none;
            background: #fff;
            color: var(--text);
        }

        .field input:focus {
            border-color: rgba(31, 95, 153, 0.45);
            box-shadow: 0 0 0 4px rgba(31, 95, 153, 0.1);
        }

        .remember-row {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--muted);
            font-size: 14px;
        }

        .remember-row input { width: 18px; height: 18px; accent-color: var(--navy); }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 16px;
            border-radius: 14px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: 180ms ease;
            font-weight: 800;
        }

        .btn:hover { transform: translateY(-1px); }
        .btn-primary { background: var(--navy); color: #fff; }
        .btn-secondary { background: #fff; color: var(--navy); border-color: var(--line); }
        .btn-block { width: 100%; }

        .auth-footnote {
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid var(--line);
        }

        .auth-footnote strong { display: block; margin-bottom: 8px; }
        .auth-footnote p { margin: 0; color: var(--muted); line-height: 1.7; }

        @media (max-width: 980px) {
            .auth-shell { grid-template-columns: 1fr; }
            .auth-panel-brand { padding-bottom: 38px; }
            .auth-panel-brand h1 { max-width: none; }
            .auth-metrics { grid-template-columns: 1fr; max-width: none; }
        }

        @media (max-width: 640px) {
            .auth-panel { padding: 18px; }
            .auth-card { padding: 20px; border-radius: 22px; }
            .auth-card-head h2 { font-size: 24px; }
        }
    </style>
</head>
<body>
    <?= $this->renderSection('content') ?>
</body>
</html>