<?php
require_once 'koneksi.php';
require_once 'produk.php';

// Inisialisasi koneksi database
$db = new Database();
$conn = $db->getConnection();

// Inisialisasi objek produk
$produk = new Produk($conn);

// Aksi Tambah/Ubah Produk
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $kode = isset($_POST['kode']) ? $_POST['kode'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : 0;
    $expired_date = isset($_POST['expired_date']) ? $_POST['expired_date'] : '';

    // Jika id tidak kosong, berarti ini adalah permintaan untuk mengubah produk
    if (!empty($id)) {
        $produk->saveOrUpdateProduk($id, $kode, $nama, $harga, $expired_date);
    } else {
        // Jika id kosong, berarti ini adalah permintaan untuk menambah produk baru
        $produk->saveOrUpdateProduk(null, $kode, $nama, $harga, $expired_date);
    }
}

// Aksi Hapus Produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi']) && $_POST['aksi'] === 'hapus') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $produk->deleteProduk($id);
}

// Redirect kembali ke halaman utama setelah melakukan operasi CRUD
header("Location: index.php");
exit;
?>