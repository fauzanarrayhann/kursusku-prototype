<?php
// loop-lab.php - Pembanding Struktur Perulangan
require_once __DIR__ . '/helpers.php';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loop Lab - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">KursusKu</a>
        <nav aria-label="Navigasi utama">
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar</a>
            <a href="history.php">Riwayat</a>
            <a href="loop-lab.php">Loop Lab</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="page-intro">
        <p class="eyebrow">Laboratorium Perulangan</p>
        <h1>Komparasi Structure Looping PHP</h1>
    </section>

    <div class="form-grid">
        <!-- Loop FOR -->
        <div class="form-card">
            <h3>1. Perulangan FOR</h3>
            <p><small>Digunakan ketika jumlah iterasi sudah pasti.</small></p>
            <ul>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <li>Iterasi ke-<?= $i ?>: Diskon Tambahan <?= $i * 2 ?>%</li>
                <?php endfor; ?>
            </ul>
        </div>

        <!-- Loop WHILE -->
        <div class="form-card">
            <h3>2. Perulangan WHILE</h3>
            <p><small>Mengecek kondisi di awal sebelum eksekusi.</small></p>
            <ul>
                <?php 
                $w = 1;
                while ($w <= 5): 
                ?>
                    <li>Sesi Mentoring Kelompok <?= $w ?></li>
                <?php 
                    $w++;
                endwhile; 
                ?>
            </ul>
        </div>

        <!-- Loop DO-WHILE -->
        <div class="form-card">
            <h3>3. Perulangan DO-WHILE</h3>
            <p><small>Minimal mengeksekusi blok 1 kali terlebih dahulu.</small></p>
            <ul>
                <?php 
                $dw = 1;
                do {
                ?>
                    <li>Kuota Terisi Gelombang <?= $dw ?></li>
                <?php 
                    $dw++;
                } while ($dw <= 5);
                ?>
            </ul>
        </div>
    </div>
</main>
</body>
</html>