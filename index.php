<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">DATA PRODUK</h1>
            <a href="tambah_produk.php" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i> Tambah Produk
                Baru</a>
        </div>
        <br>

        <?php
        require_once 'koneksi.php';
        require_once 'produk.php';

        $database = new Database();
        $conn = $database->getConnection();

        $produk = new Produk($conn);
        $data = $produk->getAllProduk();
        ?>

        <div class="table-responsive">
            <?php if (empty($data)) : ?>
            <div class="alert alert-info">
                Tidak ada data produk.
            </div>
            <?php else : ?>
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
                        <td><?= 'Rp ' . number_format($produk['harga'], 0, ',', '.'); ?></td>
                        <td><?= date('d F Y', strtotime($produk['expired_date'])); ?></td>
                        <td><?= $produk['status']; ?></td>
                        <td>
                            <a href="edit_produk.php?kode=<?= $produk['kode']; ?>" class="btn btn-secondary btn-sm"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <a href="aksi_produk.php?action=delete&kode=<?= $produk['kode']; ?>"
                                class="btn btn-danger btn-sm delete-btn"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const deleteUrl = e.currentTarget.getAttribute('href');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data produk akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            });
        });
    });
    </script>
</body>

</html>