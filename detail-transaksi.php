<?php

/* =========================================================
   KURSUSKUUU - DETAIL TRANSAKSI
   Tanpa Database - Menggunakan riwayat.json
========================================================= */

$siteName = "Kursuskuuu";

$fileRiwayat = __DIR__ . "/riwayat.json";


/* =========================================================
   AMBIL NOMOR REGISTRASI
========================================================= */

$nomor =
    $_GET["nomor"] ?? "";


/* =========================================================
   BACA JSON
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
   CARI TRANSAKSI
========================================================= */

$transaksiDitemukan = null;


foreach ($riwayat as $transaksi) {

    if (
        ($transaksi["nomor"] ?? "") ===
        $nomor
    ) {

        $transaksiDitemukan =
            $transaksi;

        break;

    }

}

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
        Detail Transaksi -
        <?= htmlspecialchars($siteName) ?>
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


        header {

            background: #2563eb;

            color: white;

            padding: 18px 20px;

        }


        .header-container {

            max-width: 900px;

            margin: auto;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

        }


        .logo {

            font-size: 24px;

            font-weight: bold;

        }


        header a {

            background: white;

            color: #2563eb;

            text-decoration: none;

            padding: 9px 14px;

            border-radius: 7px;

            font-weight: bold;

        }


        .container {

            max-width: 900px;

            margin: 40px auto;

            padding: 0 20px;

        }


        .card {

            background: white;

            padding: 30px;

            border-radius: 15px;

            box-shadow:
                0 5px 20px
                rgba(0,0,0,0.08);

        }


        h1 {

            color: #2563eb;

            margin-top: 0;

        }


        .data-box {

            border: 1px solid #e5e7eb;

            border-radius: 10px;

            overflow: hidden;

        }


        .row {

            display: grid;

            grid-template-columns: 220px 1fr;

            border-bottom:
                1px solid #e5e7eb;

        }


        .row:last-child {

            border-bottom: none;

        }


        .label {

            background: #f9fafb;

            padding: 14px;

            font-weight: bold;

            color: #555;

        }


        .value {

            padding: 14px;

            word-break: break-word;

        }


        .total {

            color: #2563eb;

            font-size: 20px;

            font-weight: bold;

        }


        .status {

            display: inline-block;

            padding: 7px 12px;

            background: #dcfce7;

            color: #166534;

            border-radius: 20px;

            font-weight: bold;

        }


        .buttons {

            display: flex;

            gap: 10px;

            margin-top: 25px;

        }


        .button {

            flex: 1;

            padding: 13px;

            text-align: center;

            text-decoration: none;

            border-radius: 8px;

            font-weight: bold;

            border: none;

            cursor: pointer;

            font-size: 15px;

        }


        .back {

            background: #e5e7eb;

            color: #222;

        }


        .print {

            background: #2563eb;

            color: white;

        }


        .not-found {

            background: white;

            padding: 40px;

            text-align: center;

            border-radius: 15px;

        }


        footer {

            margin-top: 50px;

            background: #111827;

            color: white;

            text-align: center;

            padding: 25px;

        }


        @media (max-width: 600px) {

            .header-container {

                flex-direction: column;

                align-items: flex-start;

            }


            .container {

                padding: 0 12px;

            }


            .card {

                padding: 20px;

            }


            .row {

                grid-template-columns: 1fr;

            }


            .label {

                padding-bottom: 5px;

            }


            .value {

                padding-top: 5px;

            }


            .buttons {

                flex-direction: column;

            }

        }


        @media print {

            header,
            footer,
            .buttons {

                display: none;

            }


            body {

                background: white;

            }


            .card {

                box-shadow: none;

            }

        }

    </style>

</head>


<body>


<header>

    <div class="header-container">

        <div class="logo">

            <?= htmlspecialchars($siteName) ?>

        </div>


        <a href="riwayat-transaksi.php">

            ← Riwayat

        </a>

    </div>

</header>


<div class="container">


<?php if ($transaksiDitemukan === null): ?>


    <div class="not-found">

        <h2>

            ❌ Transaksi Tidak Ditemukan

        </h2>


        <p>

            Data transaksi yang kamu cari
            tidak ditemukan.

        </p>


        <a
            href="riwayat-transaksi.php"
            class="button back"
        >

            ← Kembali ke Riwayat

        </a>

    </div>


<?php else: ?>


    <div class="card">


        <h1>

            📄 Detail Transaksi

        </h1>


        <div class="data-box">


            <div class="row">

                <div class="label">
                    Nomor Registrasi
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan["nomor"]
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Tanggal
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan["tanggal"]
                        ?? "-"
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Nama Lengkap
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan["nama"]
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Email
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan["email"]
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    No HP / WhatsApp
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan["no_hp"]
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Program Studi
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan["prodi"]
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Kursus
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan["kursus"]
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Jenis Peserta
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan[
                            "jenis_peserta"
                        ]
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Interest
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan[
                            "interest"
                        ]
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Catatan
                </div>

                <div class="value">

                    <?php

                    if (
                        !empty(
                            $transaksiDitemukan[
                                "catatan"
                            ]
                        )
                    ) {

                        echo nl2br(
                            htmlspecialchars(
                                $transaksiDitemukan[
                                    "catatan"
                                ]
                            )
                        );

                    } else {

                        echo "-";

                    }

                    ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Harga Kursus
                </div>

                <div class="value">

                    Rp
                    <?= number_format(
                        $transaksiDitemukan[
                            "harga"
                        ],
                        0,
                        ",",
                        "."
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Diskon
                </div>

                <div class="value">

                    <?= htmlspecialchars(
                        $transaksiDitemukan[
                            "persen_diskon"
                        ]
                    ) ?>%

                    -

                    Rp
                    <?= number_format(
                        $transaksiDitemukan[
                            "jumlah_diskon"
                        ],
                        0,
                        ",",
                        "."
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Total Pembayaran
                </div>

                <div class="value total">

                    Rp
                    <?= number_format(
                        $transaksiDitemukan[
                            "total_biaya"
                        ],
                        0,
                        ",",
                        "."
                    ) ?>

                </div>

            </div>


            <div class="row">

                <div class="label">
                    Status
                </div>

                <div class="value">

                    <span class="status">

                        <?= htmlspecialchars(
                            $transaksiDitemukan[
                                "status"
                            ] ?? "Berhasil"
                        ) ?>

                    </span>

                </div>

            </div>


        </div>


        <div class="buttons">


            <a
                href="riwayat-transaksi.php"
                class="button back"
            >

                ← Kembali

            </a>


            <button
                onclick="window.print()"
                class="button print"
            >

                🖨️ Cetak

            </button>


        </div>


    </div>


<?php endif; ?>


</div>


<footer>

    &copy;
    <?= date("Y") ?>
    <?= htmlspecialchars($siteName) ?>

</footer>


</body>

</html>
