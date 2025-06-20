indo-date-format

Format tanggal Indonesia untuk Laravel

Package ini memudahkan kamu untuk mengubah tanggal dari format dd/mm/YYYY menjadi format DD MMMM YYYY (misalnya 01/01/2025 → 01 Januari 2025) dalam aplikasi Laravel.

Fitur

Konversi tanggal dd/mm/YYYY ke format DD MMMM YYYY berbahasa Indonesia.

Dependensi minimal: PHP 7.4+ / 8.0+.

Mudah digunakan langsung pada kode atau via Facade/helper custom.

Instalasi

Tambahkan repository path di proyek Laravel kamu (opsional jika pakai Packagist):

"repositories": [
    {
        "type": "path",
        "url": "./packages/alfian/indo-date-format"
    }
]

Require package via Composer:

composer require alfian/indo-date-format:dev-main

Jika paket sudah ada di Packagist, cukup:

composer require alfian/indo-date-format

(Opsional) Jika belum auto-discoverable, daftarkan ServiceProvider di config/app.php:

'providers' => [
    // ...
    Alfian\IndoDateFormat\IndoDateServiceProvider::class,
],

Penggunaan

1. Menggunakan Kelas Langsung

use Alfian\IndoDateFormat\IndoDate;

$tgl = '01/01/2025';
echo IndoDate::format($tgl); // Output: 01 Januari 2025

2. Via Helper Function (jika diaktifkan)

Jika kamu telah menambahkan helper di composer.json:

// src/helpers.php
if (!function_exists('indo_date')) {
    function indo_date(string $tanggal): ?string
    {
        return Alfian\IndoDateFormat\IndoDate::format($tanggal);
    }
}

Gunakan di mana saja dalam aplikasi:

echo indo_date('15/08/2025'); // Output: 15 Agustus 2025

Konfigurasi (Opsional)

Jika ingin mengganti delimiter atau menambahkan format lain, extend kelas IndoDate di proyekmu:

namespace App\Services;

use Alfian\IndoDateFormat\IndoDate as BaseIndoDate;

class CustomDate extends BaseIndoDate
{
    public static function formatWithDash(string $tanggal)
    {
        return parent::format($tanggal, '-');
    }
}

Contributing

Fork repository ini

Buat feature branch (git checkout -b feature/nama-fitur)

Commit perubahan (git commit -m 'Menambahkan fitur baru')

Push ke branch (git push origin feature/nama-fitur)

Buka Pull Request

Kami sangat menghargai kontribusimu! 🎉

Lisensi

MIT © [Alfian Maulana]
