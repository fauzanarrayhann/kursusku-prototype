<?php
// process.php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';

// Validasi request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

// Ambil & bersihkan input
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');
$courseCode = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? 'umum';
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

// Validasi dasar
if (!$selectedCourse || empty($name) || empty($email)) {
    echo "<script>alert('Data pendaftaran tidak valid!'); window.location.href='registration.php';</script>";
    exit;
}

// Aritmatika & Branching
$subtotal = $selectedCourse['fee'];
$discountData = hitungDiskon($participantType, $subtotal);
$adminFee = 5000; // Biaya pendaftaran admin
$grandTotal = $discountData['total'] + $adminFee;

// Label pemetaan minat & fasilitas
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
</head>
<body>
<main class="container result-page">
    <section class="alert-success">
        <h1>Pendaftaran Berhasil Diproses!</h1>
        <p>Berikut ringkasan kalkulasi dan data pendaftaran Anda:</p>
    </section>

    <section class="summary-card">
        <h2>Data Peserta</h2>
        <dl class="summary-list">
            <dt>Nama Lengkap</dt><dd><?= e($name) ?></dd>
            <dt>Email</dt><dd><?= e($email) ?></dd>
            <dt>Nomor HP</dt><dd><?= e($phone) ?></dd>
            <dt>Instansi/Prodi</dt><dd><?= e($studyProgram) ?></dd>
            <dt>Jenis Peserta</dt><dd><?= e(ucfirst($participantType)) ?></dd>
        </dl>

        <hr style="margin: 1.5rem 0; border: 0; border-top: 1px solid var(--line);">

        <h2>Rincian Kursus & Biaya</h2>
        <dl class="summary-list">
            <dt>Kursus</dt><dd><?= e($selectedCourse['name']) ?> (<?= e($selectedCourse['code']) ?>)</dd>
            <dt>Harga Normal</dt><dd><?= rupiah($subtotal) ?></dd>
            <dt>Diskon (<?= $discountData['percent'] ?>%)</dt><dd>- <?= rupiah($discountData['amount']) ?></dd>
            <dt>Biaya Admin</dt><dd><?= rupiah($adminFee) ?></dd>
            <dt><strong>Total Bayar</strong></dt><dd><strong><?= rupiah($grandTotal) ?></strong></dd>
        </dl>

        <hr style="margin: 1.5rem 0; border: 0; border-top: 1px solid var(--line);">

        <h2>Preferensi Tambahan</h2>
        <dl class="summary-list">
            <dt>Minat</dt><dd><?= !empty($interestLabels) ? e(implode(', ', $interestLabels)) : '-' ?></dd>
            <dt>Fasilitas</dt><dd><?= !empty($facilityLabels) ? e(implode(', ', $facilityLabels)) : '-' ?></dd>
            <dt>Catatan</dt><dd><?= !empty($note) ? e($note) : '-' ?></dd>
        </dl>

        <div style="margin-top: 1.5rem;">
            <a class="btn-primary" href="registration.php">Daftar Lagi</a>
            <a class="btn-link" href="history.php">Lihat Riwayat</a>
        </div>
    </section>
</main>
</body>
</html>