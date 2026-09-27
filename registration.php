```php
<?php

$siteName = "Kursuskuuu";
$tagline = "Belajar Teknologi, Bangun Masa Depan";

/*
|--------------------------------------------------------------------------
| Kursus dari katalog
|--------------------------------------------------------------------------
*/

$kursusDipilih = $_GET['kursus'] ?? '';

/*
|--------------------------------------------------------------------------
| Data hasil registrasi
|--------------------------------------------------------------------------
*/

$dataRegistrasi = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $noHp = trim($_POST["no_hp"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $kursus = trim($_POST["kursus"] ?? "");
    $jenisPeserta = trim($_POST["jenis_peserta"] ?? "");
    $minat = $_POST["minat"] ?? [];
    $catatan = trim($_POST["catatan"] ?? "");

    /*
    |--------------------------------------------------------------------------
    | Nomor registrasi
    |--------------------------------------------------------------------------
    */

    $nomorRegistrasi = "REG-" . date("YmdHis");

    /*
    |--------------------------------------------------------------------------
    | Gabungkan minat tambahan
    |--------------------------------------------------------------------------
    */

    if (!empty($minat)) {
        $minatTambahan = implode(", ", $minat);
    } else {
        $minatTambahan = "Tidak ada";
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan data untuk ditampilkan
    |--------------------------------------------------------------------------
    */

    $dataRegistrasi = [
        "nomor" => $nomorRegistrasi,
        "nama" => $nama,
        "email" => $email,
        "no_hp" => $noHp,
        "prodi" => $prodi,
        "kursus" => $kursus,
        "jenis_peserta" => $jenisPeserta,
        "minat" => $minatTambahan,
        "catatan" => $catatan
    ];
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
        <?= $dataRegistrasi ? "Registrasi Berhasil - " : "" ?>
        <?= $siteName ?>
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

        /* HEADER */

        header {
            background: #2563eb;
            color: white;
            padding: 20px 8%;
        }

        header h1 {
            margin: 0;
        }

        /* CONTAINER */

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* CARD */

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.10);
        }

        .card h2 {
            color: #2563eb;
            text-align: center;
            margin-top: 0;
        }

        .description {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* FORM */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* RADIO */

        .radio-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .radio-item input {
            width: auto;
        }

        /* CHECKBOX */

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-item input {
            width: auto;
        }

        /* BUTTON */

        .submit-button {
            width: 100%;
            border: none;
            padding: 14px;
            background: #2563eb;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        /* HASIL REGISTRASI */

        .success-icon {
            width: 75px;
            height: 75px;
            margin: 0 auto 15px;
            background: #dcfce7;
            color: #16a34a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .success-title {
            color: #16a34a !important;
            margin-bottom: 10px;
        }

        .success-text {
            text-align: center;
            color: #555;
            line-height: 1.6;
        }

        .registration-number {
            margin: 25px 0;
            padding: 15px;
            background: #eff6ff;
            border-radius: 10px;
            text-align: center;
        }

        .registration-number span {
            display: block;
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .registration-number strong {
            color: #2563eb;
            font-size: 22px;
        }

        /* DATA */

        .data-box {
            margin-top: 25px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
        }

        .data-row {
            display: grid;
            grid-template-columns: 200px 1fr;
            border-bottom: 1px solid #e5e7eb;
        }

        .data-row:last-child {
            border-bottom: none;
        }

        .data-label {
            padding: 13px 15px;
            background: #f8fafc;
            font-weight: bold;
        }

        .data-value {
            padding: 13px 15px;
        }

        /* STATUS */

        .status-success {
            margin-top: 25px;
            padding: 15px;
            background: #dcfce7;
            color: #166534;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }

        /* ACTION BUTTON */

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .action-button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            border: none;
            font-size: 15px;
        }

        .back-button {
            background: #2563eb;
            color: white;
        }

        .back-button:hover {
            background: #1d4ed8;
        }

        .print-button {
            background: #16a34a;
            color: white;
        }

        .print-button:hover {
            background: #15803d;
        }

        /* FOOTER */

        footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

        /* PRINT */

        @media print {

            header,
            footer,
            .action-buttons {
                display: none;
            }

            body {
                background: white;
            }

            .container {
                margin: 0;
                max-width: 100%;
            }

            .card {
                box-shadow: none;
                border: 1px solid #ddd;
            }

        }

        /* MOBILE */

        @media (max-width: 600px) {

            .container {
                margin: 25px auto;
            }

            .card {
                padding: 25px 20px;
            }

            .data-row {
                grid-template-columns: 1fr;
            }

            .data-label {
                padding-bottom: 5px;
            }

            .data-value {
                padding-top: 5px;
            }

        }

    </style>

</head>

<body>

<!-- HEADER -->

<header>

    <h1><?= $siteName ?></h1>

</header>


<div class="container">

<?php if ($dataRegistrasi === null): ?>

    <!-- =========================================================
         FORM REGISTRASI
         ========================================================= -->

    <div class="card">

        <h2>📝 Form Registrasi Kursus</h2>

        <p class="description">
            Silakan isi data berikut untuk melakukan pendaftaran
            kursus di <?= $siteName ?>.
        </p>


        <form method="POST" action="registration.php">

            <!-- NAMA -->

            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="contoh@email.com"
                    required
                >

            </div>


            <!-- NO HP -->

            <div class="form-group">

                <label for="no_hp">
                    No HP / WhatsApp
                </label>

                <input
                    type="text"
                    id="no_hp"
                    name="no_hp"
                    placeholder="08xxxxxxxxxx"
                    required
                >

            </div>


            <!-- PROGRAM STUDI -->

            <div class="form-group">

                <label for="prodi">
                    Program Studi
                </label>

                <input
                    type="text"
                    id="prodi"
                    name="prodi"
                    placeholder="Contoh: Pendidikan Teknik Informatika"
                    required
                >

            </div>


            <!-- KURSUS -->

            <div class="form-group">

                <label for="kursus">
                    Kursus yang Dipilih
                </label>

                <select
                    id="kursus"
                    name="kursus"
                    required
                >

                    <option value="">
                        -- Pilih Kursus --
                    </option>

                    <option
                        value="Dasar Pemrograman PHP"
                        <?= $kursusDipilih === "Dasar Pemrograman PHP" ? "selected" : "" ?>
                    >
                        Dasar Pemrograman PHP
                    </option>

                    <option
                        value="HTML dan CSS"
                        <?= $kursusDipilih === "HTML dan CSS" ? "selected" : "" ?>
                    >
                        HTML dan CSS
                    </option>

                    <option
                        value="JavaScript Dasar"
                        <?= $kursusDipilih === "JavaScript Dasar" ? "selected" : "" ?>
                    >
                        JavaScript Dasar
                    </option>

                    <option
                        value="Database MySQL"
                        <?= $kursusDipilih === "Database MySQL" ? "selected" : "" ?>
                    >
                        Database MySQL
                    </option>

                    <option
                        value="Desain UI/UX"
                        <?= $kursusDipilih === "Desain UI/UX" ? "selected" : "" ?>
                    >
                        Desain UI/UX
                    </option>

                    <option
                        value="Git dan GitHub"
                        <?= $kursusDipilih === "Git dan GitHub" ? "selected" : "" ?>
                    >
                        Git dan GitHub
                    </option>

                </select>

            </div>


            <!-- JENIS PESERTA -->

            <div class="form-group">

                <label>
                    Jenis Peserta
                </label>

                <div class="radio-group">

                    <label class="radio-item">

                        <input
                            type="radio"
                            name="jenis_peserta"
                            value="Mahasiswa"
                            required
                        >

                        Mahasiswa

                    </label>

                    <label class="radio-item">

                        <input
                            type="radio"
                            name="jenis_peserta"
                            value="Pelajar"
                        >

                        Pelajar

                    </label>

                    <label class="radio-item">

                        <input
                            type="radio"
                            name="jenis_peserta"
                            value="Umum"
                        >

                        Umum

                    </label>

                </div>

            </div>


            <!-- MINAT -->

            <div class="form-group">

                <label>
                    Minat Tambahan
                </label>

                <div class="checkbox-group">

                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Pemrograman"
                        >

                        Pemrograman

                    </label>

                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Web Development"
                        >

                        Web Development

                    </label>

                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Database"
                        >

                        Database

                    </label>

                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="UI/UX Design"
                        >

                        UI/UX Design

                    </label>

                </div>

            </div>


            <!-- CATATAN -->

            <div class="form-group">

                <label for="catatan">
                    Catatan
                </label>

                <textarea
                    id="catatan"
                    name="catatan"
                    placeholder="Tuliskan catatan jika ada..."
                ></textarea>

            </div>


            <!-- SUBMIT -->

            <button
                type="submit"
                class="submit-button"
            >
                ✅ Kirim Pendaftaran
            </button>

        </form>

    </div>


<?php else: ?>

    <!-- =========================================================
         HASIL REGISTRASI
         ========================================================= -->

    <div class="card">

        <div class="success-icon">
            ✓
        </div>

        <h2 class="success-title">
            Registrasi Berhasil!
        </h2>

        <p class="success-text">
            Terima kasih,
            <strong><?= htmlspecialchars($dataRegistrasi["nama"]) ?></strong>.
            Pendaftaran kamu telah berhasil dikirim.
        </p>


        <!-- NOMOR REGISTRASI -->

        <div class="registration-number">

            <span>
                Nomor Registrasi
            </span>

            <strong>
                <?= htmlspecialchars($dataRegistrasi["nomor"]) ?>
            </strong>

        </div>


        <!-- DETAIL DATA -->

        <h3>
            📋 Detail Pendaftaran
        </h3>

        <div class="data-box">

            <div class="data-row">

                <div class="data-label">
                    Nama Lengkap
                </div>

                <div class="data-value">
                    <?= htmlspecialchars($dataRegistrasi["nama"]) ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Email
                </div>

                <div class="data-value">
                    <?= htmlspecialchars($dataRegistrasi["email"]) ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    No HP / WhatsApp
                </div>

                <div class="data-value">
                    <?= htmlspecialchars($dataRegistrasi["no_hp"]) ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Program Studi
                </div>

                <div class="data-value">
                    <?= htmlspecialchars($dataRegistrasi["prodi"]) ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Kursus
                </div>

                <div class="data-value">
                    <?= htmlspecialchars($dataRegistrasi["kursus"]) ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Jenis Peserta
                </div>

                <div class="data-value">
                    <?= htmlspecialchars($dataRegistrasi["jenis_peserta"]) ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Minat Tambahan
                </div>

                <div class="data-value">
                    <?= htmlspecialchars($dataRegistrasi["minat"]) ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Catatan
                </div>

                <div class="data-value">

                    <?= $dataRegistrasi["catatan"] !== ""
                        ? nl2br(htmlspecialchars($dataRegistrasi["catatan"]))
                        : "Tidak ada catatan"
                    ?>

                </div>

            </div>

        </div>


        <!-- STATUS -->

        <div class="status-success">

            ✅ Status: Pendaftaran Berhasil

        </div>


        <!-- BUTTON -->

        <div class="action-buttons">

            <a
                href="index.php"
                class="action-button back-button"
            >
                🏠 Kembali ke Katalog
            </a>

            <button
                onclick="window.print()"
                class="action-button print-button"
            >
                🖨️ Cetak Bukti Registrasi
            </button>

        </div>

    </div>

<?php endif; ?>

</div>


<!-- FOOTER -->

<footer>

    &copy; <?= date("Y") ?>
    <?= $siteName ?>

</footer>

</body>

</html>
```
