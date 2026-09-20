<?php

require_once "helpers.php";

$namaKursus = "Dasar Pemrograman PHP";
$hargaAwal = 150000;
$persenDiskon = 10;

$hargaAkhir = hitungDiskon($hargaAwal, $persenDiskon);
$jumlahDiskon = $hargaAwal - $hargaAkhir;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kalkulator Biaya - Kursuskuuu</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #222;
        }

        header {
            background: #2563eb;
            color: white;
            padding: 20px 8%;
        }

        header h1 {
            margin: 0;
        }

        .container {
            max-width: 650px;
            margin: 50px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #2563eb;
            margin-top: 0;
        }

        .kursus {
            background: #dbeafe;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .baris {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .label {
            color: #555;
        }

        .nilai {
            font-weight: bold;
        }

        .diskon {
            color: #16a34a;
        }

        .total {
            margin-top: 20px;
            padding: 20px;
            background: #eff6ff;
            border-radius: 10px;
            text-align: center;
        }

        .total p {
            margin: 0 0 10px;
            color: #555;
        }

        .total h3 {
            margin: 0;
            color: #2563eb;
            font-size: 30px;
        }

        .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .kembali:hover {
            background: #1d4ed8;
        }

    </style>

</head>

<body>

<header>

    <h1>Kursuskuuu</h1>

</header>

<div class="container">

    <div class="card">

        <h2>Kalkulator Biaya Kursus</h2>

        <div class="kursus">

            <strong><?= $namaKursus ?></strong>

        </div>

        <div class="baris">

            <span class="label">
                Harga Awal
            </span>

            <span class="nilai">
                <?= formatRupiah($hargaAwal) ?>
            </span>

        </div>

        <div class="baris">

            <span class="label">
                Diskon
            </span>

            <span class="nilai diskon">
                <?= $persenDiskon ?>%
            </span>

        </div>

        <div class="baris">

            <span class="label">
                Jumlah Diskon
            </span>

            <span class="nilai diskon">
                - <?= formatRupiah($jumlahDiskon) ?>
            </span>

        </div>

        <div class="total">

            <p>
                Harga Setelah Diskon
            </p>

            <h3>
                <?= formatRupiah($hargaAkhir) ?>
            </h3>

        </div>

        <a href="index.php" class="kembali">
            ← Kembali ke Katalog
        </a>

    </div>

</div>

</body>

</html>