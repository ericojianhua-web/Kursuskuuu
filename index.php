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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

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

        /* TOMBOL MENU */

        .menu-section {
            padding: 40px 8%;
            background: white;
            text-align: center;
        }

        .menu-section h2 {
            color: #2563eb;
            margin-bottom: 10px;
        }

        .menu-section p {
            color: #555;
            margin-bottom: 25px;
        }

        .menu-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .menu-button {
            display: inline-block;
            padding: 13px 22px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .menu-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        /* VIDEO */

        .media-section {
            padding: 50px 8%;
            text-align: center;
            background: #f8fafc;
        }

        .media-section h2 {
            color: #2563eb;
            margin-bottom: 10px;
        }

        .media-section p {
            color: #555;
            margin-bottom: 25px;
        }

        .video-container {
            max-width: 800px;
            margin: auto;
            background: #111827;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .video-container video {
            width: 100%;
            display: block;
            border-radius: 10px;
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
            grid-template-columns: repeat(
                auto-fit,
                minmax(230px, 1fr)
            );
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

        /* KONTAK */

        .contact-section {
            padding: 50px 8%;
            background: #dbeafe;
            text-align: center;
        }

        .contact-box {
            max-width: 650px;
            margin: auto;
            padding: 35px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.10);
        }

        .contact-icon {
            font-size: 45px;
            margin-bottom: 10px;
        }

        .contact-box h2 {
            color: #2563eb;
            margin-bottom: 10px;
        }

        .contact-box p {
            color: #555;
            line-height: 1.6;
        }

        .contact-box h3 {
            color: #222;
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 5px;
        }

        .contact-number {
            font-weight: bold;
            margin-bottom: 25px;
        }

        .contact-button {
            display: inline-block;
            padding: 13px 24px;
            background: #22c55e;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .contact-button:hover {
            background: #16a34a;
            transform: translateY(-2px);
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
                padding: 40px 6%;
            }

            .menu-section {
                padding: 35px 6%;
            }

            .contact-section {
                padding: 40px 6%;
            }

            .menu-button {
                width: 100%;
                max-width: 350px;
            }

            .contact-button {
                width: 100%;
                max-width: 350px;
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


<!-- MENU FITUR -->

<section class="menu-section">

    <h2>Fitur Kursuskuuu</h2>

    <p>
        Akses berbagai fitur pendukung pembelajaran PHP.
    </p>

    <div class="menu-buttons">

        <a
            href="fee-calculator.php"
            class="menu-button"
        >
            🧮 Kalkulator Biaya
        </a>

        <a
            href="server-time.php"
            class="menu-button"
        >
            🖥️ Server Time
        </a>

        <a
            href="test-functions.php"
            class="menu-button"
        >
            🔧 Fungsi PHP
        </a>

    </div>

</section>


<!-- VIDEO -->

<section class="media-section">

    <h2>Video Pengenalan Kursuskuuu</h2>

    <p>
        Simak video berikut untuk mengenal Kursuskuuu lebih dekat.
    </p>

    <div class="video-container">

        <video controls preload="metadata">

            <source
                src="assets/video/intro-kursus.mp4"
                type="video/mp4"
            >

            Browser Anda tidak mendukung pemutar video.

        </video>

    </div>

</section>


<!-- KATALOG -->

<main class="container">

    <h2>Katalog Kursus</h2>

    <div class="grid">

        <?php foreach ($kursus as $item): ?>

            <div class="card">

                <span
                    class="status <?= strtolower($item["status"]) ?>"
                >
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


<!-- KONTAK -->

<section class="contact-section">

    <div class="contact-box">

        <div class="contact-icon">
            📱
        </div>

        <h2>
            Hubungi Kami
        </h2>

        <p>
            Ada pertanyaan tentang Kursuskuuu?
            Silakan hubungi kami melalui WhatsApp.
        </p>

        <h3>
            Erico Jianhua
        </h3>

        <p class="contact-number">
            WhatsApp: 083130857411
        </p>

        <a
            href="https://wa.me/6283130857411"
            target="_blank"
            class="contact-button"
        >
            💬 Hubungi via WhatsApp
        </a>

    </div>

</section>


<!-- FOOTER -->

<footer>

    &copy; <?= date("Y") ?>
    <?= $namaWebsite ?>

</footer>

</body>

</html>
```
