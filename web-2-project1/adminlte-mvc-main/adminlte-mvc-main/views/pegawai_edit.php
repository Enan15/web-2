<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/Pegawai.php';

$data = $pegawai->show($_GET['id']);

// Proses update saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'nip' => $_POST['nip'],
        'nama' => $_POST['nama'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'jabatan' => $_POST['jabatan']
    ];

    if ($pegawai->update($_GET['id'], $updatedData)) {
        echo "<script>alert('Data pegawai berhasil diupdate'); window.location.href='index.php?url=pegawai';</script>";
    } else {
        echo "<script>alert('Gagal update data pegawai');</script>";
    }
}
?>

<div class="container">
    <h3>Edit Pegawai</h3>
    <form method="post">
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="L" <?= $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan'] ?>">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="?page=pegawai" class="btn btn-secondary">Kembali</a>
    </form>
</div>
