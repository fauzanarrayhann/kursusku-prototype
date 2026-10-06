<?php
// history.php
session_start(); // Aktifkan session

require_once __DIR__ . '/helpers.php';

// Data dummy bawaan sesuai petunjuk praktikum
$default_history = [
    ['nama' => 'Alya Putri', 'kursus' => 'Web Dasar', 'total' => 240000],
    ['nama' => 'Bima Saputra', 'kursus' => 'PHP Dasar', 'total' => 340000],
    ['nama' => 'Citra Rahma', 'kursus' => 'Laravel Dasar', 'total' => 500000],
    ['nama' => 'Dani Akbar', 'kursus' => 'Web Dasar', 'total' => 480000],
];

// Ambil data baru dari session (jika ada)
$session_history = $_SESSION['history'] ?? [];

// Gabungkan data dummy bawaan dengan data pendaftaran baru
$all_history = array_merge($default_history, $session_history);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Pendaftaran Dummy - KursusKu</title>
    <style>
        body {
            background-color: #f1f7f6;
            font-family: system-ui, -apple-system, sans-serif;
            color: #1e293b;
            margin: 0;
            padding: 2rem 1rem;
        }

        .history-container {
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 1.25rem;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .eyebrow-text {
            color: #0f766e;
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 0.5rem 0;
        }

        .subtitle {
            color: #475569;
            font-size: 0.95rem;
            margin-bottom: 1.75rem;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .history-table th {
            background-color: #ecfdf5;
            color: #047857;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.85rem 1.25rem;
            text-align: left;
        }

        .history-table th:first-child {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .history-table th:last-child {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        .history-table td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }

        .history-table tr:last-child td {
            border-bottom: none;
        }

        .action-group {
            display: flex;
            gap: 0.75rem;
        }

        .btn-solid {
            background-color: #0f766e;
            color: #ffffff;
            font-weight: 700;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-outline {
            background-color: transparent;
            color: #0f766e;
            font-weight: 700;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-size: 0.9rem;
            border: 1.5px solid #0f766e;
        }
    </style>
</head>
<body>

<main class="history-container">
    <div class="eyebrow-text">MILESTONE 6 • FOREACH</div>
    <h1 class="page-title">History Pendaftaran Dummy</h1>
    <p class="subtitle">Data ini adalah latihan array + looping, bukan database dan bukan CRUD.</p>

    <table class="history-table">
        <thead>
            <tr>
                <th style="width: 60px;">NO.</th>
                <th>NAMA</th>
                <th>KURSUS</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($all_history as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['kursus']) ?></td>
                    <td><?= rupiah($row['total']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="action-group">
        <a href="registration.php" class="btn-solid">Daftar Kursus</a>
        <a href="index.php" class="btn-outline">Beranda</a>
    </div>
</main>

</body>
</html>