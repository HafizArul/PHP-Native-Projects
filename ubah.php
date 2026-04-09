<?php
require 'functions.php';

// Ambil data melalui URL
$id = $_GET["Id_Mhs"];

// Query data mahasiswa berdasarkan Id_Mhs
$mhs = query("SELECT * FROM mahasiswa WHERE Id_Mhs = $id")[0];

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil diubah
    if (ubahData($_POST) > 0) {
        $outputMsg = "Data berhasil diubah!";
    } else {
        $outputMsg = "Data gagal diubah!";
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
    
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $mhs['Id_Mhs'] ?>">
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
                    <input type="text" name="gambar" id="gambar" value="<?= $mhs['Gambar'] ?>">
                </li>
                <li id="btns">
                    <a href="index.php">Kembali ke halaman utama</a>
                    <div id="btn-form-control">
                        <button type="reset">Reset Form</button>
                        <button type="submit" name="submit">Ubah Data</button>
                    </div>
                </li>
                <li><?= isset($_POST["submit"])? $outputMsg : "" ?></li>
            </ul>
        </form>
    </div>
</body>
</html>