<?php
require 'functions.php';

$siswa = query("SELECT * FROM siswa");

// mysqli_fetch_row() -> mengembalikan array numerik
// mysqli_fetch_assoc() -> mengembalikan array asosiatif
// mysqli_fetch_array() -> dapat mengembalikan array asosiatif dan numerik dengan menumpuknya
// mysqli_fetch_object() -> mengembalikan object
// foreach ($mhs = mysqli_fetch_assoc($result) as $m) {
//     echo $m."<br>";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Siswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </tr>
        <?php
        $counter = 0;
        foreach ($siswa as $row) :
        ?>
        <tr>
            <td><?= ++$counter ?></td>
            <td>
                <a href="">Ubah</a> |
                <a href="">Hapus</a>
            </td>
            <td><img src="assets/img/gambar<?= $counter ?>.jpg" style="height: 90px; object-fit: contain;"></td>
            <td><?= $row["NIS"] ?></td>
            <td><?= $row["NAMA"] ?></td>
            <td><?= $row["TEMPAT_LAHIR"] ?></td>
            <td><?= $row["TGL_LAHIR"] ?></td>
            <td><?= $row["JNS_KELAMIN"] ?></td>
            <td><?= $row["ALAMAT"] ?></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>