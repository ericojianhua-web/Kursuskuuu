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
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #222;
        }

        /*
        |--------------------------------------------------------------------------
        | HEADER
        |--------------------------------------------------------------------------
        */

        header {
            background: #2563eb;
            color: white;
            padding: 15px 8%;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
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
            white-space: nowrap;
        }

        /*
        |--------------------------------------------------------------------------
        | NAVIGASI
        |--------------------------------------------------------------------------
        */

        nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 9px 12px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /*
        |--------------------------------------------------------------------------
        | HERO
        |--------------------------------------------------------------------------
        */

        .hero {
            padding: 50px 8%;
            background: #dbeafe;
            scroll-margin-top: 80px;
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

        /*
        |--------------------------------------------------------------------------
        | MENU FITUR
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | VIDEO
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | KATALOG
        |--------------------------------------------------------------------------
        */

        .container {
            padding: 40px 8%;
            scroll-margin-top: 80px;
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

        /*
        |--------------------------------------------------------------------------
        | CARD
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | HARGA
        |--------------------------------------------------------------------------
        */

        .harga {
            color: #2563eb;
            font-size: 20px;
            font-weight: bold;
        }

        /*
        |--------------------------------------------------------------------------
        | TOMBOL REGISTRASI
        |--------------------------------------------------------------------------
        */

        .register-button {
            display: block;
            width: 100%;
            margin-top: 15px;
            padding: 12px 15px;
            background: #2563eb;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .register-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .register-disabled {
            display: block;
            width: 100%;
            margin-top: 15px;
            padding: 12px 15px;
            background: #9ca3af;
            color: white;
            text-align: center;
            border-radius: 8px;
            font-weight: bold;
            cursor: not-allowed;
        }

        /*
        |--------------------------------------------------------------------------
        | FAQ
        |--------------------------------------------------------------------------
        */

        .faq-section {
            padding: 50px 8%;
            background: white;
            scroll-margin-top: 80px;
        }

        .faq-container {
            max-width: 900px;
            margin: auto;
        }

        .faq-section h2 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 10px;
        }

        .faq-description {
            text-align: center;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .faq-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            margin-bottom: 15px;
            overflow: hidden;
            transition: 0.3s;
        }

        .faq-item:hover {
            border-color: #93c5fd;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
        }

        .faq-item summary {
            padding: 18px 20px;
            cursor: pointer;
            font-weight: bold;
            color: #222;
            list-style: none;
            position: relative;
            padding-right: 50px;
        }

        .faq-item summary::-webkit-details-marker {
            display: none;
        }

        .faq-item summary::after {
            content: "+";
            position: absolute;
            right: 20px;
            top: 14px;
            font-size: 25px;
            color: #2563eb;
            font-weight: normal;
        }

        .faq-item[open] summary::after {
            content: "−";
        }

        .faq-item[open] summary {
            color: #2563eb;
            background: #eff6ff;
        }

        .faq-answer {
            padding: 0 20px 18px;
            color: #555;
            line-height: 1.7;
            background: #eff6ff;
        }

        /*
        |--------------------------------------------------------------------------
        | KONTAK
        |--------------------------------------------------------------------------
        */

        .contact-section {
            padding: 50px 8%;
            background: #dbeafe;
            text-align: center;
            scroll-margin-top: 80px;
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

        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }

        /*
        |--------------------------------------------------------------------------
        | MOBILE
        |--------------------------------------------------------------------------
        */

        @media (max-width: 768px) {

            header {
                padding: 15px 6%;
            }

            .header-container {
                flex-direction: column;
                gap: 12px;
            }

            .logo {
                font-size: 22px;
            }

            nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            nav a {
                font-size: 13px;
                padding: 8px 10px;
            }

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

            .faq-section {
                padding: 40px 6%;
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

            .faq-item summary {
                padding: 16px 45px 16px 15px;
                font-size: 14px;
            }

            .faq-answer {
                padding: 0 15px 16px;
                font-size: 14px;
            }

        }

    </style>

</head>

<body>


<!--
|--------------------------------------------------------------------------
| HEADER + NAVIGASI
|--------------------------------------------------------------------------
-->

<header>

    <div class="header-container">

        <div class="logo">
            <?= $namaWebsite ?>
        </div>

        <nav>

            <a href="#beranda">
                🏠 Beranda
            </a>

            <a href="#katalog">
                📚 Katalog
            </a>

            <a href="fee-calculator.php">
                🧮 Kalkulator
            </a>

            <a href="registration.php">
                📝 Registrasi
            </a>

            <a href="#faq">
                ❓ FAQ
            </a>

            <a href="#kontak">
                📞 Kontak
            </a>

        </nav>

    </div>

</header>


<!--
|--------------------------------------------------------------------------
| HERO / BERANDA
|--------------------------------------------------------------------------
-->

<section
    class="hero"
    id="beranda"
>

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


<!--
|--------------------------------------------------------------------------
| MENU FITUR
|--------------------------------------------------------------------------
-->

<section class="menu-section">

    <h2>
        Fitur Kursuskuuu
    </h2>

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


<!--
|--------------------------------------------------------------------------
| VIDEO
|--------------------------------------------------------------------------
-->

<section class="media-section">

    <h2>
        Video Pengenalan Kursuskuuu
    </h2>

    <p>
        Simak video berikut untuk mengenal Kursuskuuu lebih dekat.
    </p>

    <div class="video-container">

        <video
            controls
            preload="metadata"
        >

            <source
                src="assets/video/intro-kursus.mp4"
                type="video/mp4"
            >

            Browser Anda tidak mendukung pemutar video.

        </video>

    </div>

</section>


<!--
|--------------------------------------------------------------------------
| KATALOG
|--------------------------------------------------------------------------
-->

<main
    class="container"
    id="katalog"
>

    <h2>
        Katalog Kursus
    </h2>

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

                    <strong>
                        Kategori:
                    </strong>

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

                <?php if ($item["status"] === "Tersedia"): ?>

                    <a
                        href="registration.php?kursus=<?= urlencode($item["nama"]) ?>"
                        class="register-button"
                    >
                        📝 Daftar Sekarang
                    </a>

                <?php else: ?>

                    <div class="register-disabled">
                        Kursus Penuh
                    </div>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>

</main>


<!--
|--------------------------------------------------------------------------
| FAQ
|--------------------------------------------------------------------------
-->

<section
    class="faq-section"
    id="faq"
>

    <div class="faq-container">

        <h2>
            ❓ Frequently Asked Questions
        </h2>

        <p class="faq-description">
            Temukan jawaban dari pertanyaan yang sering
            ditanyakan mengenai Kursuskuuu.
        </p>


        <details class="faq-item">

            <summary>
                Apa itu Kursuskuuu?
            </summary>

            <div class="faq-answer">

                Kursuskuuu adalah platform kursus yang menyediakan
                berbagai pembelajaran teknologi seperti PHP, HTML,
                CSS, JavaScript, Database, UI/UX, serta Git dan GitHub.

            </div>

        </details>


        <details class="faq-item">

            <summary>
                Bagaimana cara mendaftar kursus?
            </summary>

            <div class="faq-answer">

                Pilih kursus yang tersedia pada bagian Katalog Kursus,
                kemudian klik tombol "Daftar Sekarang". Setelah itu,
                Anda akan diarahkan ke halaman registrasi untuk
                melanjutkan proses pendaftaran.

            </div>

        </details>


        <details class="faq-item">

            <summary>
                Apakah semua kursus bisa didaftarkan?
            </summary>

            <div class="faq-answer">

                Tidak. Kursus yang memiliki status "Tersedia"
                dapat didaftarkan. Sedangkan kursus dengan status
                "Penuh" tidak dapat didaftarkan untuk sementara.

            </div>

        </details>


        <details class="faq-item">

            <summary>
                Berapa biaya kursus di Kursuskuuu?
            </summary>

            <div class="faq-answer">

                Setiap kursus memiliki biaya yang berbeda.
                Harga kursus dapat dilihat langsung pada bagian
                Katalog Kursus di halaman utama.

            </div>

        </details>


        <details class="faq-item">

            <summary>
                Apakah tersedia kalkulator biaya kursus?
            </summary>

            <div class="faq-answer">

                Ya. Kursuskuuu menyediakan fitur Kalkulator Biaya
                yang dapat digunakan untuk membantu menghitung
                biaya kursus. Fitur tersebut dapat diakses melalui
                menu "Kalkulator" pada navigasi.

            </div>

        </details>


        <details class="faq-item">

            <summary>
                Apakah Kursuskuuu menyediakan materi pemrograman?
            </summary>

            <div class="faq-answer">

                Ya. Tersedia beberapa kursus pemrograman seperti
                Dasar Pemrograman PHP dan JavaScript Dasar.
                Selain itu tersedia juga kursus HTML dan CSS,
                Database MySQL, Desain UI/UX, serta Git dan GitHub.

            </div>

        </details>


        <details class="faq-item">

            <summary>
                Bagaimana jika saya memiliki pertanyaan lain?
            </summary>

            <div class="faq-answer">

                Jika pertanyaan Anda belum terjawab di halaman FAQ,
                silakan hubungi kami melalui WhatsApp pada bagian
                "Hubungi Kami" di bawah halaman.

            </div>

        </details>

    </div>

</section>


<!--
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
-->

<section
    class="contact-section"
    id="kontak"
>

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


<!--
|--------------------------------------------------------------------------
| FOOTER
|--------------------------------------------------------------------------
-->

<footer>

    &copy; <?= date("Y") ?>
    <?= $namaWebsite ?>

</footer>


</body>

</html>
