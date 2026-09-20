<?php

require_once "helpers.php";

$tests = [];

function tambahTest(&$tests, $nama, $hasil)
{
    $tests[] = [
        "nama" => $nama,
        "hasil" => $hasil
    ];
}

/*
 * TEST 1
 * Menguji formatRupiah()
 */
tambahTest(
    $tests,
    "Test format Rupiah",
    formatRupiah(150000) === "Rp150.000"
);

/*
 * TEST 2
 * Menguji status Tersedia
 */
tambahTest(
    $tests,
    "Test status Tersedia",
    statusKursus("Tersedia") === "Kursus masih dapat diikuti"
);

/*
 * TEST 3
 * Menguji status Penuh
 */
tambahTest(
    $tests,
    "Test status Penuh",
    statusKursus("Penuh") === "Kursus sudah penuh"
);

/*
 * TEST 4
 * Menguji perhitungan diskon
 */
tambahTest(
    $tests,
    "Test hitung diskon",
    hitungDiskon(100000, 10) === 90000
);

/*
 * TEST 5
 * Menguji penambahan kursus
 */
$daftar = [];

$kursusBaru = [
    "nama" => "Pemrograman Python",
    "kategori" => "Pemrograman",
    "harga" => 150000,
    "status" => "Tersedia"
];

$hasilTambah = tambahKursus($daftar, $kursusBaru);

tambahTest(
    $tests,
    "Test tambah kursus",
    count($hasilTambah) === 1
);

/*
 * TEST 6
 * Menguji data kursus yang ditambahkan
 */
tambahTest(
    $tests,
    "Test nama kursus baru",
    $hasilTambah[0]["nama"] === "Pemrograman Python"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test Functions - Kursuskuuu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .test {
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            background: #dcfce7;
            color: #166534;
        }

        .pass {
            font-weight: bold;
        }

        h1 {
            color: #2563eb;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Hasil Test Functions</h1>

    <?php foreach ($tests as $test): ?>

        <div class="test">

            <span class="pass">
                <?= $test["hasil"] ? "PASS" : "FAIL" ?>
            </span>

            -
            <?= $test["nama"] ?>

        </div>

    <?php endforeach; ?>

</div>

</body>

</html>