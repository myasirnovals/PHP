<?= $this->extend('hse_admin/layout') ?>

<?= $this->section('content') ?>
<div class="stack">
    <section class="hero-panel">
        <div class="hero-grid">
            <div>
                <span class="brand-badge">Peta Lokasi Temuan</span>
                <h1 class="hero-title">Visualisasi lokasi laporan temuan keselamatan kerja.</h1>
                <p class="hero-text">Peta ini menampilkan distribusi koordinat laporan berdasarkan dummy data realistis untuk membantu admin HSSE membaca persebaran temuan dengan cepat.</p>
                <div class="hero-actions">
                    <a class="btn btn-secondary" href="/admin/laporan">Kembali ke Daftar Laporan</a>
                    <button class="btn btn-primary" type="button" data-toast="Peta lokasi temuan berhasil disegarkan.">Segarkan Peta</button>
                </div>
            </div>
            <div class="mini-overview">
                <div class="mini-tile">
                    <strong><?= count($reports) ?> titik lokasi</strong>
                    <span>Seluruh laporan yang sudah terdaftar</span>
                </div>
                <div class="mini-tile">
                    <strong><?= count(array_filter($reports, static fn (array $report): bool => $report['tingkat_risiko'] === 'Tinggi')) ?> risiko tinggi</strong>
                    <span>Prioritas untuk tindak lanjut cepat</span>
                </div>
                <div class="mini-tile">
                    <strong>Indonesia</strong>
                    <span>Area persebaran lintas region operasi</span>
                </div>
            </div>
        </div>
    </section>

    <section class="cards-2">
        <article class="card table-card">
            <div class="section-head">
                <div>
                    <h3>Map placeholder</h3>
                    <p>Representasi visual lokasi laporan pada area operasi</p>
                </div>
            </div>

            <div class="map-frame">
                <div class="map-grid"></div>
                <div class="map-label">Sebaran Temuan HSE Patrol</div>
                <?php foreach ($reports as $report) : ?>
                    <?php
                        $dotClass = match ($report['tingkat_risiko']) {
                            'Tinggi' => 'is-danger',
                            'Sedang' => 'is-warning',
                            default => 'is-success',
                        };
                    ?>
                    <div class="map-pin <?= esc($dotClass) ?>" style="left: <?= esc($report['map_x']) ?>%; top: <?= esc($report['map_y']) ?>%;"></div>
                <?php endforeach; ?>
            </div>
        </article>

        <article class="card table-card">
            <div class="section-head">
                <div>
                    <h3>Daftar lokasi temuan</h3>
                    <p>Koordinat dan status laporan yang ditampilkan pada peta</p>
                </div>
            </div>

            <div class="map-card-list">
                <?php foreach ($reports as $report) : ?>
                    <div class="location-card">
                        <strong><?= esc($report['judul_laporan']) ?></strong>
                        <div class="location-meta">
                            <span><?= esc($report['area_kerja']) ?></span>
                            <span>•</span>
                            <span><?= esc($report['tanggal_label']) ?></span>
                        </div>
                        <div class="location-meta">
                            <span><strong>Koordinat:</strong> <?= esc(number_format($report['latitude'], 4)) ?>, <?= esc(number_format($report['longitude'], 4)) ?></span>
                            <span><strong>Risiko:</strong> <?= esc($report['risk_label']) ?></span>
                            <span><strong>Status:</strong> <?= esc($report['status_label']) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>
    </section>
</div>
<?= $this->endSection() ?>