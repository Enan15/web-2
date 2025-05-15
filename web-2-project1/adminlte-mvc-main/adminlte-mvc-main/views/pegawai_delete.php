<?php
require_once 'controllers/Pegawai.php';

$pegawai = new Pegawai($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($pegawai->delete($id)) {
        echo "<script>alert('Data Pegawai berhasil dihapus'); window.location.href='index.php?url=pegawai';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data Pegawai'); window.location.href='index.php?url=pegawai';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=pegawai';</script>";
}
