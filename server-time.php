<?php

date_default_timezone_set("Asia/Jakarta");

echo "<!DOCTYPE html>";
echo "<html lang='id'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Server Time - Kursuskuuu</title>";

echo "<style>";
echo "
body {
    font-family: Arial, sans-serif;
    background: #f4f7fb;
    text-align: center;
    padding-top: 100px;
}

.box {
    background: white;
    width: 500px;
    max-width: 90%;
    margin: auto;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

h1 {
    color: #2563eb;
}

.waktu {
    font-size: 30px;
    font-weight: bold;
    color: #1e40af;
    background: #dbeafe;
    padding: 20px;
    border-radius: 10px;
}

a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: #2563eb;
    color: white;
    text-decoration: none;
    border-radius: 8px;
}
";
echo "</style>";

echo "</head>";
echo "<body>";

echo "<div class='box'>";

echo "<h1>Kursuskuuu</h1>";

echo "<h2>Waktu Server</h2>";

echo "<p>Waktu server saat ini:</p>";

echo "<div class='waktu'>";
echo date("d-m-Y H:i:s");
echo "</div>";

echo "<p>Zona waktu: Asia/Jakarta (WIB)</p>";

echo "<a href='index.php'>Kembali ke Katalog</a>";

echo "</div>";

echo "</body>";
echo "</html>";