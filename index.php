<!DOCTYPE html>
<html>

<head>
    <title>CRUD Produk</title>
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

    .table-container {
        max-width: 1000px;
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>CRUD Produk</h1>

        <!-- Form untuk menambahkan/mengubah produk -->
        <div class="form-container mb-4">
            <h2 class="mb-4">Tambah Produk</h2>
            <form action="tambah_produk.php">
                <button type="submit" class="btn btn-primary">Tambah Produk Baru</button>
            </form>
        </div>

        <!-- Tabel untuk menampilkan data produk -->
        <div class="table-container">
            <h2 class="mb-4">Data Produk</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Expired Date</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data produk akan di-generate secara dinamis menggunakan PHP -->
                    <?php
                    require_once 'koneksi.php';
                    require_once 'produk.php';

                    // Inisialisasi koneksi database
                    $db = new Database();
                    $conn = $db->getConnection();

                    // Inisialisasi objek produk
                    $produk = new Produk($conn);

                    // Ambil data produk dari database
                    $dataProduk = $produk->getAllProduk();

                    // Tampilkan data produk dalam tabel
                    foreach ($dataProduk as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['kode'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['harga'] . "</td>";
                        echo "<td>" . $row['expired_date'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo '<td>
                                <form action="edit_produk.php" method="post" style="display: inline-block;">
                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                                <form action="aksi_produk.php" method="post" style="display: inline-block;">
                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                    <input type="hidden" name="aksi" value="hapus">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script Bootstrap 5 dan JavaScript untuk mempercantik halaman -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>