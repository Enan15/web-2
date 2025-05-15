<?php
require_once 'controllers/Produk.php';

$produk = new Produk($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($produk->delete($id)) {
        echo "<script>alert('Data produk berhasil dihapus'); window.location.href='index.php?url=produk';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data produk'); window.location.href='index.php?url=produk';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=produk';</script>";
}
