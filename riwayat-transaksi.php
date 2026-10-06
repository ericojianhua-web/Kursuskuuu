<?php

/* =========================================================
   KURSUSKUUU - RIWAYAT TRANSAKSI
   Tanpa Database - Membaca riwayat.json
========================================================= */

$siteName = "Kursuskuuu";

$fileRiwayat = __DIR__ . "/riwayat.json";


/* =========================================================
   BACA FILE JSON
========================================================= */

$riwayat = [];


if (file_exists($fileRiwayat)) {

    $isiFile =
        file_get_contents($fileRiwayat);


    $data =
        json_decode(
            $isiFile,
            true
        );


    if (is_array($data)) {

        $riwayat = $data;

    }

}


/* =========================================================
   URUTKAN DATA TERBARU DI ATAS
========================================================= */

$riwayat =
    array_reverse($riwayat);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($siteName) ?> -
        Riwayat Transaksi
    </title>


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


        /* =========================
           HEADER
        ========================= */

        header {

            background: #2563eb;

            color: white;

            padding: 18px 20px;

            position: sticky;

            top: 0;

            z-index: 100;

        }


        .header-container {

            max-width: 1200px;

            margin: auto;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

        }


        .logo {

            font-size: 24px;

            font-weight: bold;

        }


        nav {

            display: flex;

            gap: 10px;

            flex-wrap: wrap;

        }


        nav a {

            color: white;

            text-decoration: none;

            padding: 9px 13px;

            border-radius: 7px;

            font-weight: bold;

            font-size: 14px;

        }


        nav a:hover {

            background:
                rgba(255,255,255,0.2);

        }


        /* =========================
           CONTAINER
        ========================= */

        .container {

            max-width: 1200px;

            margin: 40px auto;

            padding: 0 20px;

        }


        /* =========================
           TITLE
        ========================= */

        .page-title {

            color: #2563eb;

            margin-bottom: 8px;

        }


        .description {

            color: #666;

            margin-bottom: 25px;

        }


        /* =========================
           SUMMARY
        ========================= */

        .summary {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;

            margin-bottom: 25px;

        }


        .summary-card {

            background: white;

            padding: 20px;

            border-radius: 12px;

            box-shadow:
                0 5px 15px
                rgba(0,0,0,0.07);

        }


        .summary-label {

            color: #666;

            font-size: 14px;

        }


        .summary-number {

            color: #2563eb;

            font-size: 28px;

            font-weight: bold;

            margin-top: 5px;

        }


        /* =========================
           EMPTY
        ========================= */

        .empty {

            background: white;

            padding: 50px 20px;

            text-align: center;

            border-radius: 15px;

            box-shadow:
                0 5px 20px
                rgba(0,0,0,0.08);

        }


        .empty-icon {

            font-size: 60px;

            margin-bottom: 10px;

        }


        .empty h2 {

            color: #555;

        }


        .empty p {

            color: #777;

        }


        .register-button {

            display: inline-block;

            margin-top: 15px;

            padding: 12px 20px;

            background: #2563eb;

            color: white;

            text-decoration: none;

            border-radius: 8px;

            font-weight: bold;

        }


        /* =========================
           TABLE
        ========================= */

        .table-wrapper {

            background: white;

            border-radius: 15px;

            overflow-x: auto;

            box-shadow:
                0 5px 20px
                rgba(0,0,0,0.08);

        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 850px;

        }


        th {

            background: #2563eb;

            color: white;

            padding: 15px;

            text-align: left;

            white-space: nowrap;

        }


        td {

            padding: 14px 15px;

            border-bottom:
                1px solid #e5e7eb;

            vertical-align: middle;

        }


        tr:hover td {

            background: #f8fafc;

        }


        .nomor {

            font-weight: bold;

            color: #2563eb;

        }


        .harga {

            font-weight: bold;

            color: #2563eb;

            white-space: nowrap;

        }


        .status {

            display: inline-block;

            padding: 6px 10px;

            border-radius: 20px;

            background: #dcfce7;

            color: #166534;

            font-size: 13px;

            font-weight: bold;

        }


        .detail-button {

            display: inline-block;

            padding: 8px 12px;

            background: #2563eb;

            color: white;

            text-decoration: none;

            border-radius: 6px;

            font-size: 13px;

            font-weight: bold;

        }


        .detail-button:hover {

            background: #1d4ed8;

        }


        /* =========================
           FOOTER
        ========================= */

        footer {

            margin-top: 50px;

            padding: 25px;

            background: #111827;

            color: white;

            text-align: center;

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 700px) {

            .header-container {

                flex-direction: column;

                align-items: flex-start;

            }


            nav {

                width: 100%;

            }


            .container {

                margin: 25px auto;

                padding: 0 12px;

            }


            .summary {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     HEADER
===================================================== -->

<header>

    <div class="header-container">


        <div class="logo">

            <?= htmlspecialchars($siteName) ?>

        </div>


        <nav>

            <a href="index.php">
                🏠 Beranda
            </a>


            <a href="registration.php">
                📝 Registrasi
            </a>


            <a href="riwayat-transaksi.php">
                📋 Riwayat
            </a>

        </nav>


    </div>

</header>


<!-- =====================================================
     CONTENT
===================================================== -->

<div class="container">


    <h1 class="page-title">

        📋 Riwayat Transaksi

    </h1>


    <p class="description">

        Daftar seluruh pendaftaran kursus yang
        tersimpan di sistem.

    </p>


    <!-- =================================================
         RINGKASAN
    ================================================= -->

    <div class="summary">


        <div class="summary-card">

            <div class="summary-label">

                Total Transaksi

            </div>


            <div class="summary-number">

                <?= count($riwayat) ?>

            </div>

        </div>


        <div class="summary-card">

            <div class="summary-label">

                Total Pendapatan

            </div>


            <div class="summary-number">

                <?php

                $totalPendapatan = 0;


                foreach ($riwayat as $transaksi) {

                    $totalPendapatan +=
                        (float) (
                            $transaksi["total_biaya"]
                            ?? 0
                        );

                }


                echo "Rp " .
                    number_format(
                        $totalPendapatan,
                        0,
                        ",",
                        "."
                    );

                ?>

            </div>

        </div>


        <div class="summary-card">

            <div class="summary-label">

                Data Penyimpanan

            </div>


            <div class="summary-number">

                JSON

            </div>

        </div>


    </div>


<?php if (empty($riwayat)): ?>


    <!-- =================================================
         BELUM ADA DATA
    ================================================= -->

    <div class="empty">


        <div class="empty-icon">

            📭

        </div>


        <h2>

            Belum Ada Riwayat Transaksi

        </h2>


        <p>

            Belum ada peserta yang melakukan
            registrasi kursus.

        </p>


        <a
            href="registration.php"
            class="register-button"
        >

            📝 Daftar Kursus

        </a>


    </div>


<?php else: ?>


    <!-- =================================================
         TABEL RIWAYAT
    ================================================= -->

    <div class="table-wrapper">


        <table>


            <thead>

                <tr>

                    <th>
                        No
                    </th>

                    <th>
                        Nomor Registrasi
                    </th>

                    <th>
                        Tanggal
                    </th>

                    <th>
                        Nama
                    </th>

                    <th>
                        Kursus
                    </th>

                    <th>
                        Jenis Peserta
                    </th>

                    <th>
                        Total
                    </th>

                    <th>
                        Status
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>


            <?php

            $no = 1;

            foreach ($riwayat as $transaksi):

            ?>


                <tr>


                    <td>

                        <?= $no++ ?>

                    </td>


                    <td>

                        <span class="nomor">

                            <?= htmlspecialchars(
                                $transaksi["nomor"]
                                ?? "-"
                            ) ?>

                        </span>

                    </td>


                    <td>

                        <?= htmlspecialchars(
                            $transaksi["tanggal"]
                            ?? "-"
                        ) ?>

                    </td>


                    <td>

                        <?= htmlspecialchars(
                            $transaksi["nama"]
                            ?? "-"
                        ) ?>

                    </td>


                    <td>

                        <?= htmlspecialchars(
                            $transaksi["kursus"]
                            ?? "-"
                        ) ?>

                    </td>


                    <td>

                        <?= htmlspecialchars(
                            $transaksi[
                                "jenis_peserta"
                            ] ?? "-"
                        ) ?>

                    </td>


                    <td>

                        <span class="harga">

                            Rp
                            <?= number_format(
                                $transaksi[
                                    "total_biaya"
                                ] ?? 0,
                                0,
                                ",",
                                "."
                            ) ?>

                        </span>

                    </td>


                    <td>

                        <span class="status">

                            <?= htmlspecialchars(
                                $transaksi["status"]
                                ?? "Berhasil"
                            ) ?>

                        </span>

                    </td>


                    <td>

                        <a
                            href="detail-transaksi.php?nomor=<?= urlencode(
                                $transaksi["nomor"] ?? ""
                            ) ?>"
                            class="detail-button"
                        >

                            👁️ Detail

                        </a>

                    </td>


                </tr>


            <?php endforeach; ?>


            </tbody>


        </table>


    </div>


<?php endif; ?>


</div>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    &copy;
    <?= date("Y") ?>
    <?= htmlspecialchars($siteName) ?>

</footer>


</body>

</html>
