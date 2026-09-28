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
    :root {
      --brand: #0f766e;
      --brand-dark: #0b5f55;
      --brand-accent: #22c55e;
      --surface: #ffffff;
      --soft: #eef8f5;
      --text: #16332c;
      --muted: #4b635d;
      --line: #d1e7dd;
    }

    /* Penyesuaian Header & Logo */
    .brand-container {
      display: flex;
      align-items: center;
      gap: 0.65rem;
      text-decoration: none;
      color: var(--brand-dark);
      font-weight: 800;
      font-size: 1.25rem;
    }
    .brand-logo-img {
      height: 38px;
      width: auto;
      object-fit: contain;
    }

    /* Hero Banner Terpadu dengan Gambar */
    .hero-wrapper {
      display: grid;
      grid-template-columns: 1.15fr 0.85fr;
      align-items: center;
      gap: 2.5rem;
      background: linear-gradient(145deg, #ffffff 0%, #eaf7f2 100%);
      border: 1px solid var(--line);
      border-radius: 1.5rem;
      padding: 3rem;
      margin: 2rem 0;
      box-shadow: 0 10px 25px -5px rgba(15, 118, 110, 0.07);
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      background: #d1f2e4;
      color: var(--brand-dark);
      font-size: 0.85rem;
      font-weight: 700;
      padding: 0.35rem 1rem;
      border-radius: 999px;
      margin-bottom: 1.2rem;
      letter-spacing: 0.03em;
    }
    .hero-badge::before {
      content: "";
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--brand-accent);
    }
    .hero-content h1 {
      font-size: clamp(2rem, 3.2vw, 2.7rem);
      color: var(--brand-dark);
      margin: 0 0 1rem;
      line-height: 1.2;
    }
    .hero-content p {
      color: var(--muted);
      margin: 0 0 1.75rem;
      font-size: 1.1rem;
      line-height: 1.6;
    }
    .hero-actions {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }
    .hero-image-box {
      position: relative;
    }
    .hero-image-box img {
      width: 100%;
      height: 340px;
      object-fit: cover;
      border-radius: 1.25rem;
      box-shadow: 0 12px 24px -4px rgba(15, 118, 110, 0.18);
      border: 3px solid #ffffff;
    }

    /* Metric Bar */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.2rem;
      margin-bottom: 2.5rem;
    }
    .stat-card {
      background: var(--surface);
      border: 1px solid var(--line);
      border-radius: 1rem;
      padding: 1.25rem;
      text-align: center;
      transition: transform 0.2s ease;
    }
    .stat-card:hover {
      transform: translateY(-3px);
    }
    .stat-number {
      font-size: 1.9rem;
      font-weight: 800;
      color: var(--brand);
      line-height: 1.1;
      margin-bottom: 0.25rem;
    }
    .stat-label {
      font-size: 0.85rem;
      color: var(--muted);
      font-weight: 500;
    }

    /* Section Media Desktop (Video Interaktif) */
    .media-card {
      background: var(--surface);
      border: 1px solid var(--line);
      border-radius: 1.25rem;
      padding: 2rem;
      margin-bottom: 2.5rem;
    }
    .media-layout {
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 2rem;
      align-items: center;
    }
    .video-box {
      width: 100%;
      border-radius: 1rem;
      overflow: hidden;
      background: #000;
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }
    .video-box video {
      width: 100%;
      display: block;
      border-radius: 1rem;
    }
    .media-text h3 {
      color: var(--brand-dark);
      margin-top: 0;
      font-size: 1.4rem;
    }
    .media-text p {
      color: var(--muted);
      font-size: 0.95rem;
      line-height: 1.6;
    }

    /* Tabel Katalog */
    .table-container {
      overflow-x: auto;
      border-radius: 0.85rem;
      border: 1px solid var(--line);
      margin-top: 1.25rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: var(--surface);
    }
    th, td {
      padding: 0.95rem 1.1rem;
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
      background: #fbfdfc;
    }
    .course-code {
      font-family: monospace;
      font-size: 0.85rem;
      background: #eef8f5;
      color: var(--brand-dark);
      padding: 3px 8px;
      border-radius: 6px;
      font-weight: 700;
    }
    .course-title {
      font-weight: 700;
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

    .btn-secondary {
      display: inline-block;
      border: 1.5px solid var(--brand);
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

    /* Penyesuaian Tampilan Layar Tablet & HP */
    @media (max-width: 860px) {
      .hero-wrapper {
        grid-template-columns: 1fr;
        padding: 2rem;
        text-align: center;
      }
      .hero-actions {
        justify-content: center;
      }
      .media-layout {
        grid-template-columns: 1fr;
      }
      .hero-image-box img {
        height: 250px;
      }
    }
  </style>
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand-container" href="index.php">
      <!-- Logo KursusKu -->
      <img src="assets/images/logo.png" alt="Logo KursusKu" class="brand-logo-img" onerror="this.style.display='none'">
      <span>KursusKu</span>
    </a>
    <nav aria-label="Navigasi utama">
      <a href="index.php"><strong>Beranda</strong></a>
      <a href="#katalog">Katalog Kursus</a>
      <a href="fee-calculator.php">Kalkulator Biaya</a>
      <a href="registration.php" class="btn-primary" style="padding: 0.45rem 1rem; font-size: 0.9rem;">Daftar Kursus</a>
    </nav>
  </div>
</header>

<main class="container">
  <!-- Hero Section dengan Gambar Desktop -->
  <section class="hero-wrapper">
    <div class="hero-content">
      <span class="hero-badge">Platform Pembelajaran Masa Depan</span>
      <h1>Tumbuh & Kuasai Keterampilan Coding Bersama KursusKu</h1>
      <p>Kurikulum intensif berbasis praktik nyata yang dirancang sistematis dari fondasi logika dasar hingga pembuatan aplikasi web modern.</p>
      <div class="hero-actions">
        <a class="btn-primary" href="registration.php">Daftar Kursus Sekarang</a>
        <a class="btn-secondary" href="fee-calculator.php">Simulasi Estimasi Biaya</a>
      </div>
    </div>
    <div class="hero-image-box">
      <!-- Berkas gambar hero sesuai ketentuan praktikum Pertemuan 2 -->
      <img src="assets/images/hero-kursus.jpg" alt="Mahasiswa sedang mengikuti kegiatan kursus komputer">
    </div>
  </section>

  <!-- Metric Bar -->
  <section class="stats-grid">
    <div class="stat-card">
      <div class="stat-number">6</div>
      <div class="stat-label">Pilihan Kursus Unggulan</div>
    </div>
    <div class="stat-card">
      <div class="stat-number">100%</div>
      <div class="stat-label">Studi Kasus Proyek Nyata</div>
    </div>
    <div class="stat-card">
      <div class="stat-number">Terakreditasi</div>
      <div class="stat-label">Kurikulum Standar Industri</div>
    </div>
  </section>

  <!-- Section Media (Video Intro Kursus Sesuai Pertemuan 2) -->
  <section id="media" class="media-card">
    <div class="media-layout">
      <div class="video-box">
        <video controls>
          <source src="assets/video/intro-kursus.mp4" type="video/mp4">
          Browser Anda tidak mendukung pemutar video HTML5.
        </video>
      </div>
      <div class="media-text">
        <span class="hero-badge" style="margin-bottom: 0.5rem;">Video Pengenalan</span>
        <h3>Kenali Metode Belajar Praktis di KursusKu</h3>
        <p>Lihat bagaimana alur pembelajaran kami mengombinasikan pemahaman konsep teori dengan eksperimen kode langsung di laboratorium komputer kampus.</p>
        <p>Pelajari juga standar sintaks resmi melalui <a href="https://www.php.net/" target="_blank" rel="noopener" style="font-weight: bold;">Dokumentasi Resmi PHP</a>.</p>
      </div>
    </div>
  </section>

  <!-- Katalog Table Section -->
  <section id="katalog" class="form-card" style="max-width: 100%;">
    <div style="display: flex; justify-content: space-between; align-items: baseline; flex-wrap: wrap; gap: 0.5rem;">
      <div>
        <h2 style="margin: 0; color: var(--brand-dark);">Daftar Kursus Tersedia</h2>
        <p style="margin: 0.25rem 0 0; color: var(--muted); font-size: 0.9rem;">Pilih program pelatihan yang selaras dengan tujuan karier Anda.</p>
      </div>
      <span style="font-size: 0.85rem; color: var(--muted);">Data terhubung sistem dinamis</span>
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
              <td style="font-weight: 700;"><?= rupiah($course['fee']) ?></td>
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

<footer class="site-footer container" style="border-top: 1px solid var(--line); margin-top: 3rem; padding: 2rem 0; text-align: center; color: var(--muted); font-size: 0.875rem;">
  <p>&copy; <?= date('Y') ?> KursusKu. Proyek Praktikum Pemrograman Web III.</p>
</footer>
</body>
</html>