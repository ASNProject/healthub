<?php
$namaEncode = $_POST['nama'];
$nama = urldecode($namaEncode);
include '../network/connection.php';

echo "Nama yang dikirim: " . $nama . "<br>";

$sql = "SELECT nik FROM pasien_data WHERE nama_pasien = '$nama'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nik = $row['nik'];

    $sql_insert = "UPDATE update_data SET nama = '$nama', nik = '$nik' WHERE id = 1";

    if ($connection->query($sql_insert) === TRUE) {
        echo "Mulai Monitoring";
    } else {
        echo "Error: " . $sql_insert . "<br>" .$connection->error;
    }
} else {
    echo "Data pasien tidak ditemukan";
}

$connection->close();
?>