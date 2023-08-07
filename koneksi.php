<?php
class Database {
    private $host = "localhost";
    private $db_name = "malang";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}

?>