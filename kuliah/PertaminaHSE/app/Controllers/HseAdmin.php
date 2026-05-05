<?php

namespace App\Controllers;

class HseAdmin extends BaseController
{
    public function login(): string
    {
        return view('hse_admin/login', [
            'pageTitle' => 'Login Admin HSE Patrol',
            'pageDescription' => 'Akses admin HSSE untuk memantau laporan temuan keselamatan kerja.',
        ]);
    }

    public function dashboard(): string
    {
        $reports = $this->reportCatalog();

        return view('hse_admin/dashboard', [
            'pageTitle' => 'Dashboard Overview',
            'pageDescription' => 'Ringkasan laporan keselamatan kerja, tren kategori, dan distribusi risiko.',
            'activeMenu' => 'dashboard',
            'stats' => $this->buildStats($reports),
            'categorySummary' => $this->buildCategorySummary($reports),
            'riskSummary' => $this->buildRiskSummary($reports),
            'recentReports' => array_slice($reports, 0, 5),
            'activityFeed' => [
                'Verifikasi lapangan untuk laporan HSE-2026-004 telah dijadwalkan ulang ke pukul 14.30 WIB.',
                'Temuan risiko tinggi di area compressor station sudah diteruskan ke supervisor operasi.',
                '5 laporan terbaru masuk dari tim inspeksi kontraktor pada shift pagi.',
            ],
        ]);
    }

    public function reports(): string
    {
        $reports = $this->reportCatalog();

        return view('hse_admin/reports', [
            'pageTitle' => 'Daftar Laporan',
            'pageDescription' => 'Cari, filter, dan pantau laporan temuan keselamatan kerja.',
            'activeMenu' => 'laporan',
            'reports' => $reports,
            'statusOptions' => ['Semua', 'Baru', 'Proses', 'Selesai', 'Ditolak'],
            'categoryOptions' => ['Semua', 'APD', 'Housekeeping', 'Pekerjaan Panas', 'Scaffolding', 'Lifting', 'Kelistrikan'],
        ]);
    }

    public function detail(string $id): string
    {
        $reports = $this->reportCatalog();
        $selectedReport = $this->findReport($reports, $id) ?? $reports[0];

        return view('hse_admin/detail', [
            'pageTitle' => 'Detail Laporan',
            'pageDescription' => 'Lihat detail temuan, foto lapangan, dan pembaruan status laporan.',
            'activeMenu' => 'laporan',
            'report' => $selectedReport,
            'timeline' => [
                ['waktu' => '08:12', 'aksi' => 'Laporan diterima dari pelapor lapangan.'],
                ['waktu' => '08:20', 'aksi' => 'Admin HSSE memberi status awal: Baru.'],
                ['waktu' => '09:05', 'aksi' => 'Temuan diklasifikasikan sebagai risiko tinggi dan diteruskan ke supervisor.'],
            ],
        ]);
    }

    public function map(): string
    {
        $reports = $this->reportCatalog();

        return view('hse_admin/map', [
            'pageTitle' => 'Peta Lokasi Temuan',
            'pageDescription' => 'Visualisasi lokasi laporan temuan keselamatan kerja.',
            'activeMenu' => 'peta',
            'reports' => $reports,
        ]);
    }

    public function users(): string
    {
        return view('hse_admin/users', [
            'pageTitle' => 'Manajemen Pengguna',
            'pageDescription' => 'Kelola akses admin, supervisor, dan verifier lapangan.',
            'activeMenu' => 'pengguna',
            'users' => $this->buildUsers(),
        ]);
    }

