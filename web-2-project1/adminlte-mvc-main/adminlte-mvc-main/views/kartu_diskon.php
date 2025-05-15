<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/KartuDiskon.php';
$kartuDiskon = new KartuDiskon($pdo);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?url=kartu_diskon_create" class="btn btn-primary mb-3">Tambah Kartu Diskon</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Persen Diskon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($kartuDiskon->index() as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['deskripsi'] ?></td>
                            <td><?= $item['persen_diskon'] ?></td>
                            <td>
                                <a href="index.php?url=kartu_diskon_edit&id=<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="index.php?url=kartu_diskon_delete&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
