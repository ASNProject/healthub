<?php
    include '../network/connection.php';

    $nama = $_POST['nama'] ?? '';
    $nik = $_POST['nik'] ?? '';

    $sql_insert = "UPDATE update_data SET nama = '$nama', nik = '$nik' WHERE id = 1";
    if ($connection->query($sql_insert) === TRUE) {
        echo "Stop Monitoring";
    } else {
        echo "Error: " .$connection->error;
    }

    $connection->close();
?>