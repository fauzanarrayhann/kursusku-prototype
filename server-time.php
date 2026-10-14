<?php

declare(strict_types=1);

// Set zona waktu agar jam server sesuai waktu lokal
date_default_timezone_set('Asia/Jakarta');
$serverTime = date('Y-m-d H:i:s');
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waktu Server - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navigasi Header KursusKu -->
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="index.php" class="brand">KursusKu</a>
            <nav>
                <a href="index.php">Beranda</a>
                <a href="#">Katalog Kursus</a>
                <a href="#">Kalkulator Biaya</a>
                <a href="#" class="btn-primary" style="padding: 0.4rem 0.9rem; font-size: 0.9rem;">Daftar Kursus</a>
            </nav>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="container">
        <div class="page-intro">
            <span class="eyebrow-badge">PERTEMUAN 2</span>
            <h1 style="color: var(--brand-dark); font-size: 2rem; margin-top: 0.5rem; margin-bottom: 0.5rem;">PHP Diproses oleh Server</h1>
            <p style="color: var(--muted);">Contoh implementasi pemrosesan waktu server secara dinamis menggunakan PHP.</p>
        </div>

        <div class="summary-card">
            <div class="server-time-box">
                <span style="font-size: 0.9rem; color: var(--muted); font-weight: 600;">WAKTU SERVER SAAT INI</span>
                <div class="time-display"><?= htmlspecialchars($serverTime) ?></div>
            </div>

            <p style="margin-top: 1.25rem; color: var(--text);">
                Refresh halaman beberapa detik kemudian. Nilai berubah karena fungsi <code>date()</code> dijalankan ulang oleh PHP pada setiap request.
            </p>

            <div style="margin-top: 1.5rem;">
                <a class="btn-primary" href="index.php">Kembali ke Beranda</a>
            </div>
        </div>
    </main>

</body>
</html>