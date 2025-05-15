<!-- <?php
require_once __DIR__ . '/../config/DB.php'; // Sesuaikan path sesuai struktur proyek
require_once __DIR__ . '/../controllers/Produk.php'; // Sesuaikan path juga
$produk = new Produk($pdo);
?> -->

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?url=produk_create" class="btn btn-primary mb-3">Tambah Produk</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Jenis Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($produk->index() as $item):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['kode'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['deskripsi'] ?></td>
                            <td><?= $item['harga'] ?></td>
                            <td><?= $item['stok'] ?></td>
                            <td><?= $item['jenis_produk'] ?></td>
                            <td>
                                <a href="index.php?url=produk_edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?url=produk_delete&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
