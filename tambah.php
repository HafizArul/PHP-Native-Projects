<?php
session_start();

// Jika tidak ada session login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil ditambahkan
    if (tambahData($_POST) > 0) {
        $outputMsg = "<p style='color: green;'>Data berhasil ditambahkan!</p>";
    } else {
        $outputMsg = "<p style='color: red;'>Data gagal ditambahkan!</p>";
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
    
        <form action="" method="POST" enctype="multipart/form-data">
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
                    <input type="file" name="gambar" id="gambar" style="padding: 4px; border: 1px solid #000; height: auto;">
                </li>
                <li id="btns">
                    <a href="index.php">Kembali ke halaman utama</a>
                    <div id="btn-form-control">
                        <button type="reset">Reset Form</button>
                        <button type="submit" name="submit">Tambah Data</button>
                    </div>
                </li>
                <li id="outputMsg"><?= isset($_POST["submit"])? $outputMsg : "" ?></li>
            </ul>
        </form>
    </div>
</body>
</html>