```php
<?php

$namaWebsite = "Kursuskuuu";

$kursus = [
    [
        "nama" => "Dasar Pemrograman PHP",
        "kategori" => "Pemrograman",
        "harga" => 150000,
        "status" => "Tersedia"
    ],
    [
        "nama" => "HTML dan CSS",
        "kategori" => "Web Design",
        "harga" => 100000,
        "status" => "Tersedia"
    ],
    [
        "nama" => "JavaScript Dasar",
        "kategori" => "Pemrograman",
        "harga" => 175000,
        "status" => "Penuh"
    ],
    [
        "nama" => "Database MySQL",
        "kategori" => "Database",
        "harga" => 200000,
        "status" => "Tersedia"
    ],
    [
        "nama" => "Desain UI/UX",
        "kategori" => "Desain",
        "harga" => 125000,
        "status" => "Tersedia"
    ],
    [
        "nama" => "Git dan GitHub",
        "kategori" => "Tools",
        "harga" => 100000,
        "status" => "Penuh"
    ]
];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $namaWebsite ?></title>

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

        /* HEADER */

        header {
            background: #2563eb;
            color: white;
            padding: 20px 8%;
        }

        header h1 {
            margin: 0;
        }

        /* HERO */

        .hero {
            padding: 50px 8%;
            background: #dbeafe;
        }

        .hero-content {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .hero-text h2 {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .hero-text p {
            font-size: 18px;
            line-height: 1.6;
        }

        .hero-image img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 15px;
            display: block;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        /* MEDIA */

        .media-section {
            padding: 40px 8%;
            text-align: center;
            background: white;
        }

        .media-section h2 {
            margin-bottom: 20px;
            color: #2563eb;
        }

        .media-section video {
            width: 100%;
            max-width: 700px;
            border-radius: 12px;
        }

        /* KATALOG */

        .container {
            padding: 40px 8%;
        }

        .container h2 {
            margin-bottom: 25px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        /* CARD */

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card h3 {
            margin-top: 15px;
            min-height: 45px;
        }

        .card p {
            line-height: 1.5;
        }

        /* STATUS */

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .tersedia {
            background: #dcfce7;
            color: #166534;
        }

        .penuh {
            background: #fee2e2;
            color: #991b1b;
        }

        /* HARGA */

        .harga {
            color: #2563eb;
            font-size: 20px;
            font-weight: bold;
        }

        /* FOOTER */

        footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }

        /* MOBILE */

        @media (max-width: 768px) {

            .hero-content {
                grid-template-columns: 1fr;
            }

            .hero-text h2 {
                font-size: 28px;
            }

            .hero-image img {
                height: 250px;
            }

            .container {
                padding: 30px 6%;
            }

            .hero {
                padding: 40px 6%;
            }

            .media-section {
                padding: 30px 6%;
            }

        }

    </style>

</head>

<body>

<!-- HEADER -->

<header>

    <h1><?= $namaWebsite ?></h1>

</header>


<!-- HERO -->

<section class="hero">

    <div class="hero-content">

        <div class="hero-text">

            <h2>
                Belajar Teknologi,
                Bangun Masa Depan
            </h2>

            <p>
                Temukan berbagai kursus teknologi sederhana
                untuk meningkatkan kemampuan digital dan
                mengembangkan keterampilan masa depan.
            </p>

        </div>

        <div class="hero-image">

            <img
                src="assets/images/hero-kursus.jpg"
                alt="Kursus Teknologi"
            >

        </div>

    </div>

</section>


<!-- VIDEO -->

<section class="media-section">

    <h2>Video Pengenalan Kursuskuuu</h2>

    <video controls>

        <source
            src="assets/video/intro-kursus.mp4"
            type="video/mp4"
        >

        Browser Anda tidak mendukung pemutar video.

    </video>

</section>


<!-- KATALOG -->

<main class="container">

    <h2>Katalog Kursus</h2>

    <div class="grid">

        <?php foreach ($kursus as $item): ?>

            <div class="card">

                <span class="status <?= strtolower($item["status"]) ?>">

                    <?= $item["status"] ?>

                </span>

                <h3>

                    <?= $item["nama"] ?>

                </h3>

                <p>

                    <strong>Kategori:</strong>
                    <?= $item["kategori"] ?>

                </p>

                <p class="harga">

                    Rp<?= number_format(
                        $item["harga"],
                        0,
                        ",",
                        "."
                    ) ?>

                </p>

            </div>

        <?php endforeach; ?>

    </div>

</main>


<!-- FOOTER -->

<footer>

    &copy; <?= date("Y") ?>
    <?= $namaWebsite ?>

</footer>

</body>

</html>
```
