<?= $this->extend('hse_admin/layout') ?>

<?= $this->section('content') ?>
<div class="stack">
    <section class="hero-panel">
        <div class="hero-grid">
            <div>
                <span class="brand-badge">Detail Laporan</span>
                <h1 class="hero-title"><?= esc($report['judul_laporan']) ?></h1>
                <p class="hero-text">ID laporan <?= esc($report['id']) ?> dari area kerja <?= esc($report['area_kerja']) ?>. Laporan ini mencatat temuan kategori <?= esc($report['kategori']) ?> dengan tingkat risiko <?= esc($report['tingkat_risiko']) ?>.</p>
                <div class="hero-actions">
                    <a class="btn btn-secondary" href="/admin/laporan">Kembali ke Daftar</a>
                    <button class="btn btn-primary" type="button" id="updateStatusButton">Simpan Perubahan</button>
                </div>
            </div>
            <div class="mini-overview">
                <div class="mini-tile">
                    <strong><?= esc($report['tanggal_label']) ?></strong>
                    <span>Tanggal pelaporan</span>
                </div>
                <div class="mini-tile">
                    <strong><?= esc($report['status_label']) ?></strong>
                    <span>Status laporan saat ini</span>
                </div>
                <div class="mini-tile">
                    <strong><?= esc($report['risk_label']) ?></strong>
                    <span>Tingkat risiko utama</span>
                </div>
            </div>
        </div>
    </section>

    <section class="detail-grid">
        <article class="card table-card">
            <div class="section-head">
                <div>
                    <h3>Informasi temuan</h3>
                    <p>Data lengkap dari laporan yang diterima admin HSSE</p>
                </div>
                <span class="status-badge <?= esc($report['status_class']) ?>" id="statusBadge"><?= esc($report['status_label']) ?></span>
            </div>

            <div class="cards-2" style="margin-bottom:18px;">
                <div class="location-card"><strong>Pelapor</strong><span><?= esc($report['pelapor']) ?></span></div>
                <div class="location-card"><strong>Kategori</strong><span><?= esc($report['kategori']) ?></span></div>
                <div class="location-card"><strong>Area kerja</strong><span><?= esc($report['area_kerja']) ?></span></div>
                <div class="location-card"><strong>Koordinat</strong><span><?= esc(number_format($report['latitude'], 4)) ?>, <?= esc(number_format($report['longitude'], 4)) ?></span></div>
            </div>

            <div class="location-card" style="margin-bottom:18px;">
                <strong>Deskripsi laporan</strong>
                <span><?= esc($report['deskripsi']) ?></span>
            </div>

            <div class="location-card">
                <strong>Catatan admin</strong>
                <span id="adminNoteText"><?= esc($report['catatan_admin']) ?></span>
            </div>
        </article>

        <article class="card table-card">
            <div class="section-head">
                <div>
                    <h3>Foto temuan</h3>
                    <p>Pratinjau dokumentasi lapangan dari pelapor</p>
                </div>
            </div>

            <div class="detail-photo">
                <img src="<?= esc($report['foto']) ?>" alt="Foto temuan <?= esc($report['id']) ?>">
                <div class="overlay">
                    <strong><?= esc($report['judul_laporan']) ?></strong>
                    <span><?= esc($report['area_kerja']) ?></span>
                </div>
            </div>

            <div style="margin-top:18px;" class="map-card-list">
                <?php foreach ($timeline as $item) : ?>
                    <div class="location-card">
                        <div class="location-meta"><span class="pill"><?= esc($item['waktu']) ?></span></div>
                        <strong><?= esc($item['aksi']) ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>
    </section>

    <section class="card form-card">
        <div class="section-head">
            <div>
                <h3>Update status laporan</h3>
                <p>Perbarui status, tambahkan catatan, lalu simpan perubahan sebagai notifikasi demo.</p>
            </div>
        </div>

        <div class="filters" style="grid-template-columns: 1fr 1fr 1fr auto;">
            <div class="field">
                <label for="statusInput">Status</label>
                <select id="statusInput">
                    <?php foreach (['Baru', 'Proses', 'Selesai', 'Ditolak'] as $option) : ?>
                        <option value="<?= esc($option) ?>" <?= $report['status_label'] === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="riskInput">Tingkat risiko</label>
                <select id="riskInput">
                    <?php foreach (['Rendah', 'Sedang', 'Tinggi'] as $option) : ?>
                        <option value="<?= esc($option) ?>" <?= $report['risk_label'] === $option ? 'selected' : '' ?>><?= esc($option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="noteInput">Catatan admin</label>
                <input id="noteInput" type="text" value="<?= esc($report['catatan_admin']) ?>">
            </div>
            <button class="btn btn-primary" type="button" id="saveReportButton">Simpan</button>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const saveReportButton = document.getElementById('saveReportButton');
    const updateStatusButton = document.getElementById('updateStatusButton');
    const statusInput = document.getElementById('statusInput');
    const riskInput = document.getElementById('riskInput');
    const noteInput = document.getElementById('noteInput');
    const statusBadge = document.getElementById('statusBadge');
    const adminNoteText = document.getElementById('adminNoteText');

    const statusClasses = {
        'Baru': 'is-neutral',
        'Proses': 'is-warning',
        'Selesai': 'is-success',
        'Ditolak': 'is-danger',
    };

    function syncBadge() {
        statusBadge.className = `status-badge ${statusClasses[statusInput.value] || 'is-neutral'}`;
        statusBadge.textContent = statusInput.value;
    }

    function saveChanges() {
        syncBadge();
        adminNoteText.textContent = noteInput.value || 'Tidak ada catatan.';
        if (window.showToast) {
            window.showToast(`Status diperbarui menjadi ${statusInput.value} dan catatan admin tersimpan.`, 'success', 'Laporan diperbarui');
        }
    }

    saveReportButton.addEventListener('click', saveChanges);
    updateStatusButton.addEventListener('click', saveChanges);
    statusInput.addEventListener('change', syncBadge);
    riskInput.addEventListener('change', () => {
        if (window.showToast) {
            window.showToast(`Tingkat risiko diubah menjadi ${riskInput.value}.`, 'info', 'Risiko');
        }
    });

    syncBadge();
</script>
<?= $this->endSection() ?>