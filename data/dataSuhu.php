<?php
    // Koneksi database
    include '../network/connection.php';

    // Ambil parameter nama dari query string
    $nama = isset($_GET['nama']) ? mysqli_real_escape_string($connection, $_GET['nama']) : '';

    // Get data sensor temperature berdasarkan nama
    $timeTemperatureQuery = "SELECT waktu FROM suhu_data";
    $dataTemperatureQuery = "SELECT sensor1 FROM suhu_data";

    if (!empty($nama)) {
        $timeTemperatureQuery .= " WHERE nama = '$nama'";
        $dataTemperatureQuery .= " WHERE nama = '$nama'";
    }

    $timeTemperatureQuery .= " ORDER BY id ASC";
    $dataTemperatureQuery .= " ORDER BY id ASC";

    $timeTemperature = mysqli_query($connection, $timeTemperatureQuery);
    $dataTemperature = mysqli_query($connection, $dataTemperatureQuery);

    $counter = 1;
?>

<!-- Show Chart -->
 <div class="panel panel-primary">
    <div class="panel-heading">
        Grafik Temperature
    </div>
    <div class="panel-body">
        <!-- Canvas grafik suhu -->
        <canvas id="chartSuhu"></canvas>
        <!-- Create grafik -->
         <script type="text/javascript">
            // Read ID canvas
            var canvasSuhu = document.getElementById('chartSuhu');
            // Data grafik time and temperature
            var data = {
                labels: [
                    <?php
                        while($data_time = mysqli_fetch_array($timeTemperature))
                        {
                            echo '"'.$counter.'",';
                            $counter++;
                        }    
                    ?>
                ], 
                datasets: [{
                    label: "Temperature",
                    fill: true,
                    backgroundColor: "rgba(52, 231, 43, .2)",
                    borderColor: "rgba(52, 231, 43, 1)",
                    lineTension: 0.5,
                    pointRadius: 5,
                    data: [
                        <?php
                            while($data_temperature = mysqli_fetch_array($dataTemperature))
                            {
                                echo $data_temperature['sensor1'].',';
                            }    
                        ?>
                    ]
                }]
            };

            // Option grafik
            var optionSuhu = {
                showLines: true,
                animation: {duration: 0}
            };

            // Show grafik in canvas
            var temperatureLineChart = Chart.Line(canvasSuhu, {
                data : data,
                options : optionSuhu,
            });
         </script>
    </div>
 </div>