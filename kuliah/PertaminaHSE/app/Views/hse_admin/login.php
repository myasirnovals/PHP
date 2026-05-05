<?= $this->extend('hse_admin/auth_layout') ?>

<?= $this->section('content') ?>
<div class="auth-shell">
    <div class="auth-panel auth-panel-brand">
        <div class="auth-badge">HSE Patrol Admin</div>
        <h1>Monitoring laporan keselamatan kerja yang lebih cepat, rapi, dan terukur.</h1>
        <p>Masuk ke dashboard admin HSSE untuk memantau temuan lapangan, meninjau risiko, dan mempercepat tindak lanjut di seluruh area operasi Pertamina Gas Divisi ICT.</p>

        <div class="auth-metrics">
            <div class="auth-metric">
                <strong>24</strong>
                <span>Laporan aktif</span>
            </div>
            <div class="auth-metric">
                <strong>5</strong>
                <span>Risiko tinggi</span>
            </div>
            <div class="auth-metric">
                <strong>92%</strong>
                <span>Tingkat penyelesaian</span>
            </div>
        </div>
    </div>

    <div class="auth-panel auth-panel-form">
        <div class="auth-card">
            <div class="auth-card-head">
                <span class="auth-badge soft">Login Admin</span>
                <h2>Masuk ke sistem</h2>
                <p>Gunakan akun admin HSSE untuk mengakses dashboard HSE Patrol.</p>
            </div>

            <form class="auth-form" action="/admin/dashboard" method="get">
                <div class="field">
                    <label for="username">Nama Pengguna</label>
                    <input id="username" name="username" type="text" value="admin.hsse" placeholder="Masukkan nama pengguna">
                </div>
                <div class="field">
                    <label for="password">Kata Sandi</label>
                    <input id="password" name="password" type="password" value="12345678" placeholder="Masukkan kata sandi">
                </div>
                <label class="remember-row">
                    <input type="checkbox" checked>
                    <span>Ingat saya di perangkat ini</span>
                </label>
                <button class="btn btn-primary btn-block" type="submit">Masuk ke Dashboard</button>
                <a class="btn btn-secondary btn-block" href="/admin/dashboard">Buka demo dashboard</a>
            </form>

            <div class="auth-footnote">
                <strong>Akses demo</strong>
                <p>UI ini menggunakan dummy data realistis untuk kebutuhan monitoring dan presentasi internal.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>