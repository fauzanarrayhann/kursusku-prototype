<?php
require_once __DIR__ . '/helpers.php';

$tests = [
    ['Rupiah', rupiah(250000), 'Rp 250.000'],
    ['Penuh', statusKursus(25, 25), 'Penuh'],
    ['Tersedia', statusKursus(30, 29), 'Tersedia'],
    ['Sisa kosong', sisaKursi(20, 0), 20],
    ['Sisa penuh', sisaKursi(25, 25), 0],
    ['Tanggal', formatTanggal('2026-09-15'), '15-09-2026'],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Unit Test Functions - KursusKu</title>
    <style>
        body { font-family: monospace; padding: 24px; background: #f8fafc; color: #1e293b; }
        .pass { color: #16a34a; font-weight: bold; }
        .fail { color: #dc2626; font-weight: bold; }
        .row { margin-bottom: 8px; }
    </style>
</head>
<body>
    <h2>Hasil Pengujian 6 Test Case helpers.php</h2>
    <hr>
    <?php foreach ($tests as [$name, $actual, $expected]): ?>
        <?php $passed = ($actual === $expected); ?>
        <div class="row">
            <strong><?= htmlspecialchars($name) ?></strong>: 
            <span class="<?= $passed ? 'pass' : 'fail' ?>"><?= $passed ? 'PASS' : 'FAIL' ?></span>
            | actual=<code><?= htmlspecialchars((string)$actual) ?></code>
            | expected=<code><?= htmlspecialchars((string)$expected) ?></code>
        </div>
    <?php endforeach; ?>
</body>
</html>