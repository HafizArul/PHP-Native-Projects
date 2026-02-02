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
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a><br><br>
    <a href="logout.php">Logout</a><br><br>

    <!-- Search Form -->
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <!-- Data Mahasiswa dalam Bentuk Tabel -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
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
            <td>
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
</body>
</html>