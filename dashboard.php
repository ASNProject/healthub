<!DOCTYPE html>
<html>
    <head>
        <title>HealtHub Dashboard</title>

        <!-- Pemanggilan file -->
        <!-- <meta http-equiv="refresh" content="5"> -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="assets/chartjs/Chart.js"></script>  
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="style.css">     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>

    <body>
        <!-- Koneksi ke Database -->
        <?php 
            include 'network/connection.php'
        ?>


        <div class="container-content">
            <!-- Navbar -->
        <nav class="navbar">
            <div class="logo_item">
                <div id="healtHub"><span id="healt">Health</span><span id="hub">Hub</span></div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="s-layout">
            <!-- Sidebar -->
            <div class="s-layout__sidebar">
                <a href="#0" class="s-sidebar__trigger">
                    <i class="fa fa-bars"></i>
                </a>
                <nav class="s-sidebar__nav">
                    <ul>
                        <li>
                            <a href="#0" class="s-sidebar__nav-link">
                                <i class="fa fa-list"></i><em>Data Pasien</em>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="s-sidebar__nav-link">
                                <i class="fa fa-heart"></i><em>Denyut Jantung</em>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="s-sidebar__nav-link">
                                <i class="fa fa-lungs"></i><em>Saturasi Oksigen</em>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="s-sidebar__nav-link">
                            <i class="fa fa-thermometer"></i><em>Suhu</em>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Content -->
            <main class="s-layout__content">
                <!-- DATA PASIEN -->
                <div class="content active" id="data_pasien_content">
                    <h1>Data Pasien</h1>
                    <a href="screen/add_patient.php" class="button">Tambah Pasien</a>
                    <br>
                    <br>
                    <table border="1" class="table-pasien">
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
                                        <a href="screen/edit_patient.php?id=<?php echo $d['id']; ?>" class="button-edit"><i class="fa fa-pen"></i></a>
                                        <a href="screen/delete_patient.php?id=<?php echo $d['id']?>" class="button-delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                <?php
                            }
                        ?>
                    </table>
                </div>
                <!-- DENYUT JANTUNG -->
                <div class="content" id="denyut_jantung_content">
                    <h1>Monitoring Denyut Jantung Pasien</h1>
                    <div class="search-content">
                    <form method="POST">
                        <select class="js-select2" name="nama_pasien" id="nama_pasien">
                            <?php
                            $data = mysqli_query($connection, "SELECT * FROM pasien_data");
                            while($d = mysqli_fetch_array($data)){
                                ?>
                                <option value="<?php echo $d['nik'] ?>"><?php echo $d['nama_pasien'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </form>
                    <button id="showData" class="button" style="margin-left: 10px;">Mulai</button>
                    <button class="button-stop" style="margin-left: 10px;">Stop</button>
                    </div>
                    <br>
                    <div class="chartCard">
                        <div class="chartBox">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- SATURASI OKSIGEN -->
                <div class="content" id="saturasi_oksigen_content">
                <h1>Monitoring Saturasi Oksigen</h1>
                    <div class="search-content">
                    <form method="POST">
                        <select class="js-select2" name="nama_pasien" id="oksigen">
                            <?php
                            $data = mysqli_query($connection, "SELECT * FROM pasien_data");
                            while($d = mysqli_fetch_array($data)){
                                ?>
                                <option value="<?php echo $d['nik'] ?>"><?php echo $d['nama_pasien'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </form>
                    <button id="showDataOksigen" class="button" style="margin-left: 10px;">Mulai</button>
                    <button class="button-stop" style="margin-left: 10px;">Stop</button>
                    </div>
                    <br>
                    <div class="chartCard">
                        <div class="chartBox">
                            <canvas id="myChartOksigen"></canvas>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- SUHU -->
                <div class="content" id="suhu_content">
                <h1>Monitoring Suhu</h1>
                    <div class="search-content">
                    <form method="POST">
                        <select class="js-select2" name="nama_pasien" id="suhu">
                            <?php
                            $data = mysqli_query($connection, "SELECT * FROM pasien_data");
                            while($d = mysqli_fetch_array($data)){
                                ?>
                                <option value="<?php echo $d['nik'] ?>"><?php echo $d['nama_pasien'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </form>
                    <button id="showDataSuhu" class="button" style="margin-left: 10px;">Mulai</button>
                    <button class="button-stop" style="margin-left: 10px;">Stop</button>
                    </div>
                    <br>
                    <div class="chartCard">
                        <div class="chartBox">
                            <canvas id="myChartSuhu"></canvas>
                        </div>
                    </div>
                    <br>
                </div>
            </main>
        </div>
        </div>

    <!-- JavaScript -->
    <script src="script.js"></script>

    </body>
        <script>
	        const ctx = document.getElementById('myChart');
            const ctx2 = document.getElementById('myChartOksigen');
            const ctx3 = document.getElementById('myChartSuhu');
            
            $(document).ready(function(){
                $('#nama_pasien').select2();
                $('#oksigen').select2();
                $('#suhu').select2();

                var myChart = null;
                var myChartOksigen = null;
                var myChartSuhu

                $('#showData').on('click', function() {
                    var selectedNik = $('#nama_pasien').val();
                    $.ajax({
                        url: 'data/getData.php',
                        method: 'POST',
                        data: {nik: selectedNik},
                        success: function(response) {
                            var data = JSON.parse(response);
                            updateChart(data);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });

                $('#showDataOksigen').on('click', function() {
                    var selectedNik = $('#oksigen').val();
                    $.ajax({
                        url: 'data/getDataOksigen.php',
                        method: 'POST',
                        data: {nik: selectedNik},
                        success: function(response) {
                            var data = JSON.parse(response);
                            updateChartOksigen(data);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });

                $('#showDataSuhu').on('click', function() {
                    var selectedNik = $('#suhu').val();
                    $.ajax({
                        url: 'data/getDataSuhu.php',
                        method: 'POST',
                        data: {nik: selectedNik},
                        success: function(response) {
                            var data = JSON.parse(response);
                            updateChartSuhu(data);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });


                function updateChart(data) {
                    if (myChart) {
                        myChart.destroy();
                    }
                    var ctx = document.getElementById('myChart').getContext('2d');
                    myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Heart Rate',
                                data: data.sensorData,
                                backgroundColor: 'rgba(255, 99, 71, 1)',
                                borderColor: 'rgba(255, 99, 71, 1)',
                                borderWidth: 1,
                                lineTension: 0.5,
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }

                function updateChartOksigen(data) {
                    if (myChartOksigen) {
                        myChartOksigen.destroy();
                    }
                    var ctx = document.getElementById('myChartOksigen').getContext('2d');
                    myChartOksigen = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Oksigen',
                                data: data.sensorData,
                                backgroundColor: 'rgba(255, 99, 71, 1)',
                                borderColor: 'rgba(255, 99, 71, 1)',
                                borderWidth: 1,
                                lineTension: 0.5,
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }

                function updateChartSuhu(data) {
                    if (myChartSuhu) {
                        myChartSuhu.destroy();
                    }
                    var ctx = document.getElementById('myChartSuhu').getContext('2d');
                    myChartSuhu = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Suhu',
                                data: data.sensorData,
                                backgroundColor: 'rgba(255, 99, 71, 1)',
                                borderColor: 'rgba(255, 99, 71, 1)',
                                borderWidth: 1,
                                lineTension: 0.5,
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });
 
    

    $('.s-sidebar__nav-link').on('click', function () {
        var linkText = $(this).text().trim();
        $('.content').removeClass('active');
        $('#' + linkText.toLowerCase().replace(/ /g, '_') + '_content').addClass('active');
    });

    $(document).ready(function() {
        $('#nama_pasien').select2();
    });
    $(document).ready(function() {
        $('#oksigen').select2();
    });
    $(document).ready(function() {
        $('#suhu').select2();
    });

    </script>
</html>