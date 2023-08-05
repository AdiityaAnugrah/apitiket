<?php
require_once 'produk.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $produk = new Produk();

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $expired_date = $_POST['expired_date'];

        if ($_POST['action'] == 'add') {
            $produk->saveOrUpdateProduk([
                'kode' => $kode,
                'nama' => $nama,
                'harga' => $harga,
                'expired_date' => $expired_date,
                'status' => 'Active'
            ]);
            header('Location: index.php');
            exit();
        } elseif ($_POST['action'] == 'update') {
            $produk->saveOrUpdateProduk([
                'kode' => $kode,
                'nama' => $nama,
                'harga' => $harga,
                'expired_date' => $expired_date,
                'status' => 'Active'
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