<?php
// Simulasi loading (TIDAK DISARANKAN UNTUK PRODUKSI)
sleep(1);

require '../functions.php';

// Kunci pencarian
$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa
        WHERE Nama_Mhs LIKE '%$keyword%' OR
        NIM LIKE '%$keyword%' OR
        Prodi LIKE '%$keyword%' OR
        Email LIKE '%$keyword%'";
$mahasiswa = query($query);

?>
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