<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        require_once 'produk.php';

        if (isset($_GET['kode'])) {
            $produk = new Produk();
            $kode_produk = $_GET['kode'];
            $data_produk = $produk->getProdukByKode($kode_produk);
        } else {
            header('Location: index.php');
            exit();
        }
        ?>

        <div class="header d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Edit Produk</h2>
            <a href="index.php" class="btn btn-back"><i class="fas fa-chevron-left me-2"></i> Kembali</a>
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
                <input type="number" id="harga" name="harga" value="<?= $data_produk['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="expired_date">Expired Date</label>
                <input type="date" id="expired_date" name="expired_date" value="<?= $data_produk['expired_date']; ?>"
                    required>
            </div>
            <div class="btn-container">
                <button type="submit" name="action" value="update" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>