<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\DetailBarang;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::with('detailBarang');

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('code', 'like', "%{$searchTerm}%")
                  ->orWhere('machine', 'like', "%{$searchTerm}%")
                  ->orWhere('name_of_good', 'like', "%{$searchTerm}%")
                  ->orWhereHas('detailBarang', function ($q) use ($searchTerm) {
                      $q->where('specification', 'like', "%{$searchTerm}%")
                        ->orWhere('box', 'like', "%{$searchTerm}%")
                        ->orWhere('using_2024', 'like', "%{$searchTerm}%")
                        ->orWhere('opening', 'like', "%{$searchTerm}%")
                        ->orWhere('used', 'like', "%{$searchTerm}%")
                        ->orWhere('closing', 'like', "%{$searchTerm}%");
                      
                  });
            });
        }

        // --- Perubahan Utama di sini: Menggunakan paginate(10) ---
        // Menampilkan 10 item per halaman
        $barangs = $query->paginate(10); 

        return view('barang.index', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:tb_barang,code',
            'machine' => 'required|string',
            'name_of_good' => 'required|string',
            'specification' => 'required|string',
            'box' => 'required|string',
            'using_2024' => 'nullable|string',
            'opening' => 'nullable|string',
            'received' => 'nullable|string',
            'used' => 'nullable|string',
            'closing' => 'nullable|string',
        ]);

        Barang::create([
            'code' => $request->code,
            'machine' => $request->machine,
            'name_of_good' => $request->name_of_good,
        ]);

        DetailBarang::create([
            'code_detail' => $request->code,
            'specification' => $request->specification,
            'box' => $request->box,
            'using_2024' => $request->using_2024 ?? 0,
            'opening' => $request->opening ?? 0,
            'received' => $request->received ?? 0,
            'used' => $request->used ?? 0,
            'closing' => $request->closing ?? 0,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'machine' => 'required|string',
            'name_of_good' => 'required|string',
            'specification' => 'required|string',
            'box' => 'required|string',
            'using_2024' => 'nullable|string',
            'opening' => 'nullable|string',
            'received' => 'nullable|string',
            'used' => 'nullable|string',
            'closing' => 'nullable|string',
        ]);

        $barang = Barang::find($code);
        $detailBarang = DetailBarang::find($code);

        if (!$barang || !$detailBarang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan!');
        }

        $barang->update([
            'machine' => $request->machine,
            'name_of_good' => $request->name_of_good,
        ]);

        $detailBarang->update([
            'specification' => $request->specification,
            'box' => $request->box,
            'using_2024' => $request->using_2024 ?? 0,
            'opening' => $request->opening ?? 0,
            'received' => $request->received ?? 0,
            'used' => $request->used ?? 0,
            'closing' => $request->closing ?? 0,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($code)
    {
        $barang = Barang::find($code);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan!');
        }

        $barang->detailBarang()->delete();
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }

    public function fixData()
    {
        $barangs = Barang::all();

        foreach ($barangs as $barang) {
            // Ambil data detail barang
            $detailBarang = $barang->detailBarang;

            // Jika detail barang ada, simpan ulang data
            if ($detailBarang) {
                $barang->save();
                $detailBarang->save();
            }
        }

        return "Semua data berhasil diperbaiki!";
    }
}