    private function reportCatalog(): array
    {
        $reports = [
            [
                'id' => 'HSE-2026-001',
                'judul_laporan' => 'Guardrail jalur inspeksi longgar di area compressor station',
                'pelapor' => 'Andi Saputra - Kontraktor PT Bina Karya',
                'kategori' => 'APD',
                'area_kerja' => 'Compressor Station Cibitung',
                'tingkat_risiko' => 'Tinggi',
                'status' => 'Proses',
                'tanggal' => '2026-05-04',
                'latitude' => -6.2781,
                'longitude' => 106.8854,
                'deskripsi' => 'Guardrail di jalur inspeksi sisi timur terlihat longgar pada dua titik sambungan dan berpotensi menyebabkan terpeleset saat hujan.',
                'catatan_admin' => 'Menunggu validasi teknisi maintenance dan pengamanan area sementara.',
            ],
            [
                'id' => 'HSE-2026-002',
                'judul_laporan' => 'Housekeeping buruk di akses unloading material',
                'pelapor' => 'Siti Rahma - Operator Lapangan',
                'kategori' => 'Housekeeping',
                'area_kerja' => 'Terminal LPG Gresik',
                'tingkat_risiko' => 'Sedang',
                'status' => 'Baru',
                'tanggal' => '2026-05-04',
                'latitude' => -7.1711,
                'longitude' => 112.6546,
                'deskripsi' => 'Material sisa pekerjaan dan kabel sementara masih menumpuk pada area akses kendaraan forklift.',
                'catatan_admin' => 'Belum ditindaklanjuti.',
            ],
            [
                'id' => 'HSE-2026-003',
                'judul_laporan' => 'Pekerja tidak menggunakan full body harness saat kerja ketinggian',
                'pelapor' => 'Budi Kurniawan - Supervisor Kontraktor',
                'kategori' => 'Pekerjaan Panas',
                'area_kerja' => 'Fuel Gas Metering Station Karawang',
                'tingkat_risiko' => 'Tinggi',
                'status' => 'Selesai',
                'tanggal' => '2026-05-03',
                'latitude' => -6.3012,
                'longitude' => 107.3018,
                'deskripsi' => 'Satu pekerja ditemukan tidak menggunakan full body harness saat inspeksi pada platform setinggi 4 meter.',
                'catatan_admin' => 'Pekerja dihentikan sementara, toolbox meeting ulang sudah dilakukan.',
            ],
            [
                'id' => 'HSE-2026-004',
                'judul_laporan' => 'Label kabel panel kontrol memudar dan sulit dibaca',
                'pelapor' => 'Dewi Lestari - Teknisi Instrument',
                'kategori' => 'Kelistrikan',
                'area_kerja' => 'Control Room Cirebon',
                'tingkat_risiko' => 'Sedang',
                'status' => 'Proses',
                'tanggal' => '2026-05-02',
                'latitude' => -6.7339,
                'longitude' => 108.5587,
                'deskripsi' => 'Identifikasi kabel pada panel kontrol utama memudar sehingga berpotensi menyulitkan proses isolasi saat troubleshooting.',
                'catatan_admin' => 'Penggantian label dijadwalkan pada shift malam.',
            ],
            [
                'id' => 'HSE-2026-005',
                'judul_laporan' => 'Scaffold belum memiliki akses tag hijau',
                'pelapor' => 'Rudi Hartono - Safety Officer',
                'kategori' => 'Scaffolding',
                'area_kerja' => 'Pigging Station Palembang',
                'tingkat_risiko' => 'Tinggi',
                'status' => 'Ditolak',
                'tanggal' => '2026-05-02',
                'latitude' => -2.9909,
                'longitude' => 104.7561,
                'deskripsi' => 'Scaffold masih menunggu inspeksi final namun sudah dipakai untuk menyimpan material ringan di level dua.',
                'catatan_admin' => 'Tidak dapat diproses karena lokasi sudah ditutup dan tidak ada bukti foto tambahan.',
            ],
            [
                'id' => 'HSE-2026-006',
                'judul_laporan' => 'Selang pemadam tidak tergulung rapi di fire station',
                'pelapor' => 'Maya Andini - Admin Site',
                'kategori' => 'Housekeeping',
                'area_kerja' => 'Fire Station KM 57',
                'tingkat_risiko' => 'Rendah',
                'status' => 'Selesai',
                'tanggal' => '2026-05-01',
                'latitude' => -6.4017,
                'longitude' => 107.2464,
                'deskripsi' => 'Selang hydrant berada di lantai setelah digunakan untuk uji tekanan, perlu penataan ulang agar akses tetap aman.',
                'catatan_admin' => 'Sudah dibereskan dan difoto ulang oleh petugas.',
            ],
            [
                'id' => 'HSE-2026-007',
                'judul_laporan' => 'APD pekerja tamu belum lengkap saat masuk area operasi',
                'pelapor' => 'Fajar Nugraha - Tim Verifikasi',
                'kategori' => 'APD',
                'area_kerja' => 'Gate Operasi Dumai',
                'tingkat_risiko' => 'Sedang',
                'status' => 'Proses',
                'tanggal' => '2026-05-01',
                'latitude' => 1.6777,
                'longitude' => 101.4458,
                'deskripsi' => 'Satu pekerja tamu hanya menggunakan helm tanpa rompi reflektif dan kaca mata safety sesuai standar area operasi.',
                'catatan_admin' => 'Menunggu konfirmasi dari pihak vendor terkait kelengkapan APD.',
            ],
            [
                'id' => 'HSE-2026-008',
                'judul_laporan' => 'Tumpahan oli kecil di jalur akses kendaraan ringan',
                'pelapor' => 'Nina Oktaviani - Petugas HSE',
                'kategori' => 'Housekeeping',
                'area_kerja' => 'Access Road Batam Metering',
                'tingkat_risiko' => 'Rendah',
                'status' => 'Baru',
                'tanggal' => '2026-04-30',
                'latitude' => 1.1393,
                'longitude' => 104.0048,
                'deskripsi' => 'Terdapat tumpahan oli kecil pada jalur masuk kendaraan ringan dekat pos keamanan.',
                'catatan_admin' => 'Belum dilakukan pembersihan lapangan.',
            ],
            [
                'id' => 'HSE-2026-009',
                'judul_laporan' => 'Papan peringatan area terbatas hilang setelah hujan lebat',
                'pelapor' => 'Arif Setiawan - Kontraktor',
                'kategori' => 'Scaffolding',
                'area_kerja' => 'Jalur Pipa Onshore Lampung',
                'tingkat_risiko' => 'Sedang',
                'status' => 'Proses',
                'tanggal' => '2026-04-30',
                'latitude' => -5.4501,
                'longitude' => 105.2665,
                'deskripsi' => 'Sign board yang menandai area terbatas ditemukan terlepas setelah hujan dan angin kencang pada malam sebelumnya.',
                'catatan_admin' => 'Menunggu pemasangan ulang oleh tim proyek.',
            ],
            [
                'id' => 'HSE-2026-010',
                'judul_laporan' => 'Prosedur isolasi listrik belum dipasang di panel sekunder',
                'pelapor' => 'Raka Pratama - Teknisi Listrik',
                'kategori' => 'Kelistrikan',
                'area_kerja' => 'Main Power House Medan',
                'tingkat_risiko' => 'Tinggi',
                'status' => 'Baru',
                'tanggal' => '2026-04-29',
                'latitude' => 3.5952,
                'longitude' => 98.6722,
                'deskripsi' => 'Panel sekunder belum memiliki label isolasi kerja sehingga memerlukan verifikasi sebelum pekerjaan maintenance lanjutan.',
                'catatan_admin' => 'Perlu eskalasi segera ke supervisor kelistrikan.',
            ],
        ];

        $latitudes = array_column($reports, 'latitude');
        $longitudes = array_column($reports, 'longitude');
        $minLatitude = min($latitudes);
        $maxLatitude = max($latitudes);
        $minLongitude = min($longitudes);
        $maxLongitude = max($longitudes);

        return array_map(
            fn (array $report): array => $this->prepareReport($report, $minLatitude, $maxLatitude, $minLongitude, $maxLongitude),
            $reports
        );
    }

