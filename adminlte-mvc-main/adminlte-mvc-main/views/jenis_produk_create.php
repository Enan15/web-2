<?php
require_once 'controllers/JenisProduk.php';

$jenisProduk = new JenisProduk($pdo);

// Proses simpan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi']
    ];

    if ($jenisProduk->create($data)) {
        echo "<script>alert('Data jenis produk berhasil disimpan'); window.location.href='index.php?url=jenis_produk';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan jenis produk diskon');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Jenis Produk</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="?url=jenis_produk" class="btn btn-secondary">Kembali</a>
    </form>
</div>
