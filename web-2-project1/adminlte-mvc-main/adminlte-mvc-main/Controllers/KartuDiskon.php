<?php
require_once 'Config/DB.php';

class KartuDiskon
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Ambil semua data
    public function index()
    {
        $sql = "SELECT id, nama, deskripsi, persen_diskon FROM kartu_diskon";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil 1 data berdasarkan ID (untuk edit)
    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM kartu_diskon WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah data baru
    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO kartu_diskon (nama, deskripsi, persen_diskon) VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi'],
            $data['persen_diskon']
        ]);
    }


    // Update data
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE kartu_diskon SET nama = ?, deskripsi = ?, persen_diskon = ? WHERE id = ?");
        return $stmt->execute([
            $data['nama'],
            $data['deskripsi'],
            $data['persen_diskon'],
            $id
        ]);
    }

    // Hapus data
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM kartu_diskon WHERE id = ?");
        $stmt->execute([$id]);
    }
}

$kartuDiskon = new KartuDiskon($pdo);
