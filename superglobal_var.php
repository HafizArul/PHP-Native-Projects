<?php
// Superglobal Variables
/* 
* $_GET
* $_POST
* $_REQUEST
* $_SESSION
* $_COOKIE
* $_SERVER
* $_ENV
*/
// var_dump($_ENV);

// $_GET
// $_GET['NAMA'] = 'Hafiz Arul';
// $_GET['NIM'] = '24.02.xxxx';
// $_GET['UMUR'] = 19;

$mahasiswa = [
    [
        "nama" => "Hafiz Arul",
        "nim" => "24.02.1088",
        "ipk" => 3.8
    ],
    [
        "nama" => "Iqbal Asidig",
        "nim" => "24.02.1080",
        "ipk" => 4.0
    ]
];

// foreach ($mahasiswa as $mhs) {
//     foreach ($mhs as $key => $value) {
//         echo $key.' : '.'<a href="output_target.php';
//         echo '?'.$key.'='.$value.'">'.$value.'</a>'.'<br>';
//     }
//     echo "<br>";
// }
foreach ($mahasiswa as $mhs) {
    echo 'Nama : '.'<a href="output_target.php?nama='.$mhs['nama'].'&nim='.$mhs['nim'].'&ipk='.$mhs['ipk'].'">'.$mhs['nama'].'</a><br>';
}
?>

<hr>
<a href="output_target.php?nama=Hafiz Arul">Change Name</a>
<br>
<a href="output_target.php">Empty Name</a>
<br>
<?= "Var Dump : " ?>
<?php var_dump($_GET) ?>
