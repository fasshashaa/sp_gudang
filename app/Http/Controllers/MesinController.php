<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MesinController extends Controller
{
    /**
     * Menampilkan daftar mesin dengan fitur pencarian.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $mesins = Mesin::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_mesin', 'like', "%{$search}%")
                    ->orWhere('kode', 'like', "%{$search}%")
                    ->orWhere('no_motor', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('mesin.index', compact('mesins', 'search'));
    }

    /**
     * Menyimpan data mesin baru.
     */
    public function store(Request $request)
    {
        // Gunakan nama kolom yang sesuai dengan database (huruf kecil)
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:tb_mesin',
            'nama_mesin' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Pastikan nama input di form sesuai dengan nama kolom di database
        Mesin::create($request->all());

        return back()->with('success', 'Data mesin berhasil ditambahkan!');
    }

    /**
     * Memperbarui data mesin yang ada.
     */
    public function update(Request $request, Mesin $mesin)
    {
        // Perbaiki validasi: Gunakan nama kolom yang sesuai dengan database
        $validatedData = $request->validate([
            'nama_mesin' => 'required|string|max:255',
            'no_motor' => 'nullable|string|max:255',
            'type_motor' => 'nullable|string|max:255',
            'kw_motor' => 'nullable|numeric',
            'rpm_motor' => 'nullable|integer',
            'bearing_depan' => 'nullable|string|max:255',
            'bearing_belakang' => 'nullable|string|max:255',
            'seal_depan' => 'nullable|string|max:255',
            'seal_belakang' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        try {
            // Gunakan $validatedData untuk memperbarui data
            $mesin->update($validatedData);

            // Redirect ke halaman index setelah berhasil
            return redirect()->route('mesin.index')->with('success', 'Data mesin berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data mesin. Error: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data mesin.
     */
    public function destroy(Mesin $mesin)
    {
        $mesin->delete();

        return back()->with('success', 'Data mesin berhasil dihapus!');
    }
}
