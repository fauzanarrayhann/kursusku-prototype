<?php
// helpers.php

function rupiah(int|float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function statusKursus(int $kapasitas, int $terisi): string {
    return ($terisi >= $kapasitas) ? 'Penuh' : 'Tersedia';
}

function sisaKursi(int $kapasitas, int $terisi): int {
    return max(0, $kapasitas - $terisi);
}

function formatTanggal(string $tanggal): string {
    return date('d-m-Y', strtotime($tanggal));
}