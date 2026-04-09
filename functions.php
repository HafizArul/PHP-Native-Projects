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

    // Upload Gambar
    $gambar = uploadGambar();
    if (!$gambar) {
        return false;
    }

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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user memilih gambar baru
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadGambar();
    }

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

function uploadGambar() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Yang anda pilih bukan file gambar');
        </script>";
        return false;
    }

    // Cek jika ukuran terlalu besar (max. : 2MB)
    if ($ukuranFile > 2000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    // File lolos pengecekan
    // Buat nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'assets/img/'.$namaFileBaru);
    return $namaFileBaru;
}
?>