    private function prepareReport(array $report, float $minLatitude, float $maxLatitude, float $minLongitude, float $maxLongitude): array
    {
        $statusClass = match ($report['status']) {
            'Selesai' => 'is-success',
            'Proses' => 'is-warning',
            'Ditolak' => 'is-danger',
            default => 'is-neutral',
        };

        $riskClass = match ($report['tingkat_risiko']) {
            'Tinggi' => 'is-danger',
            'Sedang' => 'is-warning',
            default => 'is-success',
        };

        $report['tanggal_label'] = date('d M Y', strtotime($report['tanggal']));
        $report['status_class'] = $statusClass;
        $report['risk_class'] = $riskClass;
        $report['status_label'] = $report['status'];
        $report['risk_label'] = $report['tingkat_risiko'];
        $report['map_x'] = $this->normalizePosition($report['longitude'], $minLongitude, $maxLongitude, 8, 84);
        $report['map_y'] = $this->normalizePosition($report['latitude'], $minLatitude, $maxLatitude, 14, 74, true);
        $report['foto'] = $this->buildPhotoDataUri($report['id'], $report['judul_laporan']);

        return $report;
    }

    private function normalizePosition(float $value, float $min, float $max, float $start, float $range, bool $invert = false): float
    {
        if ($max === $min) {
            return $start + ($range / 2);
        }

        $progress = ($value - $min) / ($max - $min);
        if ($invert) {
            $progress = 1 - $progress;
        }

        return $start + ($progress * $range);
    }

