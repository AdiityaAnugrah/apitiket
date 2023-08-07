<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
</head>

<body>
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Tambah Produk</h2>

        </div>
        <br>

        <form action="aksi_produk.php" method="post">
            <div class="form-group">
                <label for="kode">Kode Produk</label>
                <input type="text" id="kode" name="kode" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga Produk</label>
                <input type="text" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="expired_date">Expired Date</label>
                <input type="date" id="expired_date" name="expired_date" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="">Pilih Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="expired">Expired</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" name="action" value="add" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-back"><i class="fas fa-chevron-left me-2"></i> Kembali</a>
            </div>
        </form>
    </div>

    <!-- Script untuk Font Awesome dan SweetAlert2 -->
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</body>

</html>