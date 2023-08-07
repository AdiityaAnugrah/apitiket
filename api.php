<?php
require_once 'koneksi.php';
require_once 'produk.php';

$database = new Database();
$conn = $database->getConnection();

$produk = new Produk($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'all':
        $data = $produk->getAllProduk();
        if ($data) {
            http_response_code(200);
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Data produk tidak ditemukan."));
        }
        break;

    case 'detail':
        $kode = isset($_GET['kode']) ? $_GET['kode'] : '';
        if ($kode != '') {
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
            echo json_encode(array("message" => "Parameter kode tidak valid."));
        }
        break;

    case 'paging':
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;

        if ($page <= 0 || $limit <= 0) {
            http_response_code(400);
            echo json_encode(array("message" => "Parameter halaman (page) dan batas (limit) harus lebih dari 0."));
            break;
        }

        $data = $produk->getAllProdukPaging($page, $limit);
        if ($data) {
            http_response_code(200);
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Data produk tidak ditemukan."));
        }
        break;

    case 'delete':
        $kode = isset($_GET['kode']) ? $_GET['kode'] : '';
        if ($kode != '') {
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
            echo json_encode(array("message" => "Parameter kode tidak valid."));
        }
        break;

    default:
        http_response_code(400);
        echo json_encode(array("message" => "Permintaan tidak valid."));
}
?>