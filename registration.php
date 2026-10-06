<?php

$siteName = "Kursuskuuu";
$tagline = "Belajar Teknologi, Bangun Masa Depan";

/* =========================================================
   DAFTAR KURSUS
========================================================= */

$daftarKursus = [
    "Dasar Pemrograman PHP",
    "HTML dan CSS",
    "JavaScript Dasar",
    "Database MySQL",
    "Desain UI/UX",
    "Git dan GitHub"
];

/* =========================================================
   HARGA KURSUS
========================================================= */

$hargaKursus = [
    "Dasar Pemrograman PHP" => 150000,
    "HTML dan CSS" => 100000,
    "JavaScript Dasar" => 125000,
    "Database MySQL" => 150000,
    "Desain UI/UX" => 175000,
    "Git dan GitHub" => 100000
];

/* =========================================================
   DISKON PESERTA
========================================================= */

$diskonPeserta = [
    "Guru" => 20,
    "Mahasiswa" => 15,
    "Umum" => 5
];

/* =========================================================
   FILE RIWAYAT
========================================================= */

$fileRiwayat = __DIR__ . "/riwayat.json";

/*
   Jika riwayat.json belum ada,
   otomatis dibuat dengan isi []
*/

if (!file_exists($fileRiwayat)) {

    file_put_contents(
        $fileRiwayat,
        json_encode(
            [],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        )
    );
}

/* =========================================================
   KURSUS DARI URL
========================================================= */

$kursusDipilih = $_GET["kursus"] ?? "";

$dataRegistrasi = null;

