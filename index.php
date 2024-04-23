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
        <link rel="stylesheet" href="assets/style/style.css">     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>

    <body>
        <!-- Koneksi ke Database -->
        <?php 
            include 'connection.php'
        ?>


        <div class="container-content">
            <!-- Navbar -->
        <nav class="navbar">
            <div class="logo_item">
                <i class="bx bx-menu" id="sidebarOpen"></i>
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
                    <a href="add_patient.php" class="button">Tambah Pasien</a>
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
                                        <a href="edit_patient.php?id=<?php echo $d['id']; ?>" class="button-edit"><i class="fa fa-pen"></i></a>
                                        <a href="delete_patient.php?id=<?php echo $d['id']?>" class="button-delete"><i class="fa fa-trash"></i></a>
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
                    <div class="chartCard">
                        <div class="chartBox">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- SATURASI OKSIGEN -->
                <div class="content" id="saturasi_oksigen_content">Konten Saturasi Oksigen</div>
                <!-- SUHU -->
                <div class="content" id="suhu_content">Konten Suhu</div>
            </main>
        </div>
        </div>

    <!-- JavaScript -->
    <script src="script.js"></script>

    </body>
        <script>
	        const ctx = document.getElementById('myChart');

            <?php 
                $time = mysqli_query($connection, "SELECT COUNT(*) AS total FROM monitoring_data");
                $row = mysqli_fetch_assoc($time);
                $total_rows = $row['total'];

                $data = mysqli_query($connection, "SELECT sensor1 FROM monitoring_data WHERE nik='123456789'");
                $sensor1_data = array();
                while($d = mysqli_fetch_assoc($data)){
                    $sensor1_data[] = $d['sensor1'];
                }
            ?>
 
	        new Chart(ctx, {
		        type: 'line',
		        data: {
			        labels: Array.from(Array(<?php echo $total_rows; ?>).keys()),
			    datasets: [{
				    label: 'Hear Rate',
				    data: <?php echo json_encode($sensor1_data); ?>,
				backgroundColor: [
					'rgba(255, 99, 71, 1)',
					],
				borderColor: [
					'rgba(255, 99, 71, 1)',
					],
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

    $('.s-sidebar__nav-link').on('click', function () {
        var linkText = $(this).text().trim();
        $('.content').removeClass('active');
        $('#' + linkText.toLowerCase().replace(/ /g, '_') + '_content').addClass('active');
    });
    </script>
</html>