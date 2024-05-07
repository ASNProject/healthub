<?php
    include 'connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($connection, "select * from admin where username='$username' and password='$password'");
    $cek = mysqli_num_rows($data);
    
    if($cek >= 0){
        header("location: ../dashboard2.php");
    } else {
        echo "Data gagal disimpan";
    }
    ?>
