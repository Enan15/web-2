<?php
require_once 'controllers/JenisProduk.php';

$jenisProduk = new JenisProduk($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

        $jenisProduk->delete($id);
        echo "<script>alert('Data Jenis Produk berhasil dihapus'); window.location.href='index.php?url=jenis_produk';</script>";
    
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=kartu_diskon';</script>";
}
