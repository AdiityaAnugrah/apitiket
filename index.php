<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
</head>


<body>
    <div class="container">
        <h1 class="mb-4">CRUD Produk</h1>
        <a href="tambah_produk.php" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i> Tambah Produk
            Baru</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Expired Date</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'produk.php';

                $produk = new Produk();
                $data = $produk->getAllProduk();

                foreach ($data as $produk) : ?>
                <tr>
                    <td><?= $produk['kode']; ?></td>
                    <td><?= $produk['nama']; ?></td>
                    <td>Rp<?= number_format($produk['harga'], 0, ',', '.'); ?></td>
                    <td><?= date('d F Y', strtotime($produk['expired_date'])); ?></td>
                    <td><?= $produk['status']; ?></td>
                    <td>
                        <a href="edit_produk.php?kode=<?= $produk['kode']; ?>" class="btn btn-secondary btn-sm"><i
                                class="fas fa-edit"></i> Edit</a>
                        <a href="aksi_produk.php?action=delete&kode=<?= $produk['kode']; ?>"
                            class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>