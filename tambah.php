<?php
require 'functions.php';

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil ditambahkan
    if (tambahData($_POST) > 0) {
<<<<<<< HEAD
        $outputMsg = "Data berhasil ditambahkan!";
    } else {
        $outputMsg = "Data gagal ditambahkan!";
=======
        $outputMsg = "<p style='color: green;'>Data berhasil ditambahkan!</p>";
    } else {
        $outputMsg = "<p style='color: red;'>Data gagal ditambahkan!</p>";
>>>>>>> 06-Database-Integration-6-File-Upload
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
    
<<<<<<< HEAD
        <form action="" method="POST">
=======
        <form action="" method="POST" enctype="multipart/form-data">
>>>>>>> 06-Database-Integration-6-File-Upload
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
<<<<<<< HEAD
                    <input type="text" name="gambar" id="gambar">
=======
                    <input type="file" name="gambar" id="gambar" style="padding: 4px; border: 1px solid #000; height: auto;">
>>>>>>> 06-Database-Integration-6-File-Upload
                </li>
                <li id="btns">
                    <a href="index.php">Kembali ke halaman utama</a>
                    <div id="btn-form-control">
                        <button type="reset">Reset Form</button>
                        <button type="submit" name="submit">Tambah Data</button>
                    </div>
                </li>
<<<<<<< HEAD
                <li><?= isset($_POST["submit"])? $outputMsg : "" ?></li>
=======
                <li id="outputMsg"><?= isset($_POST["submit"])? $outputMsg : "" ?></li>
>>>>>>> 06-Database-Integration-6-File-Upload
            </ul>
        </form>
    </div>
</body>
</html>