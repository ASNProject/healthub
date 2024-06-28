<?php
    // Koneksi database
    include '../network/connection.php';

    // Ambil parameter nama dari query string
    $nama = isset($_GET['nama']) ? mysqli_real_escape_string($connection, $_GET['nama']) : '';

    // Get data sensor saturasi berdasarkan nama
    $timeSaturationQuery = "SELECT waktu FROM saturation_data";
    $dataSaturationQuery = "SELECT sensor1 FROM saturation_data";

    if (!empty($nama)) {
        $timeSaturationQuery .= " WHERE nama = '$nama'";
        $dataSaturationQuery .= " WHERE nama = '$nama'";
    }

    $timeSaturationQuery .= " ORDER BY id ASC";
    $dataSaturationQuery .= " ORDER BY id ASC";

    $timeSaturation = mysqli_query($connection, $timeSaturationQuery);
    $dataSaturation = mysqli_query($connection, $dataSaturationQuery);

    $counter = 1;
?>

<!-- Show Chart -->
 <div class="panel panel-primary">
    <div class="panel-heading">
        Grafik Saturasi
    </div>
    <div class="panel-body">
        <!-- Canvas grafik saturasi -->
        <canvas id="chartSaturation"></canvas>
        <!-- Create grafik -->
         <script type="text/javascript">
            // Read ID canvas
            var canvasSaturation = document.getElementById('chartSaturation');
            // Data grafik 
            var data = {
                labels: [
                    <?php
                        while($data_time = mysqli_fetch_array($timeSaturation))
                        {
                            echo '"'.$counter.'",';
                            $counter++;
                        }    
                    ?>
                ], 
                datasets: [{
                    label: "Saturation",
                    fill: true,
                    backgroundColor: "rgba(52, 231, 43, .2)",
                    borderColor: "rgba(52, 231, 43, 1)",
                    lineTension: 0.5,
                    pointRadius: 5,
                    data: [
                        <?php
                            while($data_saturation = mysqli_fetch_array($dataSaturation))
                            {
                                echo $data_saturation['sensor1'].',';
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
            var myLineChart = Chart.Line(canvasSaturation, {
                data : data,
                options : option,
            });
         </script>
    </div>
 </div>