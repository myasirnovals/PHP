<?= $this->extend('hse_admin/layout') ?>

<?= $this->section('content') ?>
<div class="stack">
    <section class="card form-card">
        <div class="section-head">
            <div>
                <h3>Daftar laporan temuan</h3>
                <p>Cari, filter, dan urutkan laporan temuan keselamatan kerja dari lapangan.</p>
            </div>
            <span class="pill" id="reportCountPill"><?= count($reports) ?> laporan</span>
        </div>

        <div class="filters">
            <div class="field">
                <label for="searchInput">Search</label>
                <input id="searchInput" type="search" placeholder="Cari ID, judul, pelapor, area kerja, atau kategori">
            </div>
            <div class="field">
                <label for="statusFilter">Filter status</label>
                <select id="statusFilter">
                    <?php foreach ($statusOptions as $option) : ?>
                        <option value="<?= esc($option) ?>"><?= esc($option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="categoryFilter">Filter kategori</label>
                <select id="categoryFilter">
                    <?php foreach ($categoryOptions as $option) : ?>
                        <option value="<?= esc($option) ?>"><?= esc($option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="dateFilter">Filter tanggal</label>
                <input id="dateFilter" type="date">
            </div>
            <button class="btn btn-primary" type="button" id="resetFilters">Reset</button>
        </div>
    </section>

    <section class="card table-card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul laporan</th>
                        <th>Pelapor</th>
                        <th>Kategori</th>
                        <th>Area kerja</th>
                        <th>Risiko</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody id="reportTableBody"></tbody>
            </table>
        </div>

        <div class="pager">
            <div class="pager-info" id="pagerInfo">Menampilkan 0 data</div>
            <div class="pager-nav" id="pagerNav"></div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const reports = <?= json_encode($reports, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    const tableBody = document.getElementById('reportTableBody');
    const pagerNav = document.getElementById('pagerNav');
    const pagerInfo = document.getElementById('pagerInfo');
    const reportCountPill = document.getElementById('reportCountPill');
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const categoryFilter = document.getElementById('categoryFilter');
    const dateFilter = document.getElementById('dateFilter');
    const resetFilters = document.getElementById('resetFilters');
    const pageSize = 5;

    let activePage = 1;

    function matchesQuery(report, value) {
        return [
            report.id,
            report.judul_laporan,
            report.pelapor,
            report.kategori,
            report.area_kerja,
            report.tingkat_risiko,
            report.status,
            report.tanggal_label,
        ].join(' ').toLowerCase().includes(value);
    }

    function getFilteredReports() {
        const searchValue = searchInput.value.trim().toLowerCase();
        const statusValue = statusFilter.value;
        const categoryValue = categoryFilter.value;
        const dateValue = dateFilter.value;

        return reports.filter((report) => {
            const matchesSearch = !searchValue || matchesQuery(report, searchValue);
            const matchesStatus = statusValue === 'Semua' || report.status === statusValue;
            const matchesCategory = categoryValue === 'Semua' || report.kategori === categoryValue;
            const matchesDate = !dateValue || report.tanggal === dateValue;
            return matchesSearch && matchesStatus && matchesCategory && matchesDate;
        });
    }

    function renderPagination(totalPages) {
        pagerNav.innerHTML = '';

        if (totalPages <= 1) {
            return;
        }

        const prevButton = document.createElement('button');
        prevButton.className = 'page-btn';
        prevButton.textContent = '‹';
        prevButton.disabled = activePage === 1;
        prevButton.addEventListener('click', () => {
            activePage = Math.max(1, activePage - 1);
            renderTable();
        });
        pagerNav.appendChild(prevButton);

        for (let page = 1; page <= totalPages; page += 1) {
            const button = document.createElement('button');
            button.className = `page-btn ${page === activePage ? 'active' : ''}`;
            button.textContent = String(page);
            button.addEventListener('click', () => {
                activePage = page;
                renderTable();
            });
            pagerNav.appendChild(button);
        }

        const nextButton = document.createElement('button');
        nextButton.className = 'page-btn';
        nextButton.textContent = '›';
        nextButton.disabled = activePage === totalPages;
        nextButton.addEventListener('click', () => {
            activePage = Math.min(totalPages, activePage + 1);
            renderTable();
        });
        pagerNav.appendChild(nextButton);
    }

    function renderTable() {
        const filteredReports = getFilteredReports();
        const totalPages = Math.max(1, Math.ceil(filteredReports.length / pageSize));

        if (activePage > totalPages) {
            activePage = totalPages;
        }

        const startIndex = (activePage - 1) * pageSize;
        const pageReports = filteredReports.slice(startIndex, startIndex + pageSize);

        tableBody.innerHTML = '';

        if (pageReports.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="8">
                        <div class="pill" style="justify-content:center; width:100%; padding:18px;">Tidak ada laporan yang cocok dengan filter saat ini.</div>
                    </td>
                </tr>
            `;
        } else {
            pageReports.forEach((report) => {
                const row = document.createElement('tr');
                row.style.cursor = 'pointer';
                row.addEventListener('click', () => {
                    window.location.href = `/admin/laporan/${encodeURIComponent(report.id)}`;
                });
                row.innerHTML = `
                    <td><strong>${report.id}</strong><br><span class="pill">${report.tanggal_label}</span></td>
                    <td>${report.judul_laporan}</td>
                    <td>${report.pelapor}</td>
                    <td>${report.kategori}</td>
                    <td>${report.area_kerja}</td>
                    <td><span class="risk-badge ${report.risk_class}">${report.risk_label}</span></td>
                    <td><span class="status-badge ${report.status_class}">${report.status_label}</span></td>
                    <td>${report.tanggal_label}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        pagerInfo.textContent = `Menampilkan ${pageReports.length} dari ${filteredReports.length} laporan`;
        reportCountPill.textContent = `${filteredReports.length} laporan`;
        renderPagination(totalPages);
    }

    [searchInput, statusFilter, categoryFilter, dateFilter].forEach((field) => {
        field.addEventListener('input', () => {
            activePage = 1;
            renderTable();
        });
        field.addEventListener('change', () => {
            activePage = 1;
            renderTable();
        });
    });

    resetFilters.addEventListener('click', () => {
        searchInput.value = '';
        statusFilter.value = 'Semua';
        categoryFilter.value = 'Semua';
        dateFilter.value = '';
        activePage = 1;
        renderTable();
        if (window.showToast) {
            window.showToast('Filter laporan telah direset.', 'info', 'Filter');
        }
    });

    renderTable();
</script>
<?= $this->endSection() ?>