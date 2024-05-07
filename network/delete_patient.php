<?php

include('connection.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM pasien_data WHERE id = '$id'";

if($connection->query($query)) {
    header("location: ../dashboard2.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>

