<?php
session_start();

// Jika tidak ada session login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["Id_Mhs"];
if (hapus($id) > 0) {
    $outputMsg = "Data berhasil dihapus!";
} else {
    $outputMsg = "Data gagal dihapus!";
}
?>
<?= "<script>
    alert('$outputMsg');
    document.location.href = 'index.php';
</script>" ?>