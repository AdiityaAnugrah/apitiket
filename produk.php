<?php
class Produk
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=malang', 'root', '');
    }

    public function getAllProduk()
    {
        $query = 'SELECT * FROM produk';
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProdukByKode($kode)
    {
        $query = 'SELECT * FROM produk WHERE kode = :kode';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kode', $kode);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function saveOrUpdateProduk($data)
    {
        if (isset($data['kode'])) {
            $query = 'UPDATE produk SET nama = :nama, harga = :harga, expired_date = :expired_date WHERE kode = :kode';
        } else {
            $query = 'INSERT INTO produk (kode, nama, harga, expired_date) VALUES (:kode, :nama, :harga, :expired_date)';
        }

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kode', $data['kode']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':expired_date', $data['expired_date']);

        return $stmt->execute();
    }

    public function deleteProduk($kode)
    {
        $query = 'DELETE FROM produk WHERE kode = :kode';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kode', $kode);
        return $stmt->execute();
    }
}