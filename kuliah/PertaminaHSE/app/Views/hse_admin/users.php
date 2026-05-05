<?= $this->extend('hse_admin/layout') ?>

<?= $this->section('content') ?>
<div class="stack">
    <section class="hero-panel">
        <div class="hero-grid">
            <div>
                <span class="brand-badge">Manajemen Pengguna</span>
                <h1 class="hero-title">Kelola akses admin, supervisor, dan verifier lapangan.</h1>
                <p class="hero-text">Halaman ini dirancang untuk mengatur siapa yang dapat melihat, memverifikasi, dan menutup laporan keselamatan kerja pada sistem HSE Patrol.</p>
                <div class="hero-actions">
                    <button class="btn btn-primary" type="button" data-toast="Undangan pengguna baru berhasil disiapkan.">Tambah Pengguna</button>
                    <a class="btn btn-secondary" href="/admin/dashboard">Kembali ke Dashboard</a>
                </div>
            </div>
            <div class="mini-overview">
                <div class="mini-tile">
                    <strong><?= count($users) ?> pengguna</strong>
                    <span>Total akun pada demo sistem</span>
                </div>
                <div class="mini-tile">
                    <strong><?= count(array_filter($users, static fn (array $user): bool => $user['status'] === 'Aktif')) ?> aktif</strong>
                    <span>Akun yang dapat mengakses dashboard</span>
                </div>
                <div class="mini-tile">
                    <strong>Role berbasis unit</strong>
                    <span>Pengaturan akses mengikuti area kerja</span>
                </div>
            </div>
        </div>
    </section>

    <section class="card table-card">
        <div class="section-head">
            <div>
                <h3>Daftar pengguna</h3>
                <p>Informasi akun dan aktivitas login terakhir</p>
            </div>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Unit</th>
                        <th>Status</th>
                        <th>Login terakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><strong><?= esc($user['nama']) ?></strong></td>
                            <td><?= esc($user['jabatan']) ?></td>
                            <td><?= esc($user['unit']) ?></td>
                            <td>
                                <span class="status-badge <?= esc($user['status'] === 'Aktif' ? 'is-success' : 'is-neutral') ?>">
                                    <?= esc($user['status']) ?>
                                </span>
                            </td>
                            <td><?= esc($user['last_login']) ?></td>
                            <td>
                                <div class="table-actions">
                                    <button class="btn btn-secondary" type="button" data-toast="Profil <?= esc($user['nama']) ?> siap dibuka.">Detail</button>
                                    <button class="btn btn-soft" type="button" data-toast="Hak akses <?= esc($user['nama']) ?> berhasil disiapkan.">Atur Role</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?= $this->endSection() ?>