<?php
require_once 'koneksi.php';
require_once 'produk.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $db = new Database();
        $conn = $db->getConnection();
        $produk = new Produk($conn);

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $expired_date = $_POST['expired_date'];
        $status = $_POST['status'];

        if ($_POST['action'] == 'add') {
            if ($produk->saveProduk([
                'kode' => $kode,
                'nama' => $nama,
                'harga' => $harga,
                'expired_date' => $expired_date,
                'status' => $status
            ])) {
                header('Location: index.php');
                exit();
            } else {
                header('Location: tambah_produk.php');
                exit();
            }
        } elseif ($_POST['action'] == 'update') {
            if ($produk->updateProduk([
                'kode' => $kode,
                'nama' => $nama,
                'harga' => $harga,
                'expired_date' => $expired_date,
                'status' => $status
            ])) {
                header('Location: index.php');
                exit();
            } else {
                header('Location: edit_produk.php?kode='.$kode);
                exit();
            }
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['kode'])) {
        $db = new Database();
        $conn = $db->getConnection();
        $produk = new Produk($conn);
        $produk->deleteProduk($_GET['kode']);
        header('Location: index.php');
        exit();
    }
}
?>