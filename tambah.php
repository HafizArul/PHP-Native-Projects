<?php
require 'functions.php';

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil ditambahkan
    if (tambahData($_POST) > 0) {
        $outputMsg = "Data berhasil ditambahkan!";
    } else {
        $outputMsg = "Data gagal ditambahkan!";
    }
}
echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/form_tambah.css">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Mahasiswa</h1>
    
        <form action="" method="POST">
            <ul style="list-style: none;">
                <li>
                    <label for="nama">Nama Mahasiswa</label><br>
                    <input type="text" name="nama" id="nama">
                </li>
                <li>
                    <label for="nim">Nomor Induk Mahasiswa</label><br>
                    <input type="text" name="nim" id="nim">
                </li>
                <li>
                    <label for="prodi">Prodi Mahasiswa</label><br>
                    <input type="text" name="prodi" id="prodi">
                </li>
                <li>
                    <label for="email">Email Mahasiswa</label><br>
                    <input type="email" name="email" id="email">
                </li>
                <li>
                    <label for="gambar">Gambar Mahasiswa</label><br>
                    <input type="text" name="gambar" id="gambar">
                </li>
                <li id="btns">
                    <a href="index.php">Kembali ke halaman utama</a>
                    <div id="btn-form-control">
                        <button type="reset">Reset Form</button>
                        <button type="submit" name="submit">Tambah Data</button>
                    </div>
                </li>
                <li><?= isset($_POST["submit"])? $outputMsg : "" ?></li>
            </ul>
        </form>
    </div>
</body>
</html>