<?php
class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "malang"; 

    public function getConnection()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>