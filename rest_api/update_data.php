<?php 
    class UpdateData
    {
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        public function getAllUpdateData()
        {
            $query = "SELECT * FROM update_data";
            $result = mysqli_query($this->conn, $query);
            $updates = mysqli_fetch_assoc($result);
            return $updates;
        }
        public function getUpdateDataById($id)
        {
            $query = "SELECT * FROM update_data WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            $updates = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $updates[] = $row;
            }
            return $updates;
        }
        public function addUpdateData($data)
        {
            $nama = $data['nama'];
            $nik = $data['nik'];
            $query = "INSERT INTO update_data (nama, nik) VALUES ('$nama', '$nik')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function updateUpdateData($id, $data)
        {
            $nama = $data['nama'];
            $nik = $data['nik'];
            $query = "UPDATE update_data SET nama = '$nama', nik = '$nik' WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function deleteUpdateData($id)
        {
            $query = "DELETE FROM update_data WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
?>