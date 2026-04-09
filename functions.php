<?php
$DB_Connect = mysqli_connect("localhost", "root", "", "sekolah_011088");

function query($query) {
    global $DB_Connect;
    $result = mysqli_query($DB_Connect, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
?>