/* =========================================================
   PROSES FORM
========================================================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* =========================
       AMBIL DATA FORM
    ========================= */

    $nama = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $noHp = trim($_POST["no_hp"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $kursus = trim($_POST["kursus"] ?? "");
    $jenisPeserta = trim($_POST["jenis_peserta"] ?? "");

    $interest = $_POST["interest"] ?? [];

    $catatan = trim($_POST["catatan"] ?? "");

    /* =========================
       VALIDASI SEDERHANA
    ========================= */

    if (
        $nama === "" ||
        $email === "" ||
        $noHp === "" ||
        $prodi === "" ||
        $kursus === "" ||
        $jenisPeserta === ""
    ) {

        die("Data registrasi belum lengkap.");
    }

    /* =========================
       NOMOR REGISTRASI
    ========================= */

    $nomorRegistrasi =
        "REG-" . date("YmdHis") . "-" . rand(100, 999);

    /* =========================
       TANGGAL REGISTRASI
    ========================= */

    $tanggalRegistrasi =
        date("Y-m-d H:i:s");

    /* =========================
       INTEREST
    ========================= */

    if (!empty($interest)) {

        $interestDipilih =
            implode(", ", $interest);

    } else {

        $interestDipilih =
            "Tidak ada";
    }

    /* =========================
       HARGA KURSUS
    ========================= */

    $harga =
        $hargaKursus[$kursus] ?? 0;

    /* =========================
       DISKON
    ========================= */

    $persenDiskon =
        $diskonPeserta[$jenisPeserta] ?? 0;

    $jumlahDiskon =
        $harga * ($persenDiskon / 100);

    /* =========================
       TOTAL BIAYA
    ========================= */

    $totalBiaya =
        $harga - $jumlahDiskon;

    /* =====================================================
       DATA REGISTRASI
    ===================================================== */

    $dataRegistrasi = [

        "nomor" =>
            $nomorRegistrasi,

        "tanggal" =>
            $tanggalRegistrasi,

        "nama" =>
            $nama,

        "email" =>
            $email,

        "no_hp" =>
            $noHp,

        "prodi" =>
            $prodi,

        "kursus" =>
            $kursus,

        "jenis_peserta" =>
            $jenisPeserta,

        "interest" =>
            $interestDipilih,

        "catatan" =>
            $catatan,

        "harga" =>
            $harga,

        "persen_diskon" =>
            $persenDiskon,

        "jumlah_diskon" =>
            $jumlahDiskon,

        "total_biaya" =>
            $totalBiaya,

        "status" =>
            "Pendaftaran Berhasil"
    ];

    /* =====================================================
       BACA RIWAYAT LAMA
    ===================================================== */

    $isiFile =
        file_get_contents($fileRiwayat);

    $riwayat =
        json_decode($isiFile, true);

    /* =====================================================
       JIKA JSON RUSAK / KOSONG
    ===================================================== */

    if (!is_array($riwayat)) {

        $riwayat = [];
    }

    /* =====================================================
       MASUKKAN DATA BARU KE RIWAYAT
    ===================================================== */

    $riwayat[] =
        $dataRegistrasi;

    /* =====================================================
       SIMPAN KE riwayat.json
    ===================================================== */

    $berhasilSimpan =
        file_put_contents(
            $fileRiwayat,
            json_encode(
                $riwayat,
                JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE
            )
        );

    /* =====================================================
       CEK JIKA GAGAL MENYIMPAN
    ===================================================== */

    if ($berhasilSimpan === false) {

        die(
            "Gagal menyimpan riwayat. " .
            "Pastikan file riwayat.json dapat ditulis."
        );
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
        <?= htmlspecialchars($siteName) ?>
        - Registrasi Kursus
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
            padding: 20px;
        }

        .header-container {
            max-width: 1100px;
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

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .tagline {
            font-size: 14px;
        }

        .catalog-button {
            display: inline-block;
            padding: 10px 16px;

            background: white;
            color: #2563eb;

            text-decoration: none;

            border-radius: 8px;

            font-weight: bold;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card,
        .success-card {

            background: white;

            padding: 30px;

            border-radius: 15px;

            box-shadow:
                0 5px 20px
                rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #2563eb;
        }

        .card-description,
        .success-message {
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .main-label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {

            width: 100%;

            padding: 12px 14px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            font-size: 15px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .price-box {

            margin-top: 10px;

            padding: 15px;

            background: #eff6ff;

            border: 1px solid #bfdbfe;

            border-radius: 8px;
        }

        .price-label {
            color: #555;
            font-size: 14px;
        }

        .original-price {

            color: #888;

            font-size: 14px;

            text-decoration: line-through;
        }

        .price-value {

            color: #2563eb;

            font-size: 24px;

            font-weight: bold;

            margin-top: 5px;
        }

        .discount-text {

            color: #16a34a;

            font-size: 14px;

            font-weight: bold;

            margin-top: 5px;
        }

        .radio-group,
        .checkbox-group {

            display: flex;

            flex-wrap: wrap;

            gap: 10px;
        }

        .radio-item,
        .checkbox-item {

            display: flex;

            align-items: center;

            gap: 7px;

            padding: 10px 14px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            cursor: pointer;
        }

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
        }

        .submit-button:hover {
            background: #1d4ed8;
        }

        .success-icon {

            text-align: center;

            font-size: 60px;
        }

        .success-title {

            text-align: center;

            color: #16a34a;
        }

        .success-message {
            text-align: center;
        }

        .data-box {

            border: 1px solid #e5e7eb;

            border-radius: 10px;

            overflow: hidden;

            margin-top: 25px;
        }

        .data-row {

            display: grid;

            grid-template-columns: 200px 1fr;

            border-bottom: 1px solid #e5e7eb;
        }

        .data-label {

            padding: 13px 15px;

            background: #f9fafb;

            font-weight: bold;

            color: #555;
        }

        .data-value {

            padding: 13px 15px;

            word-break: break-word;
        }

        .status-success {

            margin-top: 20px;

            padding: 15px;

            background: #f0fdf4;

            color: #166534;

            border: 1px solid #bbf7d0;

            border-radius: 8px;

            text-align: center;

            font-weight: bold;
        }

        .payment-box {

            margin-top: 15px;

            border: 2px solid #2563eb;

            border-radius: 12px;

            overflow: hidden;
        }

        .payment-title {

            background: #2563eb;

            color: white;

            padding: 15px;

            margin: 0;
        }

        .payment-row {

            display: flex;

            justify-content: space-between;

            padding: 14px 15px;

            border-bottom: 1px solid #e5e7eb;
        }

        .payment-label {
            color: #555;
        }

        .payment-value {
            font-weight: bold;
        }

        .discount {
            color: #16a34a;
        }

        .total-row {
            background: #eff6ff;
        }

        .total-row .payment-label,
        .total-row .payment-value {

            color: #2563eb;

            font-size: 20px;

            font-weight: bold;
        }

        .action-buttons {

            display: flex;

            gap: 12px;

            margin-top: 25px;
        }

        .action-button {

            flex: 1;

            text-align: center;

            text-decoration: none;

            padding: 13px;

            border-radius: 8px;

            font-weight: bold;

            border: none;

            cursor: pointer;

            font-size: 15px;
        }

        .back-button {

            background: #e5e7eb;

            color: #222;
        }

        .print-button {

            background: #2563eb;

            color: white;
        }

        footer {

            background: #111827;

            color: white;

            text-align: center;

            padding: 25px;

            margin-top: 50px;
        }

        @media (max-width: 600px) {

            .header-container {

                flex-direction: column;

                align-items: flex-start;
            }

            .header-right {

                width: 100%;

                justify-content: space-between;
            }

            .container {

                margin: 25px auto;

                padding: 0 12px;
            }

            .card,
            .success-card {

                padding: 20px;
            }

            .data-row {

                grid-template-columns: 1fr;
            }

            .payment-row {

                flex-direction: column;

                gap: 5px;
            }

            .action-buttons {

                flex-direction: column;
            }

            .radio-group,
            .checkbox-group {

                flex-direction: column;
            }

            .radio-item,
            .checkbox-item {

                width: 100%;
            }
        }

        @media print {

            header,
            footer,
            .action-buttons {

                display: none;
            }

            body {
                background: white;
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

        <div class="header-right">

            <div class="tagline">

                <?= htmlspecialchars($tagline) ?>

            </div>

            <a
                href="index.php"
                class="catalog-button"
            >
                ← Kembali ke Katalog
            </a>

        </div>

    </div>

</header>


<div class="container">


<?php if ($dataRegistrasi === null): ?>

    <!-- =====================================================
         FORM REGISTRASI
    ====================================================== -->

    <div class="card">

        <h1>
            📝 Registrasi Kursus
        </h1>

        <p class="card-description">

            Silakan isi data berikut untuk
            melakukan pendaftaran kursus.

        </p>

        <form
            method="POST"
            action="registration.php"
        >

            <div class="form-group">

                <label
                    for="nama"
                    class="main-label"
                >
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


            <div class="form-group">

                <label
                    for="email"
                    class="main-label"
                >
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


            <div class="form-group">

                <label
                    for="no_hp"
                    class="main-label"
                >
                    No HP / WhatsApp
                </label>

                <input
                    type="tel"
                    id="no_hp"
                    name="no_hp"
                    placeholder="08xxxxxxxxxx"
                    required
                >

            </div>


            <div class="form-group">

                <label
                    for="prodi"
                    class="main-label"
                >
                    Program Studi
                </label>

                <input
                    type="text"
                    id="prodi"
                    name="prodi"
                    placeholder="Masukkan program studi"
                    required
                >

            </div>


            <div class="form-group">

                <label
                    for="kursus"
                    class="main-label"
                >
                    Pilih Kursus
                </label>

                <select
                    id="kursus"
                    name="kursus"
                    required
                    onchange="tampilkanHarga()"
                >

                    <option value="">
                        -- Pilih Kursus --
                    </option>

                    <?php foreach ($daftarKursus as $kursus): ?>

                        <option
                            value="<?= htmlspecialchars($kursus) ?>"
                            <?= $kursusDipilih === $kursus
                                ? "selected"
                                : "" ?>
                        >

                            <?= htmlspecialchars($kursus) ?>

                        </option>

                    <?php endforeach; ?>

                </select>


                <div class="price-box">

                    <div class="price-label">
                        Harga Kursus
                    </div>

                    <div
                        class="original-price"
                        id="hargaAwal"
                    >
                        Harga normal: Rp 0
                    </div>

                    <div
                        class="price-value"
                        id="hargaKursus"
                    >
                        Rp 0
                    </div>

                    <div
                        class="discount-text"
                        id="infoDiskon"
                    >
                        Pilih jenis peserta
                        untuk mendapatkan diskon.
                    </div>

                </div>

            </div>


            <div class="form-group">

                <label class="main-label">

                    Jenis Peserta / Diskon

                </label>

                <div class="radio-group">

                    <label class="radio-item">

                        <input
                            type="radio"
                            name="jenis_peserta"
                            value="Guru"
                            required
                            onchange="tampilkanHarga()"
                        >

                        Guru
                        (Diskon 20%)

                    </label>


                    <label class="radio-item">

                        <input
                            type="radio"
                            name="jenis_peserta"
                            value="Mahasiswa"
                            onchange="tampilkanHarga()"
                        >

                        Mahasiswa
                        (Diskon 15%)

                    </label>


                    <label class="radio-item">

                        <input
                            type="radio"
                            name="jenis_peserta"
                            value="Umum"
                            onchange="tampilkanHarga()"
                        >

                        Umum
                        (Diskon 5%)

                    </label>

                </div>

            </div>


            <div class="form-group">

                <label class="main-label">

                    Minat / Interest

                </label>

                <div class="checkbox-group">

                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="interest[]"
                            value="Pemrograman"
                        >

                        Pemrograman

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="interest[]"
                            value="Web Development"
                        >

                        Web Development

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="interest[]"
                            value="Database"
                        >

                        Database

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="interest[]"
                            value="UI/UX Design"
                        >

                        UI/UX Design

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="interest[]"
                            value="Mobile Development"
                        >

                        Mobile Development

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="interest[]"
                            value="Data Science"
                        >

                        Data Science

                    </label>

                </div>

            </div>


            <div class="form-group">

                <label
                    for="catatan"
                    class="main-label"
                >
                    Catatan
                </label>

                <textarea
                    id="catatan"
                    name="catatan"
                    placeholder="Tambahkan catatan jika diperlukan"
                ></textarea>

            </div>


            <button
                type="submit"
                class="submit-button"
            >
                🚀 Daftar Sekarang
            </button>

        </form>

    </div>


<?php else: ?>

    <!-- =====================================================
         HASIL REGISTRASI
    ====================================================== -->

    <div class="success-card">

        <div class="success-icon">
            ✅
        </div>

        <h1 class="success-title">
            Registrasi Berhasil!
        </h1>

        <p class="success-message">

            Terima kasih,

            <strong>
                <?= htmlspecialchars(
                    $dataRegistrasi["nama"]
                ) ?>
            </strong>.

            Data pendaftaran kamu
            sudah berhasil disimpan.

        </p>


        <div class="data-box">


            <div class="data-row">

                <div class="data-label">
                    Nomor Registrasi
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi["nomor"]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Tanggal Registrasi
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi["tanggal"]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Nama Lengkap
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi["nama"]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Email
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi["email"]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    No HP / WhatsApp
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi["no_hp"]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Program Studi
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi["prodi"]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Kursus
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi["kursus"]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Jenis Peserta
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi[
                            "jenis_peserta"
                        ]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Interest
                </div>

                <div class="data-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi["interest"]
                    ) ?>

                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Catatan
                </div>

                <div class="data-value">

                    <?php

                    if (
                        $dataRegistrasi["catatan"] !== ""
                    ) {

                        echo nl2br(
                            htmlspecialchars(
                                $dataRegistrasi["catatan"]
                            )
                        );

                    } else {

                        echo "-";

                    }

                    ?>

                </div>

            </div>


        </div>


        <div class="status-success">

            ✅ Status:
            <?= htmlspecialchars(
                $dataRegistrasi["status"]
            ) ?>

        </div>


        <h3 style="margin-top:30px;">

            💰 Ringkasan Pembayaran

        </h3>


        <div class="payment-box">

            <h3 class="payment-title">

                Detail Biaya Kursus

            </h3>


            <div class="payment-row">

                <div class="payment-label">

                    Harga Kursus

                </div>

                <div class="payment-value">

                    Rp
                    <?= number_format(
                        $dataRegistrasi["harga"],
                        0,
                        ",",
                        "."
                    ) ?>

                </div>

            </div>


            <div class="payment-row">

                <div class="payment-label">

                    Jenis Peserta

                </div>

                <div class="payment-value">

                    <?= htmlspecialchars(
                        $dataRegistrasi[
                            "jenis_peserta"
                        ]
                    ) ?>

                </div>

            </div>


            <div class="payment-row">

                <div class="payment-label">

                    Diskon
                    (<?= $dataRegistrasi[
                        "persen_diskon"
                    ] ?>%)

                </div>

                <div class="payment-value discount">

                    - Rp
                    <?= number_format(
                        $dataRegistrasi[
                            "jumlah_diskon"
                        ],
                        0,
                        ",",
                        "."
                    ) ?>

                </div>

            </div>


            <div class="payment-row total-row">

                <div class="payment-label">

                    Total Setelah Diskon

                </div>

                <div class="payment-value">

                    Rp
                    <?= number_format(
                        $dataRegistrasi[
                            "total_biaya"
                        ],
                        0,
                        ",",
                        "."
                    ) ?>

                </div>

            </div>

        </div>


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


<footer>

    <p>

        &copy;
        <?= date("Y") ?>
        <?= htmlspecialchars($siteName) ?>

    </p>

    <p>

        <?= htmlspecialchars($tagline) ?>

    </p>

</footer>


<script>

const hargaKursus = {

    "Dasar Pemrograman PHP": 150000,

    "HTML dan CSS": 100000,

    "JavaScript Dasar": 125000,

    "Database MySQL": 150000,

    "Desain UI/UX": 175000,

    "Git dan GitHub": 100000

};


const diskonPeserta = {

    "Guru": 20,

    "Mahasiswa": 15,

    "Umum": 5

};


function tampilkanHarga() {

    const kursus =
        document.getElementById("kursus").value;

    const hargaAwalElement =
        document.getElementById("hargaAwal");

    const hargaElement =
        document.getElementById("hargaKursus");

    const infoDiskonElement =
        document.getElementById("infoDiskon");


    if (kursus === "") {

        hargaAwalElement.textContent =
            "Harga normal: Rp 0";

        hargaElement.textContent =
            "Rp 0";

        infoDiskonElement.textContent =
            "Pilih kursus dan jenis peserta.";

        return;
    }


    const harga =
        hargaKursus[kursus] || 0;


    const radioPeserta =
        document.querySelector(
            'input[name="jenis_peserta"]:checked'
        );


    if (!radioPeserta) {

        hargaAwalElement.textContent =
            "Harga normal: Rp " +
            harga.toLocaleString("id-ID");

        hargaElement.textContent =
            "Rp " +
            harga.toLocaleString("id-ID");

        infoDiskonElement.textContent =
            "Pilih jenis peserta untuk mendapatkan diskon.";

        return;
    }


    const jenisPeserta =
        radioPeserta.value;


    const persenDiskon =
        diskonPeserta[jenisPeserta] || 0;


    const jumlahDiskon =
        harga * (persenDiskon / 100);


    const total =
        harga - jumlahDiskon;


    hargaAwalElement.textContent =
        "Harga normal: Rp " +
        harga.toLocaleString("id-ID");


    hargaElement.textContent =
        "Rp " +
        total.toLocaleString("id-ID");


    infoDiskonElement.textContent =
        "Diskon " +
        jenisPeserta +
        " " +
        persenDiskon +
        "% diterapkan. Hemat Rp " +
        jumlahDiskon.toLocaleString("id-ID");

}


document.addEventListener(
    "DOMContentLoaded",
    function() {

        tampilkanHarga();

    }
);

</script>

</body>

</html>
