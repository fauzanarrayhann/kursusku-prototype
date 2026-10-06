<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kursus - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Styling untuk pembungkus tombol aksi di bagian bawah form */
        .form-actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }
        .btn-secondary-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.8rem 1.1rem;
            border: 1.5px solid var(--brand, #0f766e);
            border-radius: 0.7rem;
            color: var(--brand, #0f766e);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            background: #ffffff;
            transition: all 0.2s ease;
        }
        .btn-secondary-action:hover {
            background: var(--soft, #eef8f5);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">KursusKu</a>
        <nav aria-label="Navigasi utama">
            <a href="index.php">Beranda</a>
            <a href="index.php#katalog">Katalog</a>
            <a href="registration.php"><strong>Daftar</strong></a>
            <a href="history.php">Riwayat Pendaftaran</a>
            <a href="loop-lab.php">Loop Lab</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="page-intro">
        <p class="eyebrow">Pendaftaran Kursus (Pertemuan 6)</p>
        <h1>Form Pendaftaran KursusKu</h1>
        <p>Silakan isi data lengkap di bawah ini.</p>
    </section>

    <section class="form-card">
        <form action="process.php" method="POST" class="registration-form">
            <input type="hidden" name="source" value="week-06">

            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" name="name" type="text" minlength="3" maxlength="100" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" maxlength="120" required>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor HP</label>
                    <input id="phone" name="phone" type="tel" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label for="study_program">Program Studi / Instansi</label>
                    <input id="study_program" name="study_program" type="text" maxlength="100" required>
                </div>
            </div>

            <!-- Loop Render Options Kursus dari data.php -->
            <div class="form-group">
                <label for="course">Pilih Kursus</label>
                <select id="course" name="course" required>
                    <option value="">-- Pilih Kursus --</option>
                    <?php foreach ($courses as $c): ?>
                        <?php $isAvailable = ($c['registered'] < $c['quota']); ?>
                        <option value="<?= e($c['code']) ?>" <?= !$isAvailable ? 'disabled' : '' ?>>
                            <?= e($c['name']) ?> - <?= rupiah($c['fee']) ?> (<?= statusKursus($c['quota'], $c['registered']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Radio Button Jenis Peserta -->
            <fieldset class="form-group">
                <legend>Jenis Peserta (Diskon Khusus)</legend>
                <label class="choice">
                    <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa (Diskon 20%)
                </label>
                <label class="choice">
                    <input type="radio" name="participant_type" value="guru"> Guru (Diskon 15%)
                </label>
                <label class="choice">
                    <input type="radio" name="participant_type" value="umum"> Umum (Diskon 0%)
                </label>
            </fieldset>

            <!-- Checkbox Loop Minat -->
            <fieldset class="form-group">
                <legend>Minat Tambahan</legend>
                <?php foreach ($interests_list as $key => $label): ?>
                    <label class="choice">
                        <input type="checkbox" name="interests[]" value="<?= e($key) ?>"> <?= e($label) ?>
                    </label>
                <?php endforeach; ?>
            </fieldset>

            <!-- Checkbox Loop Fasilitas -->
            <fieldset class="form-group">
                <legend>Fasilitas Tambahan</legend>
                <?php foreach ($facilities_list as $fKey => $fLabel): ?>
                    <label class="choice">
                        <input type="checkbox" name="facilities[]" value="<?= e($fKey) ?>"> <?= e($fLabel) ?>
                    </label>
                <?php endforeach; ?>
            </fieldset>

            <div class="form-group">
                <label for="note">Catatan Tambahan</label>
                <textarea id="note" name="note" rows="4" maxlength="300"></textarea>
            </div>

            <!-- Tombol Utama dan Tombol Tambahan Bersandingan -->
            <div class="form-actions">
                <button class="btn-primary" type="submit">Proses Pendaftaran</button>
                <a href="history.php" class="btn-secondary-action">Lihat Riwayat (Dummy)</a>
                <a href="loop-lab.php" class="btn-secondary-action">Uji Loop Lab</a>
            </div>
        </form>
    </section>
</main>
</body>
</html>