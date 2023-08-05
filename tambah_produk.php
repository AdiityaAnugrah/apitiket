<!DOCTYPE html>
<html>

<head>
    <title>Tambah Produk</title>
    <!-- Gaya CSS Bootstrap 5 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Produk</h1>

        <!-- Form untuk menambahkan produk -->
        <div class="form-container mb-4">
            <form action="aksi_produk.php" method="post">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="kode" placeholder="Kode" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="expired_date" required>
                    </div>
                </div>
                <div class="d-grid">
                    <input type="hidden" name="id" value="">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Bootstrap 5 dan JavaScript untuk mempercantik halaman -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>