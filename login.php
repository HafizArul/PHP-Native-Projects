<?php
session_start();

// Jika ada session login
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

// Cek apakah tombol submit sudah ditekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($DB_Connect, "SELECT * FROM user WHERE username = '$username'");

    // Cek username
    if (mysqli_num_rows($result) === 1) {
        // Cek password
        $row = mysqli_fetch_assoc($result);

        // Cek apakah password dari user sesuai dgn password yg dienkripsi/diacak, kebalikan password_hash()
        // password_verify($string_belum_diacak, $string_sudah_diacak)
        if (password_verify($password, $row['password'])) {
            // Set session
            $_SESSION['login'] = true;

            header("Location: index.php");
            exit;
        }
    }

    // Jika gagal login
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/form_tambah.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Halaman Login</title>
</head>
<body>
    <div class="container login-form">
        <h1>Login</h1>

        <?php if (isset($error)) : ?>
            <p class="err-login">Error : Gagal login! Username atau password salah!</p>
        <?php endif ?>

        <form action="" method="post">
            <ul class="register-form">
                <li>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </li>
                <li class="btn-actions">
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>