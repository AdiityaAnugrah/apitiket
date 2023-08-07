<?php
require_once 'koneksi.php';
require_once 'produk.php';

$database = new Database();
$conn = $database->getConnection();

$produk = new Produk($conn);

// Mendapatkan parameter dari permintaan
$action = isset($_GET['action']) ? $_GET['action'] : '';
$kode = isset($_GET['kode']) ? $_GET['kode'] : '';

// Menggunakan switch untuk menangani berbagai tipe permintaan
switch ($action) {
    case 'all':
        $data = $produk->getAllProduk();
        if ($data) {
            http_response_code(200);
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Tidak ada data produk."));
        }
        break;

    case 'get':
        if (!empty($kode)) {
            $data = $produk->getProdukByKode($kode);
            if ($data) {
                http_response_code(200);
                echo json_encode($data);
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "Produk tidak ditemukan."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Parameter kode produk diperlukan."));
        }
        break;

    case 'paging':
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        $data = $produk->getAllProdukPaging($page, $limit);
        if ($data) {
            http_response_code(200);
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Tidak ada data produk."));
        }
        break;

    case 'delete':
        if (!empty($kode)) {
            $result = $produk->deleteProduk($kode);
            if ($result) {
                http_response_code(200);
                echo json_encode(array("message" => "Produk berhasil dihapus."));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Gagal menghapus produk."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Parameter kode produk diperlukan."));
        }
        break;

    default:
        http_response_code(400);
        echo json_encode(array("message" => "Permintaan tidak valid."));
}
?>