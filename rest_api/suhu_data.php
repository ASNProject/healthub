<?php 
    class Suhu
    {
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        public function getAllSuhuData()
        {
            $query = "SELECT * FROM suhu_data";
            $result = mysqli_query($this->conn, $query);
            $suhus = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $suhus[] = $row;
            }
            return $suhus;
        }
        public function getSuhuDataById($nik)
        {
            $query = "SELECT * FROM suhu_data WHERE nik = $nik";
            $result = mysqli_query($this->conn, $query);
            $suhus = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $suhus[] = $row;
            }
            return $suhus;
        }
        public function addSuhuData($data)
        {
            $nama = $data['nama'];
            $nik = $data['nik'];
            $sensor1 = $data['sensor1'];
            $sensor2 = $data['sensor2'];
            $query = "INSERT INTO suhu_data (nama, nik, sensor1, sensor2) VALUES ('$nama', '$nik', '$sensor1', '$sensor2')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function updateSuhuData($id, $data)
        {
            $nama = $data['nama'];
            $nik = $data['nik'];
            $sensor1 = $data['sensor1'];
            $sensor2 = $data['sensor2'];
            $query = "UPDATE suhu_data SET nama = '$nama', nik = '$nik', sensor1 = '$sensor1', sensor2 = '$sensor2' WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function deleteSuhuData($id)
        {
            $query = "DELETE FROM suhu_data WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
?>