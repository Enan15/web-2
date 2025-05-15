<?php
require_once 'controllers/JenisProduk.php';
require_once 'controllers/Produk.php';

$Jenisproduk = new JenisProduk($pdo);
$produk = new Produk($pdo);

$id = $_GET['id'];
$data = $produk->show($id);

if (!$data) {
    echo "<script>alert('Data produk tidak ditemukan'); window.location.href='index.php?url=produk';</script>";
    exit;
}

// Proses update saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'kode' => $_POST['kode'],
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'harga' => $_POST['harga'],
        'stok' => $_POST['stok'],
        'jenis_produk_id' => $_POST['jenis_produk_id']
    ];

    if ($produk->update($id, $updatedData)) {
        echo "<script>alert('Data Produk berhasil diupdate'); window.location.href='index.php?url=produk';</script>";
    } 
}
?>

<div class="container">
    <h3>Edit Data produk</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" value="<?= $data['kode'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" value="<?= $data['deskripsi'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="double" name="harga" value="<?= $data['harga'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" value="<?= $data['stok'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Jenis Produk</label>
            <select name="jenis_produk_id" class="form-control">
                <?php foreach ($Jenisproduk->index() as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= $data['jenis_produk_id'] == $p['id'] ? 'selected' : '' ?>>
                        <?= $p['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="index.php?url=produk" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
