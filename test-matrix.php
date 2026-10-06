<?php
// test-matrix.php - Evidence Test Matrix Pertemuan 6

$test_cases = [
    [
        'no' => 1,
        'skenario' => 'Mahasiswa, Web Dasar, 1 paket',
        'actual' => 'Rp 240.000',
        'expected' => 'Rp 240.000',
        'status' => 'PASS'
    ],
    [
        'no' => 2,
        'skenario' => 'Guru, PHP Dasar, 1 paket',
        'actual' => 'Rp 340.000',
        'expected' => 'Rp 340.000',
        'status' => 'PASS'
    ],
    [
        'no' => 3,
        'skenario' => 'Umum, Laravel Dasar, 1 paket',
        'actual' => 'Rp 500.000',
        'expected' => 'Rp 500.000',
        'status' => 'PASS'
    ],
    [
        'no' => 4,
        'skenario' => 'Mahasiswa, Web Dasar, 2 paket',
        'actual' => 'Rp 480.000',
        'expected' => 'Rp 480.000',
        'status' => 'PASS'
    ],
    [
        'no' => 5,
        'skenario' => 'Nama kosong',
        'actual' => 'Nama wajib diisi.',
        'expected' => 'Nama wajib diisi.',
        'status' => 'PASS'
    ],
    [
        'no' => 6,
        'skenario' => 'Email tidak valid',
        'actual' => 'Email tidak valid.',
        'expected' => 'Email tidak valid.',
        'status' => 'PASS'
    ],
    [
        'no' => 7,
        'skenario' => 'Minat kosong',
        'actual' => 'Belum memilih minat.',
        'expected' => 'Belum memilih minat.',
        'status' => 'PASS'
    ],
    [
        'no' => 8,
        'skenario' => '3 minat',
        'actual' => 'Frontend, Backend, Database',
        'expected' => 'Frontend, Backend, Database',
        'status' => 'PASS'
    ],
    [
        'no' => 9,
        'skenario' => 'Metode offline',
        'actual' => 'Tatap Muka',
        'expected' => 'Tatap Muka',
        'status' => 'PASS'
    ],
    [
        'no' => 10,
        'skenario' => 'Metode hybrid',
        'actual' => 'Hybrid',
        'expected' => 'Hybrid',
        'status' => 'PASS'
    ],
    [
        'no' => 11,
        'skenario' => 'GET process.php',
        'actual' => 'Redirect ke register.php',
        'expected' => 'Redirect ke register.php',
        'status' => 'PASS'
    ],
    [
        'no' => 12,
        'skenario' => 'Tambah fasilitas',
        'actual' => 'Dirender otomatis dengan foreach',
        'expected' => 'Dirender otomatis dengan foreach',
        'status' => 'PASS'
    ]
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Matrix Pertemuan 6 - KursusKu</title>
    <style>
        body {
            background-color: #f1f7f6;
            font-family: system-ui, -apple-system, sans-serif;
            color: #1e293b;
            margin: 0;
            padding: 2rem 1rem;
        }

        .matrix-container {
            max-width: 900px;
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
            margin: 0 0 1.75rem 0;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .matrix-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .matrix-table th {
            background-color: #ecfdf5;
            color: #047857;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.85rem 1rem;
            text-align: left;
        }

        .matrix-table th:first-child {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .matrix-table th:last-child {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            text-align: center;
        }

        .matrix-table td {
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }

        .matrix-table tr:last-child td {
            border-bottom: none;
        }

        .td-no {
            font-weight: 500;
            color: #64748b;
            width: 40px;
        }

        .td-status {
            text-align: center;
            width: 80px;
        }

        .badge-pass {
            display: inline-block;
            background-color: #ecfdf5;
            color: #047857;
            font-weight: 800;
            font-size: 0.75rem;
            padding: 0.25rem 0.65rem;
            border-radius: 9999px;
            letter-spacing: 0.03em;
        }
    </style>
</head>
<body>

<main class="matrix-container">
    <div class="eyebrow-text">EVIDENCE WEEK 06</div>
    <h1 class="page-title">Test Matrix Pertemuan 6</h1>

    <div class="table-responsive">
        <table class="matrix-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>SKENARIO</th>
                    <th>ACTUAL</th>
                    <th>EXPECTED</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($test_cases as $test): ?>
                    <tr>
                        <td class="td-no"><?= $test['no'] ?></td>
                        <td><?= htmlspecialchars($test['skenario']) ?></td>
                        <td><?= htmlspecialchars($test['actual']) ?></td>
                        <td><?= htmlspecialchars($test['expected']) ?></td>
                        <td class="td-status">
                            <span class="badge-pass"><?= $test['status'] ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

</body>
</html>