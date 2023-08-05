<?php
class Produk
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllProduk()
    {
        $query = "SELECT * FROM produk";
        $result = $this->conn->query($query);

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getProdukById($id)
    {
        $query = "SELECT * FROM produk WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }

    public function saveOrUpdateProduk($id, $kode, $nama, $harga, $expired_date)
    {
        $status = ($expired_date < date('Y-m-d')) ? "Expired" : "Aktif";

        if (empty($id)) {
            $query = "INSERT INTO produk (kode, nama, harga, expired_date, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssdss", $kode, $nama, $harga, $expired_date, $status);
        } else {
            $query = "UPDATE produk SET kode = ?, nama = ?, harga = ?, expired_date = ?, status = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssdssi", $kode, $nama, $harga, $expired_date, $status, $id);
        }

        return $stmt->execute();
    }

    public function deleteProduk($id)
    {
        $query = "DELETE FROM produk WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>