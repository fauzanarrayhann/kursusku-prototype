<?php
// history.php - Data Dummy Pendaftaran dengan Loop
require_once __DIR__ . '/helpers.php';

$registrations_dummy = [
    [
        'id' => 'REG-001',
        'name' => 'Budi Santoso',
        'course' => 'PHP Dasar',
        'type' => 'mahasiswa',
        'total' => 205000,
        'date' => '2026-10-01'
    ],
    [
        'id' => 'REG-002',
        'name' => 'Siti Rahma',
        'course' => 'UI Web Dasar',
        'type' => 'guru',
        'total' => 196250,
        'date' => '2026-10-03'
    ],
    [
        'id' => 'REG-003',
        'name' => 'Ahmad Fauzi',
        'course' => 'Laravel Fundamental',
        'type' => 'umum',
        'total' => 355000,
        'date' => '2026-10-05'
    ]
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pendaftaran - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">KursusKu</a>
        <nav aria-label="Navigasi utama">
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar Kursus</a>
            <a href="history.php">Riwayat</a>
            <a href="loop-lab.php">Loop Lab</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="page-intro">
        <p class="eyebrow">Riwayat Simulasi</p>
        <h1>Data Pendaftaran Dummy</h1>
    </section>

    <section class="form-card">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid var(--line);">
                    <th style="padding: 8px;">ID</th>
                    <th style="padding: 8px;">Nama</th>
                    <th style="padding: 8px;">Kursus</th>
                    <th style="padding: 8px;">Tipe</th>
                    <th style="padding: 8px;">Total</th>
                    <th style="padding: 8px;">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrations_dummy as $reg): ?>
                    <tr style="border-bottom: 1px solid var(--line);">
                        <td style="padding: 8px;"><?= e($reg['id']) ?></td>
                        <td style="padding: 8px;"><?= e($reg['name']) ?></td>
                        <td style="padding: 8px;"><?= e($reg['course']) ?></td>
                        <td style="padding: 8px;"><?= e(ucfirst($reg['type'])) ?></td>
                        <td style="padding: 8px;"><?= rupiah($reg['total']) ?></td>
                        <td style="padding: 8px;"><?= formatTanggal($reg['date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>
</body>
</html>