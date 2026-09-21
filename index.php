<?php
require_once __DIR__ . '/helpers.php';
$courses = [
 ['code'=>'WEB-01','name'=>'Web
Dasar','fee'=>200000,'quota'=>30,'registered'=>12,'start_date'=>'2026-09-21'],
 ['code'=>'PHP-01','name'=>'PHP
Dasar','fee'=>250000,'quota'=>30,'registered'=>18,'start_date'=>'2026-09-22'],
 ['code'=>'PHP-02','name'=>'PHP
Lanjutan','fee'=>300000,'quota'=>25,'registered'=>24,'start_date'=>'2026-09-24'],
 ['code'=>'LAR-01','name'=>'Laravel
Fundamental','fee'=>350000,'quota'=>25,'registered'=>25,'start_date'=>'2026-09-28'],
 ['code'=>'DB-01','name'=>'MySQL
Dasar','fee'=>275000,'quota'=>20,'registered'=>0,'start_date'=>'2026-10-01'],
 ['code'=>'UI-01','name'=>'UI Web
Dasar','fee'=>225000,'quota'=>35,'registered'=>9,'start_date'=>'2026-10-03'],
];
?>
<section id="katalog">
 <h2>Katalog Kursus</h2>
 <table>
 <thead>
 <tr>
 <th>Kode</th>
 <th>Nama</th>
 <th>Biaya</th>
 <th>Mulai</th>
 <th>Sisa</th>
 <th>Status</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($courses as $course): ?>
 <?php
 $status = statusKursus($course['quota'], $course['registered']);
 $statusClass = $status === 'Penuh' ? 'badge-full' : 'badge-available';
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