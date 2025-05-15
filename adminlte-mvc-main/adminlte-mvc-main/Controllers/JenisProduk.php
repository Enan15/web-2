<?php
require_once 'Config/DB.php';

class JenisProduk
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Ambil semua data
    public function index()
    {
        $sql = "SELECT id, nama, deskripsi FROM jenis_produk";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil 1 data berdasarkan ID (untuk edit)
    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM jenis_produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah data baru
    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO jenis_produk (nama, deskripsi) VALUES (?, ?)");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi']
        ]);
    }


    // Update data
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE jenis_produk SET nama = ?, deskripsi = ? WHERE id = ?");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi'],
            $id
        ]);
    }

    // Hapus data
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM jenis_produk WHERE id = ?");
        $stmt->execute([$id]);
    }
}

$jenisProduk = new JenisProduk($pdo);
