<?php

// Memanggil functions.php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// Memanggil library mPDF
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/print-view.css">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr class="header-row">
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Email</th>
        </tr>';
    $i = 1;
    foreach ($mahasiswa as $row) {
        $html .= '<tr>
            <td>'.$i++.'</td>
            <td><img src="assets/img/'. $row["Gambar"] .'" alt="'. $row["Gambar"] .'" style="height: 90px; object-fit: contain;"></td>
            <td>'. $row["Nama_Mhs"] .'</td>
            <td>'. $row["NIM"] .'</td>
            <td>'. $row["Prodi"] .'</td>
            <td>'. $row["Email"] .'</td>
        </tr>';
    }
    $html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::INLINE);
// Argumen kedua pada Output() bisa disingkat dengan string seperti 'D', 'I', 'F', dan seterusnya