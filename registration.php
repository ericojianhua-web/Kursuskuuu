```php
<?php
$siteName = "KursusKu";
$tagline = "Belajar Teknologi, Bangun Masa Depan";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran Kursus - <?php echo $siteName; ?></title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #667eea;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .header p {
            color: #777;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        .required {
            color: red;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.12);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: normal;
        }

        .radio-option input {
            width: auto;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .checkbox-option {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: normal;
        }

        .checkbox-option input {
            width: auto;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
        }

        .btn-reset {
            background: #eee;
            color: #555;
        }

        .btn-reset:hover {
            background: #ddd;
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }

        .back-home a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px 20px;
            }

            .checkbox-group {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1><?php echo $siteName; ?></h1>
        <p><?php echo $tagline; ?></p>
        <p><strong>Formulir Pendaftaran Kursus</strong></p>
    </div>

    <form action="" method="POST">

        <!-- Nama Lengkap -->
        <div class="form-group">
            <label for="nama">
                Nama Lengkap <span class="required">*</span>
            </label>

            <input
                type="text"
                id="nama"
                name="nama"
                placeholder="Masukkan nama lengkap"
                required
            >
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">
                Email <span class="required">*</span>
            </label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="contoh@email.com"
                required
            >
        </div>

        <!-- No HP / WhatsApp -->
        <div class="form-group">
            <label for="no_hp">
                No. HP / WhatsApp <span class="required">*</span>
            </label>

            <input
                type="tel"
                id="no_hp"
                name="no_hp"
                placeholder="Contoh: 081234567890"
                required
            >
        </div>

        <!-- Program Studi -->
        <div class="form-group">
            <label for="program_studi">
                Program Studi <span class="required">*</span>
            </label>

            <input
                type="text"
                id="program_studi"
                name="program_studi"
                placeholder="Contoh: Pendidikan Teknik Informatika dan Komputer"
                required
            >
        </div>

        <!-- Kursus -->
        <div class="form-group">
            <label for="kursus">
                Kursus yang Dipilih <span class="required">*</span>
            </label>

            <select id="kursus" name="kursus" required>
                <option value="">-- Pilih Kursus --</option>
                <option value="Web Development">Web Development</option>
                <option value="Pemrograman PHP">Pemrograman PHP</option>
                <option value="JavaScript">JavaScript</option>
                <option value="Database MySQL">Database MySQL</option>
                <option value="UI/UX Design">UI/UX Design</option>
                <option value="Digital Marketing">Digital Marketing</option>
            </select>
        </div>

        <!-- Jenis Peserta -->
        <div class="form-group">
            <label>
                Jenis Peserta <span class="required">*</span>
            </label>

            <div class="radio-group">

                <label class="radio-option">
                    <input
                        type="radio"
                        name="jenis_peserta"
                        value="Pelajar"
                        required
                    >
                    Pelajar
                </label>

                <label class="radio-option">
                    <input
                        type="radio"
                        name="jenis_peserta"
                        value="Mahasiswa"
                    >
                    Mahasiswa
                </label>

                <label class="radio-option">
                    <input
                        type="radio"
                        name="jenis_peserta"
                        value="Umum"
                    >
                    Umum
                </label>

                <label class="radio-option">
                    <input
                        type="radio"
                        name="jenis_peserta"
                        value="Profesional"
                    >
                    Profesional
                </label>

            </div>
        </div>

        <!-- Minat Tambahan -->
        <div class="form-group">
            <label>
                Minat Tambahan
            </label>

            <div class="checkbox-group">

                <label class="checkbox-option">
                    <input
                        type="checkbox"
                        name="minat[]"
                        value="Pemrograman"
                    >
                    Pemrograman
                </label>

                <label class="checkbox-option">
                    <input
                        type="checkbox"
                        name="minat[]"
                        value="Desain"
                    >
                    Desain
                </label>

                <label class="checkbox-option">
                    <input
                        type="checkbox"
                        name="minat[]"
                        value="Database"
                    >
                    Database
                </label>

                <label class="checkbox-option">
                    <input
                        type="checkbox"
                        name="minat[]"
                        value="AI"
                    >
                    Artificial Intelligence
                </label>

                <label class="checkbox-option">
                    <input
                        type="checkbox"
                        name="minat[]"
                        value="Digital Marketing"
                    >
                    Digital Marketing
                </label>

                <label class="checkbox-option">
                    <input
                        type="checkbox"
                        name="minat[]"
                        value="Cyber Security"
                    >
                    Cyber Security
                </label>

            </div>
        </div>

        <!-- Catatan -->
        <div class="form-group">
            <label for="catatan">
                Catatan
            </label>

            <textarea
                id="catatan"
                name="catatan"
                placeholder="Tuliskan pertanyaan, kebutuhan, atau catatan lainnya..."
            ></textarea>
        </div>

        <!-- Tombol -->
        <div class="button-group">

            <button
                type="reset"
                class="btn btn-reset"
            >
                Reset
            </button>

            <button
                type="submit"
                class="btn btn-submit"
            >
                Daftar Kursus
            </button>

        </div>

    </form>

    <div class="back-home">
        <a href="index.php">← Kembali ke Kursuskuuu</a>
    </div>

</div>

</body>
</html>
```
