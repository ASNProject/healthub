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
        <link rel="stylesheet" href="style2.css">     
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
        <div class="container">
            <nav>
                <div class="logo_item">
                    <div id="healtHub"><span id="health">Health</span><span id="hub">Hub</span></div>
                </div>
            </nav>
            <div id="sidebar">
                <ul>
                    <li>
                        <a id="data_pasien_link" href="#0" class="s-sidebar_nav-link">
                            <i class="fa fa-list"></i><em>Data Pasien</em>
                        </a>
                    </li>
                    <li>
                        <a id="monitoring_data_link" href="#0" class="s-sidebar_nav-link">
                            <i class="fa fa-thermometer"></i><em>Monitoring</em>
                        </a>
                    </li>
                </ul>
            </div>
            <main class="s-layout_content">
                <!-- DATA PASIEN -->
                <div id="data_pasien_content" class="content" id="data_pasien_content">
                    <h1>Data Pasien</h1>
                    <a href="screen/add_patient.php" class="button pasien_button">Tambah Pasien</a>
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
                                        <a href="network/delete_patient.php?id=<?php echo $d['id']?>" class="button-delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                <?php
                            }
                        ?>
                    </table>
                </div>
                <!-- CHART -->
                <div id="monitoring_data_content" class="content" id="denyut_jantung_content">
                    <h1>Monitoring Data</h1>
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
                        <button id="stopData" class="button-stop" style="margin-left: 10px;">Stop</button>
                    </div>
                    <br>
                    <h3>HeartRate</h3>
                    <div class="chartCard">
                        <div id="chart-wrapper">
                            <canvas id="chartHeartRate"></canvas>
                        </div>
                    </div>
                    <br>
                    <h3>Saturation</h3>
                    <div class="chartCard">
                        <div id="chart-wrapper">
                            <canvas id="chartSaturation"></canvas>
                        </div>                        
                    </div>
                    <br>
                    <h3>Temperature</h3>
                    <div class="chartCard">
                        <div id="chart-wrapper">
                            <canvas id="chartTemperature"></canvas>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="script.js"></script>
    </body>
    <script>
        $(document).ready(function() {
            $('#monitoring_data_content').hide(); // Sembunyikan konten "Monitoring Data" saat halaman dimuat

            $('#data_pasien_link').click(function() {
                $('#data_pasien_content').show(); // Tampilkan konten "Data Pasien" saat tautan diklik
                $('#monitoring_data_content').hide(); // Sembunyikan konten "Monitoring Data" saat tautan diklik
            });

            $('#monitoring_data_link').click(function() {
                $('#data_pasien_content').hide(); // Sembunyikan konten "Data Pasien" saat tautan diklik
                $('#monitoring_data_content').show(); // Tampilkan konten "Monitoring Data" saat tautan diklik
            });
        });
        $(document).ready(function() {
        $('#nama_pasien').select2();

        // CHART DATA
        const ctxHeartRate = document.getElementById('chartHeartRate');
        const ctxSaturation = document.getElementById('chartSaturation');
        const ctxTemperature = document.getElementById('chartTemperature');

        $(document).ready(function(){
            $('#nama_pasien').select2();

            var chartHeartRate = null;
            var chartSaturation = null;
            var chartTemperature = null;

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
                if (chartHeartRate) {
                    chartHeartRate.destroy();
                }
                var ctx = document.getElementById('chartHeartRate').getContext('2d');
                chartHeartRate = new Chart(ctx, {
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
                        responsive: true,
                        scales: {
                            y: {
                                    beginAtZero: true
                            }
                        }
                    }
                });
            }

            function updateChartOksigen(data) {
                if (chartSaturation) {
                    chartSaturation.destroy();
                }
                var ctx = document.getElementById('chartSaturation').getContext('2d');
                chartSaturation = new Chart(ctx, {
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
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            function updateChartSuhu(data) {
                if (chartTemperature) {
                    chartTemperature.destroy();
                }
                var ctx = document.getElementById('chartTemperature').getContext('2d');
                chartTemperature = new Chart(ctx, {
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
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('#showData').on('click', function() {
            var selectedNama = $('#nama_pasien option:selected').text(); 
            var selectedNik = $('#nama_pasien').val(); 
            var updateId = 1; 
            var data = {
                nama: selectedNama,
                nik: selectedNik
            };
            fetch('http://localhost/healthub/rest_api/api.php/update/' + updateId, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                console.log(result); 
            })
            .catch(error => {
                console.error('Error:', error); 
            });
        });
    });
    $(document).ready(function() {
        $('#stopData').on('click', function() {
            var updateId = 1; 
            var data = {
                nama: '',
                nik: ''
            };
            fetch('http://localhost/healthub/rest_api/api.php/update/' + updateId, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                console.log(result); 
            })
            .catch(error => {
                console.error('Error:', error); 
            });
        });
    });
    </script>
</html>