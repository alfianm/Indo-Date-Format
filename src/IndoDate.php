<?php

namespace Alfian\IndoDateFormat;

class IndoDate
{
    protected static $bulan = [
        1  => 'Januari',
        2  => 'Februari',
        3  => 'Maret',
        4  => 'April',
        5  => 'Mei',
        6  => 'Juni',
        7  => 'Juli',
        8  => 'Agustus',
        9  => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    public static function format($tanggal, $delimiter = '/')
    {
        $tanggal = date('d/m/Y', strtotime($tanggal));
        if (!$tanggal || !str_contains($tanggal, $delimiter)) {
            return null; // atau return $tanggal; jika ingin tetap tampil
        }

        $parts = explode($delimiter, $tanggal);

        if (count($parts) !== 3) {
            return null; // atau log error
        }

        [$d, $m, $y] = $parts;

        $bulan = self::$bulan[(int)$m] ?? $m;

        return sprintf('%02d %s %d', $d, $bulan, $y);
    }
}
