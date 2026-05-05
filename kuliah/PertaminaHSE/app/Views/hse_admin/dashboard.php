<?= $this->extend('hse_admin/layout') ?>

<?= $this->section('content') ?>
<div class="stack">
    <section class="hero-panel">
        <div class="hero-grid">
            <div>
                <span class="brand-badge">Ringkasan Operasional</span>
                <h1 class="hero-title">Dashboard monitoring temuan keselamatan kerja untuk admin HSSE.</h1>
                <p class="hero-text">Pantau laporan dari pekerja lapangan, lihat tren kategori temuan, dan percepat tindak lanjut untuk risiko tinggi di seluruh area operasi Pertamina Gas Divisi ICT.</p>
                <div class="hero-actions">
                    <a class="btn btn-secondary" href="/admin/laporan">Buka Daftar Laporan</a>
                    <a class="btn btn-soft" href="/admin/peta">Lihat Peta Lokasi</a>
                    <button class="btn btn-primary" type="button" data-toast="Ringkasan dashboard berhasil diperbarui.">Refresh Ringkasan</button>
                </div>
            </div>

            <div class="mini-overview">
                <div class="mini-tile">
                    <strong><?= count($recentReports) ?> laporan terbaru</strong>
                    <span>Terpantau pada 48 jam terakhir</span>
                </div>
                <div class="mini-tile">
                    <strong><?= esc($stats[3]['value']) ?> risiko tinggi</strong>
                    <span>Butuh eskalasi dan verifikasi cepat</span>
                </div>
                <div class="mini-tile">
                    <strong><?= esc($stats[1]['value']) ?> selesai</strong>
                    <span>Temuan yang sudah ditutup oleh admin</span>
                </div>
            </div>
        </div>
    </section>

    <section class="cards-4">
        <?php foreach ($stats as $index => $stat) : ?>
            <?php
                $trendClass = match ($index) {
                    0, 1 => 'is-success',
                    2 => 'is-warning',
                    default => 'is-danger',
                };
            ?>
            <article class="card metric">
                <div class="label"><?= esc($stat['label']) ?></div>
                <div class="value"><?= esc($stat['value']) ?></div>
                <div class="meta">
                    <span><?= esc($stat['detail']) ?></span>
                    <span class="trend <?= esc($trendClass) ?>"><?= esc($stat['trend']) ?></span>
                </div>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="cards-2">
        <article class="card chart-card">
            <div class="section-head">
                <div>
                    <h3>Grafik laporan berdasarkan kategori</h3>
                    <p>Distribusi temuan yang masuk berdasarkan jenis kategori</p>
                </div>
                <span class="pill">Total <?= array_sum(array_column($categorySummary, 'value')) ?> laporan</span>
            </div>
            <div class="bar-list">
                <?php foreach ($categorySummary as $item) :
                    $value = (int) $item['value'];
                    $total = max(1, array_sum(array_column($categorySummary, 'value')));
                    $width = round(($value / $total) * 100, 1);
                ?>
                    <div class="bar-item">
                        <div class="bar-head">
                            <strong><?= esc($item['label']) ?></strong>
                            <span><?= esc($value) ?> laporan</span>
                        </div>
                        <div class="bar-track"><div class="bar-fill" style="width: <?= esc($width) ?>%"></div></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>

        <article class="card chart-card">
            <div class="section-head">
                <div>
                    <h3>Grafik laporan berdasarkan risiko</h3>
                    <p>Komposisi tingkat risiko pada laporan temuan</p>
                </div>
                <span class="pill">Monitoring prioritas</span>
            </div>
            <div class="donut-wrap">
                <div class="donut">
                    <div class="donut-label">
                        <strong><?= esc(array_sum(array_column($riskSummary, 'value'))) ?></strong>
                        <span>Laporan</span>
                    </div>
                </div>
                <div class="legend">
                    <?php foreach ($riskSummary as $item) : ?>
                        <?php
                            $dotClass = match ($item['label']) {
                                'Tinggi' => 'danger',
                                'Sedang' => 'warning',
                                default => 'success',
                            };
                        ?>
                        <div class="legend-row">
                            <div class="legend-left">
                                <span class="legend-dot <?= esc($dotClass) ?>"></span>
                                <span><?= esc($item['label']) ?></span>
                            </div>
                            <strong><?= esc($item['value']) ?></strong>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </article>
    </section>

    <section class="cards-2">
        <article class="card table-card">
            <div class="section-head">
                <div>
                    <h3>Laporan terbaru</h3>
                    <p>Ringkasan temuan yang paling baru masuk ke sistem</p>
                </div>
                <a class="btn btn-secondary" href="/admin/laporan">Buka semua</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul laporan</th>
                            <th>Area kerja</th>
                            <th>Risiko</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentReports as $report) : ?>
                            <tr>
                                <td><strong><?= esc($report['id']) ?></strong><br><span class="pill"><?= esc($report['tanggal_label']) ?></span></td>
                                <td><?= esc($report['judul_laporan']) ?></td>
                                <td><?= esc($report['area_kerja']) ?></td>
                                <td><span class="risk-badge <?= esc($report['risk_class']) ?>"><?= esc($report['risk_label']) ?></span></td>
                                <td><span class="status-badge <?= esc($report['status_class']) ?>"><?= esc($report['status_label']) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </article>

        <article class="card list-card">
            <div class="section-head">
                <div>
                    <h3>Aktivitas admin</h3>
                    <p>Jejak tindak lanjut terbaru di dashboard</p>
                </div>
            </div>
            <div class="map-card-list">
                <?php foreach ($activityFeed as $index => $activity) : ?>
                    <div class="location-card">
                        <div class="location-meta">
                            <span class="pill">0<?= $index + 1 ?></span>
                            <span><?= esc($index === 0 ? 'Sekarang' : ($index === 1 ? '15 menit lalu' : '1 jam lalu')) ?></span>
                        </div>
                        <strong><?= esc($activity) ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>
    </section>
</div>
<?= $this->endSection() ?>