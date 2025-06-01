<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::all();
        return view('peminjaman.index', compact('peminjamans'));
    }
}
