<?php
include '../network/connection.php';

if (isset($_POST['nik'])) {
    $nik = $_POST['nik'];

    $data = mysqli_query($connection, "SELECT sensor1 FROM suhu_data WHERE nik='$nik'");
    $sensorData = [];
    $labels = [];

    $counter = 1;

    while ($d = mysqli_fetch_assoc($data)) {
        $sensorData[] = $d['sensor1'];
        $labels[] = 'Data'. $counter;
        $counter++;
        // Jika Anda memiliki data labels, sesuaikan dengan cara yang sesuai
        // Contoh: $labels[] = $d['label'];
    }

    $response = [
        'sensorData' => $sensorData,
        'labels' => $labels,
    ];

    echo json_encode($response);
}
?>
