<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/JenisProduk.php';

$data = $jenisProduk->show($_GET['id']);

// Proses update saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi']
    ];

    if ($jenisProduk->update($_GET['id'], $updatedData)) {
        echo "<script>alert('Data Jenis Produk berhasil diupdate'); window.location.href='index.php?url=jenis_produk';</script>";
    } else {
        echo "<script>alert('Gagal update data Jenis Produk');</script>";
    }
}
?>

<div class="container">
    <h3>Edit Jenis Produk</h3>
    <form method="post">
        <div class="mb-3">
            <label>nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label>deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?= $data['deskripsi'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="?page=jenis_produk" class="btn btn-secondary">Kembali</a>
    </form>
</div>
