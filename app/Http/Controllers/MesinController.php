<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Exports\MesinExport; 
use Maatwebsite\Excel\Facades\Excel;

class MesinController extends Controller
{
    /**
     
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $mesins = Mesin::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_mesin', 'like', "%{$search}%")
                    ->orWhere('kode', 'like', "%{$search}%")
                    ->orWhere('no_motor', 'like', "%{$search}%")
                    ->orWhere('type_motor', 'like', "%{$search}%")
                    ->orWhere('catatan', 'like', "%{$search}%")
                    ->orWhere('bearing_depan', 'like', "%{$search}%")
                    ->orWhere('bearing_belakang', 'like', "%{$search}%")
                    ->orWhere('seal_depan', 'like', "%{$search}%")
                    ->orWhere('seal_belakang', 'like', "%{$search}%")
                    ->orWhere('kw_motor', 'like', "%{$search}%")
                    ->orWhere('rpm_motor', 'like', "%{$search}%");
                    
            })
                 ->paginate(5); 

        return view('mesin.index', compact('mesins', 'search'));
    }

    /**
 
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:tb_mesin', 
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

        if ($validator->fails()) {
                return back()->withErrors($validator)->withInput(); 
        }

        try {
            Mesin::create($request->all());
            return back()->with('success', 'Data mesin berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan data mesin. Error: ' . $e->getMessage())->withInput();
        }
    }

    /**

     */
    public function update(Request $request, Mesin $mesin)
    {
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
                    $mesin->update($validatedData);

         
            return redirect()->route('mesin.index')->with('success', 'Data mesin berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data mesin. Error: ' . $e->getMessage());
        }
    }

    /**
   
     */
    public function destroy(Mesin $mesin)
    {
               try {
            $mesin->delete();
            return back()->with('success', 'Data mesin berhasil dihapus!');
        } catch (\Exception $e) {
             return back()->with('error', 'Gagal menghapus data mesin. Pastikan tidak ada data lain yang terkait.');
        }
     
    }
    public function exportExcel()
    {
        $fileName = 'Data_Mesin_' . now()->format('Ymd_His') . '.xlsx';
                return Excel::download(new MesinExport, $fileName);
    }
}