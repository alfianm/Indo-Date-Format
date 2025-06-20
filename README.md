# indo-date-format

[![Packagist Version](https://img.shields.io/packagist/v/alfian/indo-date-format.svg)](https://packagist.org/packages/alfian/indo-date-format)
[![License](https://img.shields.io/packagist/l/alfian/indo-date-format.svg)](LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/alfian/indo-date-format.svg)](https://www.php.net)

**Format tanggal Indonesia untuk Laravel**

> Mengubah tanggal dari format `dd/mm/YYYY` menjadi format `DD MMMM YYYY` (misalnya `01/01/2025` → `01 Januari 2025`) dalam aplikasi Laravel.

---

## 📋 Daftar Isi

- [Fitur](#-fitur)
- [Instalasi](#-instalasi)
- [Penggunaan](#-penggunaan)
  - [1. Kelas Langsung](#1-kelas-langsung)
  - [2. Helper Function](#2-helper-function)
- [Konfigurasi (Opsional)](#-konfigurasi-opsional)
- [Contributing](#contributing)
- [Lisensi](#lisensi)

---

## 🚀 Fitur

- Konversi tanggal `dd/mm/YYYY` ke format `DD MMMM YYYY` berbahasa Indonesia.
- Autodiscoverable di Laravel 5.5+.
- Dukungan PHP 7.4, 8.0 ke atas.

---

## 🔧 Instalasi

1. **Via Packagist**

   ```bash
   composer require alfian/indo-date-format
   ```

2. **Via Path Repository** (local development)

   - Tambahkan di `composer.json` proyek:
     ```json
     "repositories": [
       {
         "type": "path",
         "url": "./packages/alfian/indo-date-format"
       }
     ]
     ```
   - Jalankan:
     ```bash
     composer require alfian/indo-date-format:dev-main
     ```

3. **(Opsional)** Jika Laravel tidak auto-discover, tambahkan di `config/app.php`:
   ```php
   'providers' => [
       // ...
       Alfian\IndoDateFormat\IndoDateServiceProvider::class,
   ],
   ```

---

## 📖 Penggunaan

### 1. Kelas Langsung

```php
use Alfian\IndoDateFormat\IndoDate;

echo IndoDate::format('01/01/2025');
// => 01 Januari 2025
```

### 2. Helper Function

> Pastikan kamu menambahkan `src/helpers.php` dan mengautoload file tersebut di `composer.json`:

```php
// src/helpers.php
if (! function_exists('indo_date')) {
    function indo_date(string $tanggal): ?string
    {
        return Alfian\IndoDateFormat\IndoDate::format($tanggal);
    }
}
```

```json
"autoload": {
    "psr-4": {
        "Alfian\\IndoDateFormat\\": "src/"
    },
    "files": [
       "src/helpers.php"
    ]
}
```

```bash
composer dump-autoload
```

```php
// Gunakan di mana saja
echo indo_date('15/08/2025');
// => 15 Agustus 2025
```

---

## ⚙️ Konfigurasi (Opsional)

Kamu bisa extend kelas dasar untuk kebutuhan khusus:

```php
namespace App\Services;

use Alfian\IndoDateFormat\IndoDate as BaseIndoDate;

class CustomDate extends BaseIndoDate
{
    public static function formatWithDash(string $tanggal)
    {
        return parent::format($tanggal, '-');
    }
}
```

---

## 🤝 Contributing

1. Fork repository ini
2. Buat branch fitur: `git checkout -b feature/nama-fitur`
3. Commit perubahan: `git commit -m 'Menambahkan fitur baru'`
4. Push ke remote: `git push origin feature/nama-fitur`
5. Buka Pull Request

---

## 📄 Lisensi

MIT © [Alfian Maulana]
