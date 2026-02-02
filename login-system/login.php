<?php
// Cek apakah tombol submit sudah ditekan atau belum
echo isset($_GET['submitLogin']) ? $_GET['submitLogin'] : "";

// Cek username & password

// Jika benar, redirect ke halaman lain

// Jika salah, tampilkan pesan kesalahan

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrators' Login Page</title>
</head>
<body>
    <h1>Login Admin</h1>
    <form action="" method="POST">
        <label for="username">Username</label><br>
        <input type="text" name="userName" id="username">
        <br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password">
        <br><br>
        <button type="submit" name="submitLogin">Login</button>
    </form>
</body>
</html>