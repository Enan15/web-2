<?php
require_once 'controllers/KartuDiskon.php';

$kartuDiskon = new KartuDiskon($pdo);

// Proses simpan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'persen_diskon' => $_POST['persen_diskon']
    ];

    if ($kartuDiskon->create($data)) {
        echo "<script>alert('Data kartu diskon berhasil disimpan'); window.location.href='index.php?url=kartu_diskon';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data kartu diskon');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Kartu Diskon</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Persen Diskon</label>
            <input type="number" name="persen_diskon" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="?url=kartu_diskon" class="btn btn-secondary">Kembali</a>
    </form>
</div>
