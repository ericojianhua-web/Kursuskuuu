```php
<?php

$history = [
    [
        "no" => 1,
        "registrasi" => "REG-06102026-001",
        "nama" => "Muhammad Hafiz",
        "kursus" => "Dasar Pemrograman PHP",
        "jenis" => "Mahasiswa",
        "minat" => "Pemrograman, Web Development",
        "total" => 127500
    ],
    [
        "no" => 2,
        "registrasi" => "REG-06102026-002",
        "nama" => "Ahmad Rizki",
        "kursus" => "HTML dan CSS",
        "jenis" => "Guru",
        "minat" => "Web Development, UI/UX Design",
        "total" => 80000
    ],
    [
        "no" => 3,
        "registrasi" => "REG-06102026-003",
        "nama" => "Dea Alfita",
        "kursus" => "JavaScript Dasar",
        "jenis" => "Umum",
        "minat" => "Pemrograman, Web Development",
        "total" => 118750
    ],
    [
        "no" => 4,
        "registrasi" => "REG-06102026-004",
        "nama" => "Kukuh Prasetya",
        "kursus" => "Database MySQL",
        "jenis" => "Mahasiswa",
        "minat" => "Database, Pemrograman",
        "total" => 127500
    ],
    [
        "no" => 5,
        "registrasi" => "REG-06102026-005",
        "nama" => "Erik Jianhua",
        "kursus" => "Git dan GitHub",
        "jenis" => "Umum",
        "minat" => "Pemrograman, Web Development",
        "total" => 95000
    ]
];

function formatRupiah($angka)
{
    return "Rp" . number_format($angka, 0, ',', '.');
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Histori Pendaftaran - Kursuskuuu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h1 {
            text-align: center;
            color: #222;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            background: #222;
            color: white;
            padding: 14px 10px;
            text-align: left;
        }

        td {
            padding: 13px 10px;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
        }

        tr:hover {
            background: #f8f8f8;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .mahasiswa {
            background: #e3f2fd;
            color: #1976d2;
        }

        .guru {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .umum {
            background: #fff3e0;
            color: #ef6c00;
        }

        .total {
            font-weight: bold;
            white-space: nowrap;
        }

        .footer {
            margin-top: 25px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }

        @media (max-width: 700px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Histori Pendaftaran</h1>

        <p class="subtitle">
            Riwayat Pendaftaran Kursuskuuu
        </p>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Registrasi</th>
                        <th>Nama</th>
                        <th>Kursus</th>
                        <th>Jenis Peserta</th>
                        <th>Minat</th>
                        <th>Total Pembayaran</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($history as $data): ?>

                        <tr>

                            <td>
                                <?= $data["no"]; ?>
                            </td>

                            <td>
                                <?= $data["registrasi"]; ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($data["nama"]); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($data["kursus"]); ?>
                            </td>

                            <td>

                                <?php
                                $classJenis = strtolower($data["jenis"]);
                                ?>

                                <span class="badge <?= $classJenis; ?>">
                                    <?= $data["jenis"]; ?>
                                </span>

                            </td>

                            <td>
                                <?= htmlspecialchars($data["minat"]); ?>
                            </td>

                            <td class="total">
                                <?= formatRupiah($data["total"]); ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

        <div class="footer">
            KursusKu &copy; 2026 - Data Histori Dummy
        </div>

    </div>

</body>

</html>
```
