# KursusKu Prototype - Pertemuan 2 sampai 6

Project ini adalah satu prototype kumulatif untuk Mata Kuliah **Pemrograman Web III (PHP & MySQL)**. Struktur dan fitur mengikuti milestone praktikum Pertemuan 2-6: landing page PHP/HTML, kalkulator estimasi biaya, katalog data-driven, form GET/POST responsif, lalu integrasi percabangan, looping, validasi dasar, dan ringkasan biaya tanpa database.

## Menjalankan di Laragon

1. Salin folder `kursusku-prototype` ke `C:\laragon\www\`.
2. Jalankan **Start All** di Laragon.
3. Buka `http://kursusku-prototype.test/` atau `http://localhost/kursusku-prototype/`.
4. Jangan membuka file `.php` dengan `file:///` karena PHP harus diproses web server.

## Struktur inti

```text
kursusku-prototype/
├── index.php
├── server-time.php
├── fee-calculator.php
├── fee-tests.php
├── helpers.php
├── test-functions.php
├── type-data-test.php
├── operator-test.php
├── logic-test.php
├── bitwise-test.php
├── string-test.php
├── date-test.php
├── procedure-test.php
├── hello.php
├── assets/
│   ├── css/style.css
│   ├── images/hero-kursus.jpg
│   ├── img/image1.png
│   └── video/intro-kursus.mp4
└── evidence/
    ├── week-02/
    ├── week-03/
    ├── week-04/
    ├── week-05/
    └── week-06/
```

## Pertemuan 2 - Landing Page dan Server-side PHP

- `server-time.php` membuktikan bahwa `date()` diproses server.
- `index.php` memiliki header/navigation, satu `h1`, hero, keunggulan, katalog, alur daftar, media, kontak, dan footer.
- Nilai `$siteName`, `$tagline`, dan `$year` berasal dari PHP.
- Gambar memiliki `alt`, tersedia video MP4 lokal, link internal, dan link eksternal.

**Penjelasan server-side (80-120 kata):** Server-side scripting adalah proses ketika kode program dijalankan di server sebelum hasilnya dikirim ke browser. Pada KursusKu, PHP mengisi nama situs, tagline, tahun, data katalog, serta menjalankan fungsi untuk format uang, tanggal, status, dan sisa kursi. Browser tidak mengeksekusi source PHP tersebut; browser menerima HTML hasil eksekusi server. Hal ini dapat dibuktikan melalui View Page Source: yang tampak adalah teks dan elemen HTML final, sedangkan tag `<?php`, nama variabel seperti `$siteName`, dan logika PHP tidak muncul. Karena itu file PHP harus diakses melalui Laragon atau web server, bukan dibuka langsung sebagai file lokal.

## Pertemuan 3 - Rumus Bisnis Kalkulator

Rumus utama:

```text
subtotal = fee x participantCount
discount = subtotal x discountPercent / 100
total = subtotal - discount + adminFee
```

Semua nilai uang disimpan sebagai integer rupiah. `number_format()` hanya digunakan saat output.

### Lima test case

| No | Fee | Peserta | Diskon | Admin | Expected |
|---|---:|---:|---:|---:|---:|
| 1 | 350000 | 1 | 0% | 25000 | 375000 |
| 2 | 350000 | 1 | 10% | 25000 | 340000 |
| 3 | 350000 | 2 | 25% | 25000 | 550000 |
| 4 | 0 | 1 | 10% | 0 | 0 |
| 5 | 2500000 | 3 | 10% | 50000 | 6800000 |

Buka `fee-tests.php` untuk melihat expected vs actual beserta status PASS/FAIL.

## Pertemuan 4 - Array, Function, Logic, String, dan Date/Time

`index.php` memuat 6 record kursus dengan key yang sama: `code`, `name`, `fee`, `quota`, `registered`, `start_date`. Data dirender menggunakan `foreach`.

Empat function wajib pada `helpers.php`:

- `rupiah(int $amount): string`
- `statusKursus(int $quota, int $registered): string`
- `sisaKursi(int $quota, int $registered): int`
- `formatTanggal(string $date): string`

Buka `test-functions.php` untuk 6 pengujian function. File `type-data-test.php`, `operator-test.php`, `logic-test.php`, `bitwise-test.php`, `string-test.php`, `date-test.php`, dan `procedure-test.php` menyimpan latihan kecil dari seluruh tahapan praktikum.

## Evidence Portofolio

### Week 02
- `01-desktop.png`
- `02-mobile.png`
- `03-media.png`
- `04-view-source.png`

### Week 03
- `kalkulator.png`
- `test-case.png`
- `source-code.png`

### Week 04
- `katalog-6-kursus.png`
- `status-kursus.png`
- `test-functions.png`

## AI Usage Log

| Prompt/masalah | Saran AI | Keputusan | Hasil test |
|---|---|---|---|
| Review struktur project kumulatif P2-P4 | Pisahkan helper reusable dan pertahankan satu project | Diterima | Struktur project rapi |
| Verifikasi kalkulator biaya | Gunakan 5 test case expected vs actual | Diterima | 5/5 PASS |
| Verifikasi helper katalog | Uji format rupiah, status, sisa kursi, dan tanggal | Diterima | 6/6 PASS |

> Mahasiswa tetap harus dapat menjelaskan sendiri hubungan antara data, variabel, operator, function, `foreach`, HTML, dan hasil testing.


### Pengujian manual katalog

| Skenario | Expected | Hasil |
|---|---|---|
| quota 25, registered 25 | Penuh, sisa 0 | PASS |
| quota 25, registered 24 | Tersedia, sisa 1 | PASS |
| quota 20, registered 0 | Tersedia, sisa 20 | PASS |
| fee 350000 | Rp 350.000 | PASS |
| tanggal 2026-10-01 | 01-10-2026 | PASS |
| nama memiliki spasi luar | `trim()` membersihkan spasi | PASS |


## Pertemuan 5 - Form, CSS, GET/POST

- `registration.php` adalah milestone form dasar dengan POST.
- `process-registration.php` menerima `$_POST`, memberi default dengan `??`, menggunakan `trim()`, dan melakukan escaping output.
- `get-demo.php` mempertahankan eksperimen GET secara terpisah agar form akhir tetap POST.
- Form menggunakan text, email, tel, select, radio, checkbox, textarea, hidden, dan button.
- Bukti ada di `evidence/week-05/`, termasuk test matrix 12 skenario.

## Pertemuan 6 - Branching, Looping, dan Form Lanjutan

- `data.php` berisi array kursus, minat, dan fasilitas.
- `register.php` merender opsi kursus/minat dengan loop.
- `process.php` melakukan validasi dasar, branching diskon, aritmatika biaya, dan ringkasan.
- Diskon: mahasiswa 20%, guru 15%, umum 0%.
- `history.php` adalah data dummy + `foreach`, bukan CRUD/database.
- `loop-lab.php` membandingkan `for`, `while`, dan `do-while`.
- Bukti dan test matrix 12 skenario ada di `evidence/week-06/`.