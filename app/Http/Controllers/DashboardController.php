<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Mesin; 

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard dengan total data Mesin dan Barang.
     * Menggunakan nama tabel yang spesifik (tb_mesin dan tb_barang).
     */
    public function index()
    {
        // PERBAIKAN 1: Menggunakan nama tabel yang benar: 'tb_mesin'
        // Jika Model Mesin Anda sudah diatur ke 'tb_mesin', Anda bisa menggunakan Mesin::count().
        // Untuk amannya, kita gunakan DB::table() agar yakin.
        $mesin_count = DB::table('tb_mesin')->count(); 
        
        // PERBAIKAN 2: Menggunakan nama tabel yang benar: 'tb_barang' (Mengatasi error 1146)
        $barang_count = DB::table('tb_barang')->count(); 

        return view('dashboard', compact('mesin_count', 'barang_count'));
    }
}