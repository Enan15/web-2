<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/Pegawai.php';


// Proses update saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'nip' => $_POST['nip'],
        'nama' => $_POST['nama'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'jabatan' => $_POST['jabatan']
    ];

    if ($pegawai->create($updatedData)) {
        echo "<script>alert('Data pegawai berhasil diupdate'); window.location.href='index.php?url=pegawai';</script>";
    } else {
        echo "<script>alert('Gagal update data pegawai');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Pegawai</h3>
    <form method="post">
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control"  required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"  required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="L" >Laki-laki</option>
                <option value="P" >Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" >
        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
        <a href="?page=pegawai" class="btn btn-secondary">Kembali</a>
    </form>
</div>
