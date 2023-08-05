<?php
require_once 'koneksi.php';

class Produk
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
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
        $kode = $data['kode'];
        $nama = $data['nama'];
        $harga = str_replace(['Rp', '.'], '', $data['harga']);
        $expired_date = $data['expired_date'];
        $status = strtolower($data['status']); // Convert status to lowercase

        if ($this->getProdukByKode($kode)) {
            // Update existing record
            $query = 'UPDATE produk SET nama = :nama, harga = :harga, expired_date = :expired_date, status = :status WHERE kode = :kode';
        } else {
            // Insert new record
            $query = 'INSERT INTO produk (kode, nama, harga, expired_date, status) VALUES (:kode, :nama, :harga, :expired_date, :status)';
        }

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':expired_date', $expired_date);
        $stmt->bindParam(':status', $status);

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $produk = new Produk();

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $harga = str_replace(['Rp', '.'], '', $_POST['harga']); // Hapus simbol 'Rp' dan titik
        $expired_date = $_POST['expired_date'];
        $status = strtolower($_POST['status']); // Convert status to lowercase

        if ($_POST['action'] == 'add') {
            $produk->saveOrUpdateProduk([
                'kode' => $kode,
                'nama' => $nama,
                'harga' => $harga,
                'expired_date' => $expired_date,
                'status' => $status
            ]);
            header('Location: index.php');
            exit();
        } elseif ($_POST['action'] == 'update') {
            $produk->saveOrUpdateProduk([
                'kode' => $kode,
                'nama' => $nama,
                'harga' => $harga,
                'expired_date' => $expired_date,
                'status' => $status
            ]);
            header('Location: index.php');
            exit();
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['kode'])) {
        $produk = new Produk();
        $produk->deleteProduk($_GET['kode']);
        header('Location: index.php');
        exit();
    }
}