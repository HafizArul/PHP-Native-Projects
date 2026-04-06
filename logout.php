<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// Hapus cookie
setcookie('id', '', time() - 3600);  // waktu expired = waktu saat logout - 1 jam atau waktu yg sudah lewat
setcookie('key', '', time() - 3600);

header("Location: login.php");
exit;
