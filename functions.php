<?php
$DB_Connect = mysqli_connect("localhost", "root", "", "db_testing_01");

function query($query) {
    global $DB_Connect;
    $result = mysqli_query($DB_Connect, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahData($data) {
    global $DB_Connect;

    // Ambil data dari tiap field
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // Query Insert
    $SQL_Query = "INSERT INTO mahasiswa (Nama_Mhs, NIM, Prodi, Email, Gambar) VALUES (
                    '$nama', '$nim', '$prodi', '$email', '$gambar'
                )";
    mysqli_query($DB_Connect, $SQL_Query);

    return mysqli_affected_rows($DB_Connect);
}

function hapus($id) {
    global $DB_Connect;
    mysqli_query($DB_Connect, "DELETE FROM mahasiswa WHERE Id_Mhs = '$id';");

    return mysqli_affected_rows($DB_Connect);
}

function ubahData($data) {
    global $DB_Connect;

    // Ambil data dari tiap field
    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // Query Update
    $SQL_Query = "UPDATE mahasiswa SET
        Nama_Mhs = '$nama',
        NIM = '$nim',
        Prodi = '$prodi',
        Email = '$email',
        Gambar = '$gambar'
    WHERE Id_Mhs = '$id'";
    mysqli_query($DB_Connect, $SQL_Query);

    return mysqli_affected_rows($DB_Connect);
}

function cariData($keyword) {
    $SQL_Query = "SELECT * FROM mahasiswa
        WHERE Nama_Mhs LIKE '%$keyword%' OR
        NIM LIKE '%$keyword%' OR
        Prodi LIKE '%$keyword%' OR
        Email LIKE '%$keyword%'";

    return query($SQL_Query);
}
?>