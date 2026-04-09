<?php
session_start();

// Jika tidak ada session login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Ambil data melalui URL
$id = $_GET["Id_Mhs"];

// Query data mahasiswa berdasarkan Id_Mhs
$mhs = query("SELECT * FROM mahasiswa WHERE Id_Mhs = $id")[0];

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil diubah
    if (ubahData($_POST) > 0) {
        $outputMsg = "<p style='color: green;'>Data berhasil diubah!</p>";
    } else {
        $outputMsg = "<p style='color: red;'>Data gagal diubah!</p>";
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
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h1>Ubah Data Mahasiswa</h1>
    
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs['Id_Mhs'] ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs['Gambar'] ?>">
            <ul style="list-style: none;">
                <li>
                    <label for="nama">Nama Mahasiswa</label><br>
                    <input type="text" name="nama" id="nama" value="<?= $mhs['Nama_Mhs'] ?>">
                </li>
                <li>
                    <label for="nim">Nomor Induk Mahasiswa</label><br>
                    <input type="text" name="nim" id="nim" required value="<?= $mhs['NIM'] ?>">
                </li>
                <li>
                    <label for="prodi">Prodi Mahasiswa</label><br>
                    <input type="text" name="prodi" id="prodi" value="<?= $mhs['Prodi'] ?>">
                </li>
                <li>
                    <label for="email">Email Mahasiswa</label><br>
                    <input type="email" name="email" id="email" value="<?= $mhs['Email'] ?>">
                </li>
                <li>
                    <label for="gambar">Gambar Mahasiswa</label><br>
                    <input type="file" name="gambar" id="gambar" style="padding: 4px; border: 1px solid #000; height: auto; margin-bottom: 16px;">
                    <img src="assets/img/<?= $mhs['Gambar'] ?>" height="120">
                </li>
                <li id="btns">
                    <a href="index.php">Kembali ke halaman utama</a>
                    <div id="btn-form-control">
                        <button type="reset">Reset Form</button>
                        <button type="submit" name="submit">Ubah Data</button>
                    </div>
                </li>
                <li><?= isset($_POST["submit"]) ? $outputMsg : "" ?></li>
            </ul>
        </form>
    </div>
</body>
</html>