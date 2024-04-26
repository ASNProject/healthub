<?php 
include('connection.php');

$nama_pasien = $_POST['nama_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$nik = $_POST['nik'];
$berat_badan = $_POST['berat_badan'];
$tinggi_badan = $_POST['tinggi_badan'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];

$query = "INSERT INTO pasien_data (nama_pasien, jenis_kelamin, tanggal_lahir, nik, berat_badan, tinggi_badan, pekerjaan, alamat) VALUES ('$nama_pasien', '$jenis_kelamin', '$tanggal_lahir', '$nik', '$berat_badan', '$tinggi_badan', '$pekerjaan', '$alamat')";

if($connection->query($query)){
    header("location: ../index.php");
} else {
    echo "Data gagal disimpan";
}

?>
