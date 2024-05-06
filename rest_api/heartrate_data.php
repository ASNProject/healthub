<?php 
    class HeartRate
    {
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        public function getAllHearrateData()
        {
            $query = "SELECT * FROM hearrate_data";
            $result = mysqli_query($this->conn, $query);
            $hearrates = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $hearrates[] = $row;
            }
            return $hearrates;
        }
        public function getHearrateDataById($nik)
        {
            $query = "SELECT * FROM hearrate_data WHERE nik = $nik";
            $result = mysqli_query($this->conn, $query);
            $hearrates = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $hearrates[] = $row;
            }
            return $hearrates;
        }
        public function addHearrateData($data)
        {
            $nama = $data['nama'];
            $nik = $data['nik'];
            $sensor1 = $data['sensor1'];
            $sensor2 = $data['sensor2'];
            $query = "INSERT INTO hearrate_data (nama, nik, sensor1, sensor2) VALUES ('$nama', '$nik', '$sensor1', '$sensor2')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function updateHearrateData($id, $data)
        {
            $nama = $data['nama'];
            $nik = $data['nik'];
            $sensor1 = $data['sensor1'];
            $sensor2 = $data['sensor2'];
            $query = "UPDATE hearrate_data SET nama = '$nama', nik = '$nik', sensor1 = '$sensor1', sensor2 = '$sensor2' WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function deleteHearrateData($id)
        {
            $query = "DELETE FROM hearrate_data WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
?>