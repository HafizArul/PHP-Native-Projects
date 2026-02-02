<?php
$nilai = 10;
echo $nilai;

function tampilkanNilai() {
    global $nilai;
    echo $nilai;
}
echo "<br>";
tampilkanNilai();
?>