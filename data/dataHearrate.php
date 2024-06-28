<?php
    // Koneksi database
    include '../network/connection.php';

    // Ambil parameter nama dari query string
    $nama = isset($_GET['nama']) ? mysqli_real_escape_string($connection, $_GET['nama']) : '';

    // Get data sensor temperature berdasarkan nama
    $timeHeartrateQuery = "SELECT waktu FROM hearrate_data";
    $dataHeartrateQuery = "SELECT sensor1 FROM hearrate_data";

    if (!empty($nama)) {
        $timeTemperatureQuery .= " WHERE nama = '$nama'";
        $dataHeartrateQuery .= " WHERE nama = '$nama'";
    }

    $timeHeartrateQuery .= " ORDER BY id ASC";
    $dataHeartrateQuery .= " ORDER BY id ASC";

    $timeHeartrate = mysqli_query($connection, $timeHeartrateQuery);
    $dataHeartrate = mysqli_query($connection, $dataHeartrateQuery);

    $counter = 1;
?>

<!-- Show Chart -->
 <div class="panel panel-primary">
    <div class="panel-heading">
        Grafik Detak Jantung
    </div>
    <div class="panel-body">
        <!-- Canvas grafik heartrate -->
        <canvas id="chartHeartRate"></canvas>
        <!-- Create grafik -->
         <script type="text/javascript">
            // Read ID canvas
            var canvasHeartRate = document.getElementById('chartHeartRate');
            // Data grafik time and heartrate
            var data = {
                labels: [
                    <?php
                        while($data_time = mysqli_fetch_array($timeHeartrate))
                        {
                            echo '"'.$counter.'",';
                            $counter++;
                        }    
                    ?>
                ], 
                datasets: [{
                    label: "HearRate",
                    fill: true,
                    backgroundColor: "rgba(52, 231, 43, .2)",
                    borderColor: "rgba(52, 231, 43, 1)",
                    lineTension: 0.5,
                    pointRadius: 5,
                    data: [
                        <?php
                            while($data_heartrate = mysqli_fetch_array($dataHeartrate))
                            {
                                echo $data_heartrate['sensor1'].',';
                            }    
                        ?>
                    ]
                }]
            };

            // Option grafik
            var option = {
                showLines: true,
                animation: {duration: 0}
            };

            // Show grafik in canvas
            var myLineChart = Chart.Line(canvasHeartRate, {
                data : data,
                options : option,
            });
         </script>
    </div>
 </div>