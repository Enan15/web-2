<?php
require_once 'Config/DB.php';

class Pegawai
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Ambil semua data
    public function index()
    {
        $sql = "SELECT id, nip, nama, jenis_kelamin, jabatan FROM pegawai";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil 1 data berdasarkan ID (untuk edit)
    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pegawai WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah data baru
    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pegawai (nip, nama, jenis_kelamin, jabatan) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['nip'],
            $data['nama'],
            $data['jenis_kelamin'],
            $data['jabatan']
        ]);
    }


    // Update data
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE pegawai SET nip = ?, nama = ?, jenis_kelamin = ?, jabatan = ? WHERE id = ?");
        return $stmt->execute([
            $data['nip'],
            $data['nama'],
            $data['jenis_kelamin'],
            $data['jabatan'],
            $id
        ]);
    }

    // Hapus data
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pegawai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$pegawai = new Pegawai($pdo);
