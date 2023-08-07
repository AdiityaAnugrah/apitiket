<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Tambahkan link Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Tambahkan link CSS lainnya -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        require_once 'koneksi.php';
        require_once 'produk.php';

        $database = new Database();
        $conn = $database->getConnection();

        if (isset($_GET['kode'])) {
            $produk = new Produk($conn); // Menggunakan objek koneksi database
            $kode_produk = $_GET['kode'];
            $data_produk = $produk->getProdukByKode($kode_produk);
        } else {
            header('Location: index.php');
            exit();
        }
        ?>

        <div class="header d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Edit Produk</h2>

        </div>
        <br>

        <form action="aksi_produk.php" method="post">
            <div class="form-group">
                <label for="kode">Kode Produk</label>
                <input type="text" id="kode" name="kode" value="<?= $data_produk['kode']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" id="nama" name="nama" value="<?= $data_produk['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga Produk</label>
                <input type="text" id="harga" name="harga" value="<?= $data_produk['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="expired_date">Expired Date</label>
                <input type="date" id="expired_date" name="expired_date" value="<?= $data_produk['expired_date']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="aktif" <?= $data_produk['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                    <option value="expired" <?= $data_produk['status'] == 'expired' ? 'selected' : ''; ?>>Expired
                    </option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" name="action" value="update" class="btn btn-primary"><i class="fas fa-save"></i>
                    Simpan Perubahan</button>

                <a href="index.php" class="btn btn-back"><i class="fas fa-chevron-left me-2"></i> Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    </div>
</body>

</html>