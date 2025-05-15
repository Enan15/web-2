<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/KartuDiskon.php';

$data = $kartuDiskon->show($_GET['id']);

// Proses update saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'persen_diskon' => $_POST['persen_diskon']
    ];

    if ($kartuDiskon->update($_GET['id'], $updatedData)) {
        echo "<script>alert('Data kartu diskon berhasil diupdate'); window.location.href='index.php?url=kartu_diskon';</script>";
    } else {
        echo "<script>alert('Gagal update data kartu diskon');</script>";
    }
}
?>

<div class="container">
    <h3>Edit Kartu Diskon</h3>
    <form method="post">
        <div class="mb-3">
            <label>nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label>deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?= $data['deskripsi'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Persen Diskon</label>
            <input type="number" name="persen_diskon" class="form-control" value="<?= $data['persen_diskon'] ?>">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="?page=kartu_diskon" class="btn btn-secondary">Kembali</a>
    </form>
</div>
