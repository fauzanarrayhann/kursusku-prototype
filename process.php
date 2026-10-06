<?php
// process.php
session_start(); // Aktifkan session untuk menyimpan riwayat pendaftaran

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';

// Validasi request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

// Ambil & bersihkan input dari form
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$courseCode = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? 'mahasiswa';
$method = $_POST['method'] ?? 'Hybrid';
$packageCount = (int)($_POST['package_count'] ?? 1);
$interests = $_POST['interests'] ?? [];
$facilities = $_POST['facilities'] ?? [];
$note = trim($_POST['note'] ?? '');

// Cari data kursus terpilih dari data.php
$selectedCourse = null;
foreach ($courses as $c) {
    if ($c['code'] === $courseCode) {
        $selectedCourse = $c;
        break;
    }
}

// Fallback data jika testing langsung
$courseName = $selectedCourse ? $selectedCourse['name'] : 'Web Dasar';
$unitPrice = $selectedCourse ? $selectedCourse['fee'] : 300000;

// Kalkulasi Subtotal, Diskon (Mahasiswa 20%, Guru 15%, Umum 0%), dan Total
$subtotal = $unitPrice * max(1, $packageCount);
$discountData = hitungDiskon($participantType, $subtotal);
$grandTotal = $discountData['total'];

// SIMPAN OTOAMATIS KE SESSION HISTORY TIAP SUBMIT FORM
$_SESSION['history'][] = [
    'nama' => $name !== '' ? $name : 'Pengguna Baru',
    'kursus' => $courseName,
    'total' => $grandTotal
];

// Pemetaan Minat & Fasilitas
$interestLabels = array_map(function($key) use ($interests_list) {
    return $interests_list[$key] ?? $key;
}, $interests);

$facilityLabels = array_map(function($key) use ($facilities_list) {
    return $facilities_list[$key] ?? $key;
}, $facilities);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: #f1f7f6;
            font-family: system-ui, -apple-system, sans-serif;
            color: #1e293b;
        }

        .summary-wrapper {
            max-width: 680px;
            margin: 2rem auto;
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

        /* Grid Info 2 Kolom */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .info-card {
            background: #f1f5f9;
            padding: 1rem 1.25rem;
            border-radius: 0.75rem;
        }

        .info-card label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 0.25rem;
        }

        .info-card span {
            font-size: 0.95rem;
            color: #0f172a;
        }

        .section-heading {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
            margin: 1.75rem 0 1rem 0;
        }

        /* Tabel Rincian Biaya */
        .fee-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            overflow: hidden;
        }

        .fee-table td {
            padding: 0.85rem 1.25rem;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.95rem;
        }

        .fee-table tr:last-child td {
            border-bottom: none;
        }

        .fee-table .amount {
            text-align: right;
        }

        .row-total {
            background-color: #ecfdf5;
        }

        .row-total td {
            font-weight: 800;
            color: #065f46;
            font-size: 0.85rem;
        }

        /* Badge Kapsul Minat */
        .interest-badge {
            display: inline-block;
            background-color: #ecfdf5;
            color: #047857;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.4rem 1rem;
            border-radius: 9999px;
            margin-right: 0.5rem;
        }

        /* Tampilan Kotak jika Minat Kosong */
        .empty-box {
            background-color: #ecfdf5;
            color: #047857;
            padding: 0.85rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.95rem;
        }

        /* Daftar Poin Fasilitas */
        .facility-list {
            margin: 0;
            padding-left: 1.25rem;
            color: #334155;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .note-text {
            color: #334155;
            font-size: 0.95rem;
        }

        /* Tombol Navigasi */
        .action-group {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .btn-solid {
            background-color: #0f766e;
            color: #ffffff;
            font-weight: 700;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-size: 0.9rem;
            border: none;
        }

        .btn-outline-custom {
            background-color: transparent;
            color: #0f766e;
            font-weight: 700;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-size: 0.9rem;
            border: 1.5px solid #0f766e;
        }

        @media (max-width: 640px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            .action-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<main class="summary-wrapper">
    <div class="eyebrow-text">MILESTONE 6 • RINGKASAN</div>
    <h1 class="page-title">Pendaftaran Berhasil Diproses</h1>

    <!-- Grid Informasi Utama -->
    <div class="info-grid">
        <div class="info-card">
            <label>Nama:</label>
            <span><?= e($name) ?></span>
        </div>
        <div class="info-card">
            <label>Email:</label>
            <span><?= e($email) ?></span>
        </div>
        <div class="info-card">
            <label>Kursus:</label>
            <span><?= e($courseName) ?></span>
        </div>
        <div class="info-card">
            <label>Tipe peserta:</label>
            <span><?= e(ucfirst($participantType)) ?></span>
        </div>
        <div class="info-card">
            <label>Metode:</label>
            <span><?= e($method) ?></span>
        </div>
        <div class="info-card">
            <label>Jumlah paket:</label>
            <span><?= $packageCount ?></span>
        </div>
    </div>

    <!-- Rincian Biaya -->
    <h2 class="section-heading">Rincian Biaya</h2>
    <table class="fee-table">
        <tr>
            <td>Biaya satuan</td>
            <td class="amount"><?= rupiah($unitPrice) ?></td>
        </tr>
        <tr>
            <td>Subtotal</td>
            <td class="amount"><?= rupiah($subtotal) ?></td>
        </tr>
        <tr>
            <td>Diskon <?= $discountData['percent'] ?>%</td>
            <td class="amount">-<?= rupiah($discountData['amount']) ?></td>
        </tr>
        <tr class="row-total">
            <td>TOTAL AKHIR</td>
            <td class="amount"><?= rupiah($grandTotal) ?></td>
        </tr>
    </table>

    <!-- Section Minat (Percabangan Minat Kosong vs Ada) -->
    <h2 class="section-heading">Minat</h2>
    <div>
        <?php if (!empty($interestLabels)): ?>
            <?php foreach ($interestLabels as $interest): ?>
                <span class="interest-badge"><?= e($interest) ?></span>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-box">Belum memilih minat.</div>
        <?php endif; ?>
    </div>

    <!-- Fasilitas -->
    <h2 class="section-heading">Fasilitas</h2>
    <ul class="facility-list">
        <?php if (!empty($facilityLabels)): ?>
            <?php foreach ($facilityLabels as $facility): ?>
                <li><?= e($facility) ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Modul digital</li>
            <li>Sertifikat penyelesaian</li>
            <li>Forum diskusi kelas</li>
        <?php endif; ?>
    </ul>

    <!-- Catatan -->
    <h2 class="section-heading">Catatan</h2>
    <p class="note-text"><?= !empty($note) ? e($note) : 'Tidak ada catatan tambahan.' ?></p>

    <!-- Tombol Navigasi -->
    <div class="action-group">
        <a href="registration.php" class="btn-solid">Daftar Lagi</a>
        <a href="history.php" class="btn-outline-custom">Lihat History Dummy</a>
        <a href="index.php" class="btn-outline-custom">Beranda</a>
    </div>
</main>

</body>
</html>