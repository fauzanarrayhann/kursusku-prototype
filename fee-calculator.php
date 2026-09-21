<?php
$testCases = [
    [1, 350000, 1, 0, 25000, 375000],
    [2, 350000, 1, 10, 25000, 340000],
    [3, 350000, 2, 25, 25000, 550000],
    [4, 0, 1, 10, 0, 0],
    [5, 2500000, 3, 10, 50000, 6800000],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Test Case Matrix - KursusKu</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 24px; background: #f5f7f6; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #0f766e; color: white; }
        .pass { color: green; font-weight: bold; }
        .fail { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Hasil Uji Matriks 5 Test Case (Milestone 3)</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Fee</th>
            <th>Peserta</th>
            <th>Diskon</th>
            <th>Admin</th>
            <th>Expected Total</th>
            <th>Actual Total</th>
            <th>Status</th>
        </tr>
        <?php foreach ($testCases as [$no, $fee, $qty, $disc, $admin, $expected]): ?>
            <?php
            $subtotal = $fee * $qty;
            $discount = intdiv($subtotal * $disc, 100);
            $actual = $subtotal - $discount + $admin;
            $status = ($actual === $expected) ? 'PASS' : 'FAIL';
            ?>
            <tr>
                <td><?= $no ?></td>
                <td>Rp <?= number_format($fee, 0, ',', '.') ?></td>
                <td><?= $qty ?></td>
                <td><?= $disc ?>%</td>
                <td>Rp <?= number_format($admin, 0, ',', '.') ?></td>
                <td>Rp <?= number_format($expected, 0, ',', '.') ?></td>
                <td>Rp <?= number_format($actual, 0, ',', '.') ?></td>
                <td class="<?= strtolower($status) ?>"><?= $status ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>