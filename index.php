<?php
require_once __DIR__ . '/helpers.php';

$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28',
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KursusKu - Solusi Belajar Pemrograman</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7f6; margin: 0; padding: 24px; color: #16332c; }
        .container { max-width: 900px; margin: auto; background: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #e2e8f0; padding-bottom: 16px; margin-bottom: 24px; }
        h1, h2 { margin: 0; color: #0f766e; }
        .nav-link { color: #0f766e; text-decoration: none; font-weight: bold; }
        .nav-link:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #e2e8f0; padding: 12px; text-align: left; }
        th { background: #f8fafc; font-weight: bold; color: #334155; }
        tr:hover { background: #f8fafc; }
        .badge-available, .badge-full {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
        }
        .badge-available { background: #e7f8ef; color: #146c43; }
        .badge-full { background: #fdeaea; color: #a61b1b; }
        footer { margin-top: 32px; text-align: center; font-size: 0.875rem; color: #64748b; }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>KursusKu</h1>
        <a class="nav-link" href="fee-calculator.php">Lihat Estimasi Biaya &rarr;</a>
    </header>

    <section id="katalog">
        <h2>Katalog Kursus Pilihan</h2>
        <p>Tersedia 6 pilihan kursus intensif berbasis proyek nyata.</p>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Kursus</th>
                    <th>Biaya</th>
                    <th>Mulai</th>
                    <th>Sisa Kursi</th>
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
                        <td><?= htmlspecialchars($course['code']) ?></td>
                        <td><?= htmlspecialchars(trim($course['name'])) ?></td>
                        <td><?= rupiah($course['fee']) ?></td>
                        <td><?= formatTanggal($course['start_date']) ?></td>
                        <td><?= sisaKursi($course['quota'], $course['registered']) ?></td>
                        <td><span class="<?= $statusClass ?>"><?= $status ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2026 KursusKu - Pendidikan Teknik Informatika dan Komputer</p>
    </footer>
</div>
</body>
</html>