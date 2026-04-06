<?php
session_start();

// Jika tidak ada session login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY Id_Mhs ASC");

// Ketika tombol cari diklik
if (isset($_POST['cari'])) {
    $mahasiswa = cariData($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/utils.css">
    <title>Halaman Admin</title>

    <style>
        /* css yang hanya berlaku saat halaman diprint */
        @media print {
            .unprinted {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="unprinted">Tambah Data Mahasiswa</a><br><br>
    <a href="logout.php" class="unprinted">Logout</a><br><br>

    <div class="container-inline">
        <!-- Search Form -->
        <form action="" method="POST" class="unprinted">
            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
            <button type="submit" name="cari" id="search-btn">Cari!</button>
            <span class="loader"></span>
        </form>
        <a href="cetak.php" target="_blank">Cetak</a>
    </div>
    <br>
    <div id="container">
        <!-- Data Mahasiswa dalam Bentuk Tabel -->
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th class="unprinted">Aksi</th>
                <th>Gambar</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Email</th>
            </tr>
            <?php
            $counter = 0;
            foreach ($mahasiswa as $row) :
            ?>
            <tr>
                <td><?= ++$counter ?></td>
                <td class="unprinted">
                    <a href="ubah.php?Id_Mhs=<?= $row['Id_Mhs'] ?>">Ubah</a> |
                    <a href="hapus.php?Id_Mhs=<?= $row["Id_Mhs"] ?>" onclick="return confirm('Yakin ingin menghapus data <?= $row['Nama_Mhs'] ?>?')">Hapus</a>
                </td>
                <td><img src="assets/img/<?= $row["Gambar"] ?>" alt="<?= $row["Gambar"] ?>" style="height: 90px; object-fit: contain;"></td>
                <td><?= $row["Nama_Mhs"] ?></td>
                <td><?= $row["NIM"] ?></td>
                <td><?= $row["Prodi"] ?></td>
                <td><?= $row["Email"] ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>

    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>