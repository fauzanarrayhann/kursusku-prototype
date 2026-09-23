<?php
require_once __DIR__ . '/helpers.php';

$courses = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar', 'fee' => 200000, 'quota' => 30, 'registered' => 12, 'start_date' => '2026-09-21'],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar', 'fee' => 250000, 'quota' => 30, 'registered' => 18, 'start_date' => '2026-09-22'],
    ['code' => 'PHP-02', 'name' => 'PHP Lanjutan', 'fee' => 300000, 'quota' => 25, 'registered' => 24, 'start_date' => '2026-09-24'],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000, 'quota' => 25, 'registered' => 25, 'start_date' => '2026-09-28'],
    ['code' => 'DB-01', 'name' => 'MySQL Dasar', 'fee' => 275000, 'quota' => 20, 'registered' => 0, 'start_date' => '2026-10-01'],
    ['code' => 'UI-01', 'name' => 'UI Web Dasar', 'fee' => 225000, 'quota' => 35, 'registered' => 9, 'start_date' => '2026-10-03'],
];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KursusKu - Solusi Belajar Pemrograman</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* Hero enhancement */
    .hero-banner {
      background: linear-gradient(135deg, #ffffff 0%, #eef8f5 100%);
      border: 1px solid var(--line);
      border-radius: 1.25rem;
      padding: 3rem 2rem;
      margin: 2rem 0;
      text-align: center;
    }
    .hero-badge {
      display: inline-block;
      background: #e6f4f1;
      color: var(--brand);
      font-size: 0.85rem;
      font-weight: 700;
      padding: 0.35rem 1rem;
      border-radius: 999px;
      margin-bottom: 1rem;
      letter-spacing: 0.05em;
    }
    .hero-banner h1 {
      font-size: clamp(1.8rem, 4vw, 2.5rem);
      color: var(--brand-dark);
      margin: 0 auto 0.75rem;
      max-width: 700px;
      line-height: 1.25;
    }
    .hero-banner p {
      color: var(--muted);
      max-width: 600px;
      margin: 0 auto 1.75rem;
      font-size: 1.05rem;
    }
    .hero-actions {
      display: flex;
      justify-content: center;
      gap: 1rem;
      flex-wrap: wrap;
    }
    .btn-secondary {
      display: inline-block;
      border: 1px solid var(--brand);
      border-radius: 0.7rem;
      padding: 0.8rem 1.2rem;
      background: transparent;
      color: var(--brand);
      text-decoration: none;
      font-weight: bold;
      transition: all 0.2s ease;
    }
    .btn-secondary:hover {
      background: var(--soft);
    }

    /* Quick stats */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .stat-card {
      background: var(--surface);
      border: 1px solid var(--line);
      border-radius: 0.75rem;
      padding: 1.25rem;
      text-align: center;
    }
    .stat-number {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--brand);
      line-height: 1;
      margin-bottom: 0.25rem;
    }
    .stat-label {
      font-size: 0.85rem;
      color: var(--muted);
    }

    /* Table styling & responsiveness */
    .table-container {
      overflow-x: auto;
      border-radius: 0.75rem;
      border: 1px solid var(--line);
      margin-top: 1.25rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: var(--surface);
    }
    th, td {
      padding: 0.9rem 1rem;
      text-align: left;
      border-bottom: 1px solid var(--line);
    }
    th {
      background: #f8fafc;
      font-weight: 700;
      color: var(--muted);
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    tbody tr:hover {
      background: #fafcfb;
    }
    tbody tr:last-child td {
      border-bottom: none;
    }
    .course-code {
      font-family: monospace;
      font-size: 0.9rem;
      background: #f1f5f9;
      padding: 2px 6px;
      border-radius: 4px;
      font-weight: 600;
    }
    .course-title {
      font-weight: bold;
      color: var(--text);
    }
    .badge-available, .badge-full {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 999px;
      font-size: 0.8rem;
      font-weight: 700;
    }
    .badge-available { background: #e7f8ef; color: #146c43; }
    .badge-full { background: #fdeaea; color: #a61b1b; }

    /* Footer */
    footer.site-footer {
      border-top: 1px solid var(--line);
      margin-top: 3rem;
      padding: 2rem 0;
      text-align: center;
      color: var(--muted);
      font-size: 0.875rem;
    }
  </style>
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="index.php">KursusKu</a>
    <nav aria-label="Navigasi utama">
      <a href="index.php"><strong>Beranda</strong></a>
      <a href="#katalog">Katalog Kursus</a>
      <a href="fee-calculator.php">Kalkulator Biaya</a>
      <a href="registration.php" class="btn-primary" style="padding: 0.4rem 0.9rem; font-size: 0.9rem;">Daftar Sekarang</a>
    </nav>
  </div>
</header>

<main class="container">
  <!-- Hero Section -->
  <section class="hero-banner">
    <span class="hero-badge">Pilihan Kelas Populer 2026</span>
    <h1>Kuasai Keterampilan Coding Nyata Bersama KursusKu</h1>
    <p>Kurikulum terstruktur berbasis proyek praktis mulai dari level pemula hingga siap industri digital.</p>
    <div class="hero-actions">
      <a class="btn-primary" href="registration.php">Daftar Kursus Sekarang</a>
      <a class="btn-secondary" href="fee-calculator.php">Simulasi Estimasi Biaya</a>
    </div>
  </section>

  <!-- Quick Info Metric -->
  <section class="stats-grid">
    <div class="stat-card">
      <div class="stat-number">6</div>
      <div class="stat-label">Pilihan Kursus Intensif</div>
    </div>
    <div class="stat-card">
      <div class="stat-number">100%</div>
      <div class="stat-label">Praktik & Studi Kasus</div>
    </div>
    <div class="stat-card">
      <div class="stat-number">Sertifikat</div>
      <div class="stat-label">Penyelesaian Resmi</div>
    </div>
  </section>

  <!-- Katalog Table Section -->
  <section id="katalog" class="form-card" style="max-width: 100%;">
    <div style="display: flex; justify-content: space-between; align-items: baseline; flex-wrap: wrap; gap: 0.5rem;">
      <div>
        <h2 style="margin: 0; color: var(--brand-dark);">Daftar Kursus Tersedia</h2>
        <p style="margin: 0.25rem 0 0; color: var(--muted); font-size: 0.9rem;">Pilih kelas yang sesuai dengan jalur karier yang Anda impikan.</p>
      </div>
      <span style="font-size: 0.85rem; color: var(--muted);">Status diperbarui langsung</span>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama Kursus</th>
            <th>Biaya Pendaftaran</th>
            <th>Mulai Belajar</th>
            <th>Sisa Kuota</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($courses as $course): ?>
            <?php
            $status = statusKursus($course['quota'], $course['registered']);
            $statusClass = ($status === 'Penuh') ? 'badge-full' : 'badge-available';
            ?>
            <tr>
              <td><span class="course-code"><?= htmlspecialchars($course['code']) ?></span></td>
              <td class="course-title"><?= htmlspecialchars(trim($course['name'])) ?></td>
              <td style="font-weight: 600;"><?= rupiah($course['fee']) ?></td>
              <td><?= formatTanggal($course['start_date']) ?></td>
              <td><?= sisaKursi($course['quota'], $course['registered']) ?> kursi</td>
              <td><span class="<?= $statusClass ?>"><?= $status ?></span></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</main>

<footer class="site-footer container">
  <p>&copy; 2026 KursusKu. Proyek Praktikum Pemrograman Web III.</p>
</footer>
</body>
</html>