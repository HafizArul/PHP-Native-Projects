<?php
require 'functions.php';

// Jika tombol register ditekan
if (isset($_POST['register'])) {
    // Jika proses register berhasil
    if (register($_POST) > 0) {
        echo "<script>
            alert('User baru berhasil ditambahkan!');
        </script>";
    } else {
        echo mysqli_error($DB_Connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/form_tambah.css">
    <title>Registration Page</title>
</head>
<body>
    
    <div class="container">
        <h1>Halaman Registrasi</h1>
        <form action="" method="POST">
            <ul class="register-form">
                <li>
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" required>
                </li>
                <li>
                    <label for="confirmPassword">Konfirmasi Password</label><br>
                    <input type="password" name="confirmPassword" id="confirmPassword" required>
                </li>
                <li class="btn-actions">
                    <button type="submit" name="register">Register</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>