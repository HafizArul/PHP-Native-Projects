<!-- <?php var_dump($_GET) ?> -->
<?php
if (!isset($_GET['nama']) || !isset($_GET['nim']) || !isset($_GET['ipk'])) {
    // Memaksa Pengguna ke Halaman Utama (Redirecting)
    header("Location: superglobal_var.php");
    // Mengakhiri kode di atas dan tidak menjalankan kode yang di bawah
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output Target</title>
</head>
<body>
    <p>Nama : <?= isset($_GET['nama']) ? $_GET['nama'] : "Unknown" ?></p>
    <p>NIM : <?= isset($_GET['nim']) ? $_GET['nim'] : "Unknown" ?></p>
    <p>IPK : <?= isset($_GET['ipk']) ? $_GET['ipk'] : "Unknown"?></p>
    <br><hr>
    <a href="superglobal_var.php">Kembali ke superglobal_var.php</a>
</body>
</html>
