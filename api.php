<?php


require_once 'produk.php';

$produk = new Produk();

// Endpoint untuk membaca list data produk dengan paging
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['page']) && isset($_GET['limit'])) {
$page = $_GET['page'];
$limit = $_GET['limit'];

// Validasi page dan limit harus bilangan bulat positif
if (!is_numeric($page) || !is_numeric($limit) || $page <= 0 || $limit <=0) { http_response_code(400); echo
    json_encode(array('message'=> 'Invalid page or limit parameter'));
    exit();
    }

    $data = $produk->getAllProdukPaging($page, $limit);

    // Jika data kosong, kirim response 404 Not Found
    if (empty($data)) {
    http_response_code(404);
    echo json_encode(array('message' => 'No products found'));
    exit();
    }

    // Kirim response dengan data produk
    http_response_code(200);
    echo json_encode($data);
    exit();
    }

    // Endpoint untuk menghapus produk
if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Cek apakah produk dengan kode tersebut ada dalam database
    $produkData = $produk->getProdukByKode($kode);
    if (!$produkData) {
        http_response_code(404);
        echo json_encode(array('message' => 'Product not found'));
        exit();
    }

    // Lakukan soft delete produk
    $produk->deleteProduk($kode);

    http_response_code(200);
    echo json_encode(array('message' => 'Product deleted successfully'));
    exit();
}

// Endpoint untuk mencari produk berdasarkan kode produk
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    $produkData = $produk->getProdukByKode($kode);

    if ($produkData) {
        http_response_code(200);
        echo json_encode($produkData);
    } else {
        http_response_code(404);
        echo json_encode(array('message' => 'Product not found'));
    }
    exit();
}

// Endpoint untuk mencari produk berdasarkan QR code
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['qrcode'])) {
    $qrcode = $_GET['qrcode'];

    $produkData = $produk->getProdukByQRCode($qrcode);

    if ($produkData) {
        http_response_code(200);
        echo json_encode($produkData);
    } else {
        http_response_code(404);
        echo json_encode(array('message' => 'Product not found'));
    }
    exit();
}
    ?>