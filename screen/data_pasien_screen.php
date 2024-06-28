<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="../assets/js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="../jquery-latest.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
    <link rel="stylesheet" href="../style_new.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Data Pasien</title>
</head>
<body>
    <?php 
        include '../network/connection.php'
    ?>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar">
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo_item">
                    <div id="healtHub"><span id="health">Health</span><span id="hub">Hub</span></div>
                </div>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="beranda_screen.php">Beranda</a></li>
                    <li><a href="data_pasien_screen.php">Data Pasien</a></li>
                    <li><a href="chart_screen.php">Monitoring</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Content -->
    <div class="container">
        <h3>Data Pasien</h3>
        <button class="btn btn-primary" id="addButton">Tambah Pasien</button>
    </div>
    <!-- Table -->
    <div class="container" style="margin-top: 20px;">
        <div class="content" id="data_pasien_content">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>NIK</th>
                        <th>Berat Badan (Kg)</th>
                        <th>Tinggi Badan (cm)</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php 
                    $no = 1;
                    $data = mysqli_query($connection, "select * from pasien_data");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $d['nama_pasien']?></td>
                            <td><?php echo $d['jenis_kelamin']?></td>
                            <td><?php echo $d['tanggal_lahir']?></td>
                            <td><?php echo $d['nik']?></td>
                            <td><?php echo $d['berat_badan']?></td>
                            <td><?php echo $d['tinggi_badan']?></td>
                            <td><?php echo $d['pekerjaan']?></td>
                            <td><?php echo $d['alamat']?></td>
                            <td>
                                <a href="edit_patient.php?id=<?php echo $d['id']; ?>" class="btn btn-xs d-flex justify-content-center align-items-center" style="background-color: steelblue;"><i class="fa fa-pen" style="color: white; height: 100%; width: 100%;"></i></a>
                                <a href="../network/delete_patient.php?id=<?php echo $d['id']?>" class="btn btn-xs btn-danger d-flex justify-content-center align-items-center" style="background-color: red;"><i class="fa fa-trash" style="color: white; height: 100%; width: 100%;"></i></a>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                    }
                ?>         
            </table>
        </div>
    </div>
</body>
<script>
    document.getElementById("addButton").addEventListener("click", function() {
        window.location.href = "add_patient.php";
    });
</script>
</html>