<?php
// Pastikan helpers.php berada di folder yang sama
require_once __DIR__ . '/helpers.php';

// Data simulasi status kursus: Penuh, Tersedia, dan batas kritis (hampir penuh / kosong)
$sampleCourses = [
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'quota' => 25,
        'registered' => 25, // Kasus: Penuh
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'quota' => 25,
        'registered' => 24, // Kasus: Hampir penuh (Tersedia)
    ],
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'quota' => 30,
        'registered' => 12, // Kasus: Tersedia
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'quota' => 20,
        'registered' => 0,  // Kasus: Kosong (Tersedia)
    ],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Evidence Status Kursus - KursusKu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
            color: #1e293b;
        }
        .container {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        h2 {
            margin-top: 0;
            color: #0f766e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th, td {
            border: 1px solid #e2e8f0;
            padding: 12px;
            text-align: left;
        }
        th {
            background: #f8fafc;
        }
        /* Class badge status sesuai panduan modul */
        .badge-available,
        .badge-full {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
        }
        .badge-available {
            background: #e7f8ef;
            color: #146c43;
        }
        .badge-full {
            background: #fdeaea;
            color: #a61b1b;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Pemeriksaan Status Kursus & Sisa Kursi</h2>
    <p>Validasi pemanggilan fungsi <code>statusKursus()</code> dan <code>sisaKursi()</code> dari <code>helpers.php</code>:</p>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Kursus</th>
                <th>Kuota</th>
                <th>Terdaftar</th>
                <th>Sisa Kursi</th>
                <th>Status Visual</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sampleCourses as $item): ?>
                <?php
                // Memanggil fungsi logika bisnis dari helpers.php
                $status = statusKursus($item['quota'], $item['registered']);
                $sisa = sisaKursi($item['quota'], $item['registered']);
                
                // Menentukan class CSS berdasarkan hasil return function
                $badgeClass = ($status === 'Penuh') ? 'badge-full' : 'badge-available';
                ?>
                <tr>
                    <td><?= htmlspecialchars($item['code']) ?></td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= $item['quota'] ?></td>
                    <td><?= $item['registered'] ?></td>
                    <td><?= $sisa ?> kursi</td>
                    <td>
                        <span class="<?= $badgeClass ?>">
                            <?= $status ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>