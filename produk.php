<?php
require_once 'koneksi.php';

class Produk {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllProduk() {
        $query = 'SELECT * FROM produk';
        $result = $this->conn->query($query);
        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function saveProduk($data) {
        $kode = $data['kode'];
        $nama = $data['nama'];
        $harga = $data['harga'];
        $expired_date = $data['expired_date'];
        $status = $data['status'];

        $sql = "INSERT INTO produk (kode, nama, harga, expired_date, status) VALUES ('$kode', '$nama', '$harga', '$expired_date', '$status')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProduk($data) {
        $kode = $data['kode'];
        $nama = $data['nama'];
        $harga = $data['harga'];
        $expired_date = $data['expired_date'];
        $status = $data['status'];

        $sql = "UPDATE produk SET nama = '$nama', harga = '$harga', expired_date = '$expired_date', status = '$status' WHERE kode = '$kode'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }



    public function saveOrUpdateProduk($data) {
        $kode = $data['kode'];
        $nama = $data['nama'];
        $harga = $data['harga'];
        $expired_date = $data['expired_date'];
        $status = $data['status'];

        $sql = "INSERT INTO produk (kode, nama, harga, expired_date, status) VALUES ('$kode', '$nama', '$harga', '$expired_date', '$status')
        ON DUPLICATE KEY UPDATE nama='$nama', harga='$harga', expired_date='$expired_date', status='$status'";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    

    public function getProdukByKode($kode) {
        $query = "SELECT * FROM produk WHERE kode = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $kode);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $produk = $result->fetch_assoc();
            return $produk;
        } else {
            return null;
        }
    }

    public function getAllProdukPaging($page, $limit) {
        $offset = ($page - 1) * $limit;
        $query = "SELECT * FROM produk LIMIT ?, ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $produkList = [];
        while ($row = $result->fetch_assoc()) {
            $produkList[] = $row;
        }

        return $produkList;
    }

    public function deleteProduk($kode)
    {
        $query = 'DELETE FROM produk WHERE kode = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $kode);
        return $stmt->execute();
    }
}
?>