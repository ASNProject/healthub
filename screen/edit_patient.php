<!DOCTYPE html>
<html>
    <head>
        <title>Edit Pasien</title>
        <script type="text/javascript" src="assets/chartjs/Chart.js"></script>  
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="../assets/style/style.css">     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>    
    </head>
    <body class="form-container">
        <a href="../index.php" class="button">Kembali</a>
        <br>
        <center>
            <h2>Edit Data Pasien</h2>
        </center>
        <div class="card_form">
        <?php
        include '../network/connection.php';
        $id = $_GET['id'];
        $data = mysqli_query($connection, "select * from pasien_data where id='$id'");
        while($d = mysqli_fetch_array($data)){
            ?>
            <form action="edit_action.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $d['id']; ?>" class="input_form">
                <label>Nama Pasien</label>
                <input type="text" name="nama_pasien" value="<?php echo $d['nama_pasien']?>" class="input_form">
                <label>Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" value="<?php echo $d['jenis_kelamin']?>" class="input_form">
                <label>Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir']?>" class="input_form">
                <label>NIK</label>
                <input type="text" name="nik" value="<?php echo $d['nik']?>" class="input_form">
                <label>Berat Badan</label>
                <input type="number" name="berat_badan" value="<?php echo $d['berat_badan']?>" class="input_form">
                <label>Tinggi Badan</label>
                <input type="number" name="tinggi_badan" value="<?php echo $d['tinggi_badan']?>" class="input_form">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" value="<?php echo $d['pekerjaan']?>" class="input_form">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?php echo $d['alamat']?>" class="input_form">

                <center>
                    <input class="button" type="submit" value="SIMPAN" name="simpan">
                </center>
        </form>
        <?php
        }
        ?>
        </div>
    </body>
</html>