<?php
require_once __DIR__ . '/../controllers/JenisProduk.php'; // Sesuaikan path juga
require_once __DIR__ . '/../controllers/Produk.php'; // Sesuaikan path juga

$jenisProduk = new JenisProduk($pdo);
$produk = new Produk($pdo);

// $id = $_GET['id'];
$jenis_produk = $jenisProduk->index();

if (!$jenis_produk) {
    // echo "<script>alert('Data Produk tidak ditemukan'); window.location.href='index.php?url=produk';</script>";
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

    if ($produk->create($updatedData)) {
        echo "<script>alert('Data produk berhasil diupdate'); window.location.href='index.php?url=produk';</script>";
    } else {
        echo "<script>alert('Gagal update data produk');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Produk</h3>
    <form method="post">
    <div class="form-group">
        <label>Kode</label>
        <input type="text" name="kode" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="double" name="harga" class="form-control">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control">
    </div>
    <div class="form-group">
        <label>Jenis Produk</label>
        <select name="jenis_produk_id" class="form-control">
            <?php foreach ($jenis_produk as $jp): ?>
                <option value="<?= $jp['id'] ?>">
                    <?= $jp['nama'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="submit" class="btn btn-success mt-3" value="Tambah"> </>
    <a href="index.php?url=produk" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>