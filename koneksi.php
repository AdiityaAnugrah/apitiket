<?php

class Database
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $host = 'localhost';
        $username = 'root'; // Ganti dengan username MySQL Anda
        $password = ''; // Ganti dengan password MySQL Anda
        $database = 'malang'; // Ganti dengan nama database Anda

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}