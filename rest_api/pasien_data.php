<?php 
    class PasienData
    {
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        public function getAllPasienData()
        {
            $query = "SELECT * FROM pasien_data";
            $result = mysqli_query($this->conn, $query);
            $pasiens = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $pasiens[] = $row;
            }
            return $pasiens;
        }
        public function getPasienDataById($nik)
        {
            $query = "SELECT * FROM pasien_data WHERE nik = $nik";
            $result = mysqli_query($this->conn, $query);
            $pasiens = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $pasiens[] = $row;
            }
            return $pasiens;
        }
        public function addPasienData($data)
        {
            $nama = $data['nama'];
            $jenis_kelamin = $data['jenis_kelamin'];
            $tanggal_lahir = $data['tanggal_lahir'];
            $nik = $data['nik'];
            $berat_badan = $data['berat_badan'];
            $tinggi_badan = $data['tinggi_badan'];
            $pekerjaan = $data['pekerjaan'];
            $alamat = $data['alamat'];
            $query = "INSERT INTO pasien_data (nama, jenis_kelamin, tanggal_lahir, nik, berat_badan, tinggi_badan, pekerjaan, alamat) VALUES ('$nama', '$jenis_kelamin', '$tanggal_lahir', '$nik', '$berat_badan', '$tinggi_badan', '$pekerjaan', '$alamat')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function updatePasienData($nik, $data)
        {
            $nama = $data['nama'];
            $jenis_kelamin = $data['jenis_kelamin'];
            $tanggal_lahir = $data['tanggal_lahir'];
            $nik = $data['nik'];
            $berat_badan = $data['berat_badan'];
            $tinggi_badan = $data['tinggi_badan'];
            $pekerjaan = $data['pekerjaan'];
            $alamat = $data['alamat'];
            $query = "UPDATE pasien_data SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', nik = '$nik', berat_badan = '$berat_badan', tinggi_badan = '$tinggi_badan', pekerjaan = '$pekerjaan', alamat = '$alamat' WHERE id = $nik";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function deletePasienData($nik)
        {
            $query = "DELETE FROM pasien_data WHERE id = $nik";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
?>