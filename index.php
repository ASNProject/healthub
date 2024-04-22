<!DOCTYPE html>
<html>
    <head>
        <title>HealtHub Dashboard</title>

        <!-- Pemanggilan file -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="assets/chartjs/Chart.js"></script>  
        <link rel="stylesheet" href="assets/style/style.css">     
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'> 
    </head>

    <body>
        <!-- Koneksi ke Database -->
        <?php 
            include 'connection.php'
        ?>

        <!-- Main User Interface -->
        <center>
            <h2>Grafik HealtHub</h2>
        </center>

        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
        <br>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>NIK</th>
                    <th>Sensor 1</th>
                    <th>Sensor 2</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    $data = mysqli_query($connection, "select * from monitoring_data");
                    while($d=mysqli_fetch_array($data)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['nik']; ?></td>
                                <td><?php echo $d['sensor1']; ?></td>
                                <td><?php echo $d['sensor2']; ?></td>
                            </tr>
                         <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
				borderWidth: 1
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
</script>
</html>