    private function buildPhotoDataUri(string $id, string $title): string
    {
        $label = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="960" height="640" viewBox="0 0 960 640">
  <defs>
    <linearGradient id="bg" x1="0" x2="1" y1="0" y2="1">
      <stop offset="0%" stop-color="#0f2747"/>
      <stop offset="100%" stop-color="#1f5f99"/>
    </linearGradient>
    <linearGradient id="overlay" x1="0" x2="0" y1="0" y2="1">
      <stop offset="0%" stop-color="rgba(255,255,255,0.14)"/>
      <stop offset="100%" stop-color="rgba(255,255,255,0.02)"/>
    </linearGradient>
  </defs>
  <rect width="960" height="640" rx="32" fill="url(#bg)"/>
  <rect x="32" y="32" width="896" height="576" rx="28" fill="url(#overlay)" stroke="rgba(255,255,255,0.18)"/>
  <circle cx="182" cy="164" r="84" fill="rgba(255,255,255,0.08)"/>
  <circle cx="752" cy="184" r="128" fill="rgba(255,255,255,0.06)"/>
  <rect x="96" y="316" width="768" height="156" rx="24" fill="rgba(255,255,255,0.10)"/>
  <path d="M160 440l88-96 62 48 56-40 136 88 98-120 140 120" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
  <rect x="116" y="116" width="146" height="52" rx="26" fill="#1f9d55"/>
  <text x="189" y="149" text-anchor="middle" font-size="22" font-family="Arial, sans-serif" fill="#ffffff">Temuan Lapangan</text>
  <text x="96" y="538" font-size="34" font-family="Arial, sans-serif" fill="#ffffff" font-weight="700">{$id}</text>
  <text x="96" y="580" font-size="24" font-family="Arial, sans-serif" fill="rgba(255,255,255,0.88)">{$label}</text>
</svg>
SVG;

        return 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($svg);
    }

    private function buildStats(array $reports): array
    {
        $total = count($reports);
        $completed = count(array_filter($reports, static fn (array $report): bool => $report['status'] === 'Selesai'));
        $inProgress = count(array_filter($reports, static fn (array $report): bool => $report['status'] === 'Proses'));
        $highRisk = count(array_filter($reports, static fn (array $report): bool => $report['tingkat_risiko'] === 'Tinggi'));

        return [
            ['label' => 'Total Laporan', 'value' => $total, 'detail' => 'Masuk minggu ini', 'trend' => '+12%'],
            ['label' => 'Selesai', 'value' => $completed, 'detail' => 'Telah ditutup', 'trend' => '+8%'],
            ['label' => 'Sedang Diproses', 'value' => $inProgress, 'detail' => 'Butuh tindak lanjut', 'trend' => 'Stabil'],
            ['label' => 'Risiko Tinggi', 'value' => $highRisk, 'detail' => 'Perlu eskalasi', 'trend' => 'Prioritas'],
        ];
    }

    private function buildCategorySummary(array $reports): array
    {
        $summary = [];
        $order = ['APD', 'Housekeeping', 'Pekerjaan Panas', 'Scaffolding', 'Lifting', 'Kelistrikan'];

        foreach ($order as $category) {
            $summary[] = [
                'label' => $category,
                'value' => count(array_filter($reports, static fn (array $report): bool => $report['kategori'] === $category)),
            ];
        }

        return $summary;
    }

    private function buildRiskSummary(array $reports): array
    {
        $summary = [];
        foreach (['Tinggi', 'Sedang', 'Rendah'] as $risk) {
            $summary[] = [
                'label' => $risk,
                'value' => count(array_filter($reports, static fn (array $report): bool => $report['tingkat_risiko'] === $risk)),
            ];
        }

        return $summary;
    }

    private function findReport(array $reports, string $id): ?array
    {
        foreach ($reports as $report) {
            if ($report['id'] === $id) {
                return $report;
            }
        }

        return null;
    }

    private function buildUsers(): array
    {
        return [
            [
                'nama' => 'Nabila Sari',
                'jabatan' => 'Admin HSSE',
                'unit' => 'Divisi ICT - Pertamina Gas',
                'status' => 'Aktif',
                'last_login' => '05 Mei 2026 08:45',
            ],
            [
                'nama' => 'Rizky Pradana',
                'jabatan' => 'Supervisor Operasi',
                'unit' => 'Area Jawa Barat',
                'status' => 'Aktif',
                'last_login' => '05 Mei 2026 07:18',
            ],
            [
                'nama' => 'Mira Handayani',
                'jabatan' => 'Verifier Lapangan',
                'unit' => 'Wilayah Sumatera',
                'status' => 'Aktif',
                'last_login' => '04 Mei 2026 16:32',
            ],
            [
                'nama' => 'Dedi Firmansyah',
                'jabatan' => 'Petugas HSE',
                'unit' => 'Terminal LPG Gresik',
                'status' => 'Nonaktif',
                'last_login' => '29 Apr 2026 14:10',
            ],
            [
                'nama' => 'Ayu Puspita',
                'jabatan' => 'Admin Dokumentasi',
                'unit' => 'Head Office',
                'status' => 'Aktif',
                'last_login' => '05 Mei 2026 09:05',
            ],
        ];
    }
}