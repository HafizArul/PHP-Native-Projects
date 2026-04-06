<?php
session_start();
require 'functions.php';

// Cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $user = $_COOKIE['key'];

    // Ambil username berdasarkan id
    $result = mysqli_query($DB_Connect, "SELECT username FROM user WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);

    // Cek cookie dan username
    if ($_COOKIE['key'] === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

// Jika ada session login
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

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

            // Cek remember me (Cookie)
            if (isset($_POST['remember'])) {
                // setcookie('login', 'true', time()+60);  // Cara yg mudah dibobol (tidak disarankan untuk data privasi)
                setcookie('id', $row['id_user'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);  // hash('algoritma enkripsi', string yg ingin dienkripsi)
            }

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
                <li id="remember-me">
                    <label for="remember">Remember me</label>
                    <input type="checkbox" name="remember" id="remember">
                </li>
                <li class="btn-actions">
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>