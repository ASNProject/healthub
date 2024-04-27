<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Pasien</title>
        <script type="text/javascript" src="assets/chartjs/Chart.js"></script>  
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="../style.css">     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>    
    </head>
    <body class="form-container">
        <a href="../index.php" class="button">Kembali</a>
        <br>
        <center>
            <h2>Tambah Data Pasien</h2>
        </center>
        <div class="card_form">
        <form action="add_action.php" method="POST">
            <label>Nama Pasien</label>
            <input type="text" name="nama_pasien" class="input_form" placeholder="Budi">
            <label>Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" class="input_form" placeholder="L/P">
            <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" class="input_form" placeholder="1 Januari 2000">
            <label>NIK</label>
            <input type="text" name="nik" class="input_form" placeholder="330123456678899">
            <label>Berat Badan</label>
            <input type="number" name="berat_badan" class="input_form" placeholder="70">
            <label>Tinggi Badan</label>
            <input type="number" name="tinggi_badan" class="input_form" placeholder="180">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="input_form" placeholder="Guru">
            <label>Alamat</label>
            <input type="text" name="alamat"  class="input_form" placeholder="Jalan Abc no 17, Jakarta">

            <center>
                <input class="button" type="submit" value="SIMPAN" name="simpan">
            </center>

        </form>
        </div>
    </body>
</html>
