<?php 
include('connection.php');

$id = $_POST['id'];
$nama_pasien = $_POST['nama_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$nik = $_POST['nik'];
$berat_badan = $_POST['berat_badan'];
$tinggi_badan = $_POST['tinggi_badan'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];

$query = "UPDATE pasien_data SET nama_pasien = '$nama_pasien', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', nik = '$nik', berat_badan = '$berat_badan', tinggi_badan = '$tinggi_badan', pekerjaan = '$pekerjaan', alamat = '$alamat' WHERE id = '$id'";

if($connection->query($query)){
    header("location: ../dashboard2.php");
} else {
    echo "Data gagal disimpan";
}

?>