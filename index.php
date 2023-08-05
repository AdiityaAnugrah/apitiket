<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">CRUD Produk</h1>
            <a href="tambah_produk.php" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i> Tambah Produk
                Baru</a>
        </div>
        <br>

        <?php
        require_once 'produk.php';

        $produk = new Produk();
        $data = $produk->getAllProduk();
        ?>

        <?php if ($data) : ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
                    <?php foreach ($data as $produk) : ?>
                    <tr>
                        <td><?= $produk['kode']; ?></td>
                        <td><?= $produk['nama']; ?></td>
                        <td><?= $produk['harga']; ?></td>
                        <td><?= $produk['expired_date']; ?></td>
                        <td><?= $produk['status']; ?></td>
                        <td>
                            <a href="edit_produk.php?kode=<?= $produk['kode']; ?>"
                                class="btn btn-secondary btn-sm">Edit</a>
                            <a href="aksi_produk.php?action=delete&kode=<?= $produk['kode']; ?>"
                                class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else : ?>
        <div class="alert alert-info">
            Tidak ada data produk.
        </div>
        <?php endif; ?>
    </div>

    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>