<?php 
    class Admin
    {
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        public function getAllAdminData()
        {
            $query = "SELECT * FROM admin";
            $result = mysqli_query($this->conn, $query);
            $admins = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $admins[] = $row;
            }
            return $admins;
        }
        public function getAdminDataById($id)
        {
            $query = "SELECT * FROM admin WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            $admins = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $admins[] = $row;
            }
            return $admins;
        }
        public function addAdminData($data)
        {
            $username = $data['username'];
            $password = $data['password'];
            $query = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function updateAdminData($id, $data)
        {
            $username = $data['username'];
            $password = $data['password'];
            $query = "UPDATE admin SET username = '$username', password = '$password' WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function deleteAdminData($id)
        {
            $query = "DELETE FROM admin WHERE id = $id";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
?>