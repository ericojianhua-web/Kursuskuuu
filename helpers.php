<?php

function formatRupiah($angka)
{
    return "Rp" . number_format($angka, 0, ",", ".");
}

function statusKursus($status)
{
    if ($status === "Tersedia") {
        return "Kursus masih dapat diikuti";
    }

    if ($status === "Penuh") {
        return "Kursus sudah penuh";
    }

    return "Status tidak diketahui";
}

function hitungDiskon($harga, $persen)
{
    $diskon = $harga * ($persen / 100);

    return $harga - $diskon;
}

function tambahKursus($daftarKursus, $kursusBaru)
{
    $daftarKursus[] = $kursusBaru;

    return $daftarKursus;
}