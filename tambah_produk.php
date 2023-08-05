<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">Tambah Produk</h2>
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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" id="harga" name="harga" required>
                </div>
            </div>
            <div class="form-group">
                <label for="expired_date">Expired Date</label>
                <input type="date" id="expired_date" name="expired_date" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="Active">Active</option>
                    <option value="Expired">Expired</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" name="action" value="add" class="btn btn-primary"><i class="fas fa-save"></i>
                    Tambah Produk</button>
                <a href="index.php" class="btn btn-back"><i class="fas fa-chevron-left me-2"></i> Kembali</a>
            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>