<?php
require_once 'Config/DB.php';

class Produk
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $sql = "SELECT p.*, jp.nama AS jenis_produk 
                FROM produk p 
                JOIN jenis_produk jp ON p.jenis_produk_id = jp.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO produk (kode, nama, deskripsi, harga, stok, jenis_produk_id) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['kode'], $data['nama'], $data['deskripsi'], $data['harga'],
            $data['stok'], $data['jenis_produk_id']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE produk SET kode=?, nama=?, deskripsi=?, harga=?, stok=?, jenis_produk_id=? WHERE id=?");
        return $stmt->execute([
            $data['kode'], $data['nama'], $data['deskripsi'], $data['harga'],
            $data['stok'], $data['jenis_produk_id'], $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM produk WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
