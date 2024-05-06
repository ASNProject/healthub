<?php 
    class Saturation
    {
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        public function getAllSaturationData()
        {
            $query = "SELECT * FROM saturation_data";
            $result = mysqli_query($this->conn, $query);
            $saturations = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $saturations[] = $row;
            }
            return $saturations;
        }
        public function getSaturationDataById($nik)
        {
            $query = "SELECT * FROM saturation_data WHERE nik = $nik";
            $result = mysqli_query($this->conn, $query);
            $saturations = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $saturations[] = $row;
            }
            return $saturations;
        }
        public function addSaturationData($data)
        {
            $nama = $data['nama'];
            $nik = $data['nik'];
            $sensor1 = $data['sensor1'];
            $sensor2 = $data['sensor2'];
            $query = "INSERT INTO saturation_data (nama, nik, sensor1, sensor2) VALUES ('$nama', '$nik', '$sensor1', '$sensor2')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function updateSaturationData($id, $data)
        {
            $nama = $data['nama'];
            $nik = $data['nik'];
            $sensor1 = $data['sensor1'];
            $sensor2 = $data['sensor2'];
            $query = "UPDATE saturation_data SET nama = '$nama', nik = '$nik', sensor1 = '$sensor1', sensor2 = '$sensor2' WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function deleteSaturationData($id)
        {
            $query = "DELETE FROM saturation_data WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
?>