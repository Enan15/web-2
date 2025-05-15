<?php
require_once 'controllers/KartuDiskon.php';

$kartuDiskon = new KartuDiskon($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

        $kartuDiskon->delete($id);
        echo "<script>alert('Data Kartu Diskon berhasil dihapus'); window.location.href='index.php?url=kartu_diskon';</script>";
    
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=kartu_diskon';</script>";
}
